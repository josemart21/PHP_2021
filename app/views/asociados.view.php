<?php include __DIR__ . '/partials/inicio-doc.part.php';?>
<?php include __DIR__ . '/partials/nav.part.php';?>

    <!-- Principal Content Start -->

    <div id="galeria">
        <div class="container">
            <div class="col-xs-12 col-sm-8 col-sm-push-2">
                <h1>ASOCIADOS</h1>
                <hr>

                <?php include __DIR__ . '/partials/show-error.part.php' ?>

                <form class="form-horizontal" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Nombre</label>
                            <input class="form-control" type="text" name="nombre" value = "<?= $nombre ?? ''?>">
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Logo</label>
                            <br>
                            <input class="form-control-file" type="file" name="logo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Descripción</label>
                            <br>
                            <textarea class="form-control-file" name="descripcion"><?= $descripcion ?? '' ?></textarea>
                            <br>
                            <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                        </div>
                    </div>
                </form>
                <hr class="divider">

                <div class="asociados">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Logo</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach (($asociados ?? []) as $asociado) : ?>
                            <tr>
                                <th scope="row"><?= $asociado->getId()?></th>
                                <th scope="row"><?= $asociado->getNombre()?></th>
                                <td>
                                    <img src="<?= $asociado->getUrlAsociados() ?>"
                                         alt="<?= $asociado->getDescripcion() ?>"
                                         title="<?= $asociado->getDescripcion() ?>"
                                         style="max-width: 50px; max-height: 50px">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>





                <div class="imagenes_galeria">
                </div>
            </div>
        </div>
    </div>

    <!-- Principal Content Start -->

<?php include __DIR__ . '/partials/fin-doc.part.php'; ?>