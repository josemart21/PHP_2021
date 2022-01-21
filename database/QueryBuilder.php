<?php
require_once __DIR__ . '/../exceptions/QueryException.php';
require_once __DIR__ . '/../core/App.php';

abstract class QueryBuilder
{

    
    private PDO $connection;
    private string $table;
    private string $classEntity;

    public function __construct(string $table, string $classEntity)
    {
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }

    /**
     * @param string $sql
     * @return array
     */

    private function executeQuery(string $sql) : array
    {
        $pdoStatement = $this->connection->prepare($sql);

        if($pdoStatement->execute() === false)
            throw new QueryException("No Se Ha Podido Ejecutar La Query Solicitada");

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    /**
     * @param string $table
     * @param string $classEntity
     * @return array
     * @throws QueryException
     */

    public function findAll() : array
    {
        $sql = "SELECT * FROM $this->table";

        return $this->executeQuery($sql);
    }

    /**
     * @param int $id
     * @return IEntity
     */

    public function find(int $id) : IEntity
    {
        $sql = "SELECT * FROM $this->table WHERE id=$id";
        $result = $this->executeQuery($sql);

        if(empty($result))
            throw new NotFoundException("No se ha encontrado ningún elemento con id $id");

        return $result[0];

    }

    /**
     * @param IEntity $entity
     */

    public function save(IEntity $entity) : void
    {
        try {
            $parameters = $entity->toArray();
            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $this->table,
                implode(', ', array_keys($parameters)),
                ':' . implode(', :', array_keys($parameters))
            );

            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);
        }catch (PDOException $exception) {

            throw new QueryException('Error al insertar en la base de datos');

        }
    }

    /**
     * @param array $paremeters
     * @return string
     */

    private function getUpdates(array $parameters){

        $updates = '';



        foreach ($parameters as $key => $value)
        {
            if($key !== 'id'){
                if($updates !== '')
                    $updates .= ', ';
                $updates .= $key . '=:' . $key;
            }
        }

        return $updates;
    }

    public function update(IEntity $entity):void
    {
        try{

            $parameters = $entity->toArray();
            $sql = sprintf(
                'UPDATE %s SET %s WHERE id=:id',
                $this->table,
                $this->getUpdates($parameters)
            );

            $statement = $this->connection->prepare($sql);

            $statement->execute($parameters);

        }catch(PDOException $pdoException){
            throw new QueryException('Error Al Actualizar El Elemento Con Id ' . $parameters['id']);
        }

    }

    public function executeTransaction(callable $fnExecuteQuerys)
    {
        try{

            $this->connection->beginTransaction();
            $fnExecuteQuerys();
            $this->connection->commit();

        }catch(PDOException $pdoException){
            $this->connection->rollBack();

            throw new QueryException('No Se Ha Podido Realizar La Operación');
        }
    }

}