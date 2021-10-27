<?php include __DIR__ . '/partials/inicio-doc.part.php'?>
<?php include __DIR__ . '/partials/nav.part.php'?>

<!-- Principal Content Start -->
   <div id="contact">
   	  <div class="container">
   	    <div class="col-xs-12 col-sm-8 col-sm-push-2">
       	   <h1>CONTACT US</h1>
       	   <hr>
       	   <p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

            <?php

            $formulario = [

                    [
                      'nombre' => '',
                      'apellido' => '',
                      'correo' => '',
                      'tema' => '',
                      'mensaje' => ''
                    ],
                [
                    'nombre' => '',
                    'apellido' => '',
                    'correo' => '',
                    'tema' => '',
                    'mensaje' => ''
                ],
                [
                    'nombre' => '',
                    'apellido' => '',
                    'correo' => '',
                    'tema' => '',
                    'mensaje' => ''
                ]
            ];




            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                $nombre = trim(htmlspecialchars($_POST['nombre']));
                $apellido = trim(htmlspecialchars($_POST['apellido']));
                $correo = trim(htmlspecialchars($_POST['correo']));
                $tema = trim(htmlspecialchars($_POST['tema']));
                $mensaje = trim(htmlspecialchars($_POST['mensaje']));
                $validacionOK = true;

                if (!empty($nombre) && !empty($correo) && !empty($tema)) {

                    if (filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {

                        $validacionOK = false;
                        echo "<div>El correo electrónico no és correcto</div>";

                    }
                } else {

                    $validacionOK = false;
                    echo "<div>Error. Revise los campos vacíos</div>";


                }


                if ($validacionOK === true) {

                    $formulario[] = ['nombre' => $nombre, 'apellido' => $apellido, 'correo' => $correo, 'tema' => $tema, 'mensaje' => $mensaje];

                }
            }

            ?>




            <form class="form-horizontal" method="post">
	       	  <div class="form-group">
	       	  	<div class="col-xs-6">
	       	  	    <label class="label-control">First Name *</label>
	       	  		<input class="form-control" type="text" name="nombre" value="">
	       	  	</div>
	       	  	<div class="col-xs-6">
	       	  	    <label class="label-control">Last Name</label>
	       	  		<input class="form-control" type="text" name="apellido" value="">
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label class="label-control">Email *</label>
	       	  		<input class="form-control" type="text" name="correo" value="" >
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label class="label-control">Subject *</label>
	       	  		<input class="form-control" type="text" name="tema" value="" >
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label class="label-control">Message</label>
	       	  		<textarea class="form-control"  type="text" name="mensaje" value=""></textarea>
	       	  		<button class="pull-right btn btn-lg sr-button">SEND</button>
	       	  	</div>
	       	  </div>
	       </form>



            <table border="5">


                <tr>


                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Tema</th>
                    <th>Mensaje</th>

                </tr>
                <?php foreach ( $formulario as $formularios) : ?>
                <tr>

                    <td><?= $formularios['nombre'] ?></td>
                    <td><?= $formularios['apellido'] ?></td>
                    <td><?= $formularios['correo'] ?></td>
                    <td><?= $formularios['tema'] ?></td>
                    <td><?= $formularios['mensaje'] ?></td>

                </tr>
                <?php endforeach; ?>

            </table>


	       <hr class="divider">
	       <div class="address">
	           <h3>GET IN TOUCH</h3>
	           <hr>
	           <p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
		       <div class="ending text-center">
			        <ul class="list-inline social-buttons">
			            <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
			            </li>
			        </ul>
				    <ul class="list-inline contact">
				       <li class="footer-number"><i class="fa fa-phone sr-icons"></i>  (00228)92229954 </li>
				       <li><i class="fa fa-envelope sr-icons"></i>  kouvenceslas93@gmail.com</li>
				    </ul>
				    <p>Photography Fanatic Template &copy; 2017</p>
		       </div>
	       </div>
	    </div>   
   	  </div>
   </div>
<!-- Principal Content Start -->
<?php include __DIR__ . '/partials/fin-doc.part.php'?>