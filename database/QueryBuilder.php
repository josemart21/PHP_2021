<?php
require_once __DIR__ . '/../exceptions/QueryException.php';
class QueryBuilder
{

    /**
     * @var PDO
     */
    
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string $table
     * @param string $classEntity
     * @return array
     * @throws QueryException
     */

    public function findAll(string $table, string $classEntity) : array
    {
        $sql = "SELECT * FROM $table";

        $pdoStatement = $this->connection->prepare($sql);

        if($pdoStatement->execute() === false)
            throw new QueryException("No Se Ha Podido Ejecutar La Query Solicitada");

            return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $classEntity);
    }



}