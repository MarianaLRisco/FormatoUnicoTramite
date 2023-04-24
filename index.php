<?php
    include("ajax/ajax_nivel.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- librerias -->
    <script src="libs/jquery-3.6.1.min.js" charset="utf-8"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css?329842">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" >    
    <!--BDP-->
    <script language="JavaScript" src="js/nivel-grado.js"></script>
    <script src="libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js" charset="utf-8"></script>
    <link rel= "stylesheet" href="libs/bootstrap-datepicker/css/bootstrap-datepicker.css">
    <title>FUT RNC</title>
  </head>
  <body>
    <header class="header">
        <nav class="navbar navbar-light background">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img alt="" width="55" height="49" class="d-inline-block"><div class="d-inline-block text">
                    Colegio X
                    </div>
                </a>
                <button class="btn btn-primary"> <div class="d-inline-block text">Iniciar Sesion</div></button>
            </div>
        </nav>
    </header>
    <div class="container mb-4">
        <div class="card">
            <p class="texto">FORMATO ÚNICO TRÁMITE (FUT)</p>
            <div class="cuadrado">
                <form  name="form-work" method="POST" action="bd/registrarFUT.php" enctype="multipart/form-data">
                    <label class="subtitulo">Datos del Solicitante</label>
                    <div class="input-group mb-3">
                        <div class="form-group col-md-6">
                            <label class="font-text">Apellido Paterno<span class="text-danger"> *Solicitante</span></label>
                            <input type="text" name="apePaternoS" class="form-control" required placeholder="Ingrese apellido paterno">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-text">Apellido Materno<span class="text-danger"> *Solicitante</span></label>
                            <input type="text" name="apeMaternoS" class="form-control" required placeholder="Ingrese apellido materno">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="font-text">Nombres<span class="text-danger"> *Solicitante</span></label>
                            <input type="text" name="nombreS" class="form-control" required placeholder="Ingrese nombre">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-text">DNI<span class="text-danger"> *Solicitante</span></label>
                            <input type="number" name="dniS" class="form-control" required placeholder="Ingrese DNI">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-text">Domicilio<span class="text-danger"> *Solicitante</span></label>
                            <input type="text" name="domicilioS" class="form-control" required placeholder="Ingrese su domicilio">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="font-text">Email<span class="text-danger"> *Solicitante</span></label>
                            <input type="email" name="emailS" class="form-control" required placeholder="Ingrese su email">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-text">Telefono Celular<span class="text-danger"> *Solicitante</span></label>
                            <input type="number" name="celularS" class="form-control" required placeholder="Ingrese su número celular">
                        </div>
                    </div>
                    <label class="subtitulo">Datos del Estudiante</label>
                    <div class="input-group mb-3">
                        <div class="form-group col-md-6">
                            <label class="font-text">Apellido Paterno<span class="text-danger"> *Estudiante</span></label>
                            <input type="text" name="apePaternoM" class="form-control" required placeholder="Ingrese apellido paterno">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-text">Apellido Materno<span class="text-danger"> *Estudiante</span></label>
                            <input type="text" name="apeMaternoM" class="form-control" required placeholder="Ingrese apellido materno">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="font-text">Nombres<span class="text-danger"> *Estudiante</span></label>
                            <input type="text" name="nombreM" class="form-control" required placeholder="Ingrese nombre">
                        </div>
                        <div class="form-group col-md-4 mb-4">
                            <label class="font-text">DNI<span class="text-danger"> *Estudiante</span></label>
                            <input type="number" name="dniM" class="form-control" required placeholder="Ingrese DNI">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-text">Sección<span class="text-danger"> *Estudiante</span></label>
                            <input type="text" name="seccionM" class="form-control" required placeholder="Ingrese su domicilio">
                        </div>                       
                        <div class="form-group col-md-4">
                            <label class="font-text">Nivel Educativo<span class="text-danger"> *Estudiante</span></label>
                            <select class="form-select" name="nivelM" id="nivel">
                            <option value="0">Seleccionar</option>
                                <?php while($rowNP = $nivelesP->fetch_assoc()) { ?>
                                <option value="<?php echo $rowNP["idNivel"]; ?>"><?php echo $rowNP["nombre"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-text">Grado Académico<span class="text-danger"> *Estudiante</span></label>
                            <select class="form-select" name="gradoM" id="grado">
                            <option value="0" selected>Seleccionar</option>
                            </select>
                        </div>
                    </div>
                    <label class="subtitulo">Datos de la Solicitud</label>
                    <div class="input-group mb-3">
                        <div class="form-group col-md-12">
                            <label class="font-text">Escriba lo que solicita<span class="text-danger"> *Solicitud</span></label>
                            <input type="text" name="contenidoS" class="form-control" id="contenedor" required placeholder="Ingrese contenido">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="archivo" class="font-text">Adjunte documentos (opcional)<span class="text-danger"> 
                                *Solicitud (formatos permitidos ".png", ".jpg", ".jpeg", .pdf)</span></label>
                            <input class="form-control" type="file" id="archivo" name="archivoS">
                        </div>
                    </div>  
                    <button type="submit" class="btn btn-primary" id="envio">Enviar</button>                          
                </form>
            </div>
        </div> 
    </div>
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
            <span>Ponte en conección con nuestras principales redes sociales:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
            <a href="https://www.facebook.com" target="_blank" class="me-4 text-reset">
                <ion-icon name="logo-facebook" size="large" class="icon"></ion-icon>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3"></i>NOMBRE DE COLEGIO
                </h6>
                <p>
                    Here you can use rows and columns to organize your footer content. Lorem ipsum
                    dolor sit amet, consectetur adipisicing elit.
                </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                    Principales Páginas
                </h6>
                <p>
                    <a href="#!" class="text-reset">Angular</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">React</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Vue</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Laravel</a>
                </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
                <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                <p>
                    <i class="fas fa-envelope me-3"></i>
                    info@example.com
                </p>
                <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
           © 2022 Copyright:
            <a href="https://www.linkedin.com/in/mariana-risco-cosavalente/" target="_blank" class="text-black">MarianaLRisco</a> y 
            <a href="https://www.linkedin.com/in/luis-alberto-cadillo-lucio-879617231/" target="_blank" class="text-black">LuisCadilloLucio</a>, UNT
        </div>
        <!-- Copyright -->
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Ionicons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
    <!-- DATEPINCKER-->
    <script src="js/date.js" charset="utf-8"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
