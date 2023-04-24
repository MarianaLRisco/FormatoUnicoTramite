<?php 
require 'conexion.php';

if(isset($_POST['contenidoS'])){

    //datos del solicitante
    $a_pater_sol= $_POST['apePaternoS'];
    $a_mater_sol= $_POST['apeMaternoS'];
    $n_sol= $_POST['nombreS'];
    $dni_sol= $_POST['dniS'];
    $domicilio_sol= $_POST['domicilioS'];
    $cel_sol= $_POST['celularS'];
    $email_sol= $_POST['emailS'];

    //verifica si el solicitante esta registrado en la BD
    $buscar_sol_re="SELECT DNI FROM solicitante WHERE DNI='$dni_sol';";
    $rpta1=mysqli_query($mysqli,$buscar_sol_re);
    $opcion1=mysqli_num_rows($rpta1);

    if($opcion1==0){
        //registro del solicitante
        $insertar="INSERT INTO solicitante (DNI, apePaterno, apeMaterno, nombre, celular, email, domicilio) VALUES ('$dni_sol','$a_pater_sol','$a_mater_sol','$n_sol','$cel_sol','$email_sol','$domicilio_sol')";
        $funciona=mysqli_query($mysqli,$insertar);
    }else{
        //actualizacion del solicitante
        $actualizar3="UPDATE solicitante SET DNI='$dni_sol', apePaterno='$a_pater_sol', apeMaterno='$a_mater_sol', nombre='$n_sol', celular='$cel_sol', email='$email_sol', domicilio='$domicilio_sol' WHERE DNI='$dni_sol';";
        $funciona=mysqli_query($mysqli,$actualizar3);
    }

    //datos del alumno
    $a_pater_alu= $_POST['apePaternoM'];
    $a_mater_alu= $_POST['apeMaternoM'];
    $n_alu= $_POST['nombreM'];
    $dni_alu= $_POST['dniM'];
    $seccion_alu= $_POST['seccionM'];
    $id_nivel= $_POST['nivelM'];
    $id_grado= $_POST['gradoM'];

    $queryCon = "SELECT idConforma
    FROM conforma as c
    JOIN Grado as g
    ON c.idGrado=g.idGrado
    JOIN Nivel as n
    ON c.idNivel= n.idNivel
    WHERE n.idNivel = '$id_nivel' or g.idGrado = '$id_grado';";
    $idCon=mysqli_query($mysqli,$queryCon);
    $id_con=mysqli_fetch_assoc($idCon);
    $id_con=$id_con["idConforma"];

    //verifica si el alumno esta registrado en la BD
    $buscar_alu_re="SELECT DNI FROM alumno WHERE DNI='$dni_alu';";
    $rpta2=mysqli_query($mysqli,$buscar_alu_re);
    $opcion2=mysqli_num_rows($rpta2);

    if($opcion2==0){
        //registro del alumno
        $insertar4="INSERT INTO alumno( DNI, apePaterno, apeMaterno, nombre, seccion, idConforma) VALUES ('$dni_alu','$a_pater_alu','$a_mater_alu','$n_alu','$seccion_alu','$id_con')";
        $funciona4=mysqli_query($mysqli,$insertar4);
    }else{
        //actualizacion del alumno
        $actualizar1="UPDATE alumno SET DNI='$dni_alu', apePaterno='$a_pater_alu', apeMaterno='$a_mater_alu', nombre='$n_alu', seccion='$seccion_alu', idConforma='$id_con' WHERE DNI='$dni_alu';";
        $funciona4=mysqli_query($mysqli,$actualizar1);
    }

    //datos de la solicitud (tiene)
    $fechaEnvio_sol= date('y-m-d');
    $cont_sol= $_POST['contenidoS'];
    $imagenV = $_FILES['archivoS'];
    $adjuntos_sol = addslashes(file_get_contents($imagenV['tmp_name']));

    $querySolicitante = "SELECT idSolicitante
    FROM solicitante
    WHERE DNI = '$dni_sol';";
    $idSolicitante=mysqli_query($mysqli,$querySolicitante);
    $id_solicitante=mysqli_fetch_assoc($idSolicitante);
    $id_solicitante=$id_solicitante["idSolicitante"];

    $queryAlumno = "SELECT idAlumno
    FROM alumno
    WHERE DNI = '$dni_alu';";
    $idAlumno=mysqli_query($mysqli,$queryAlumno);
    $id_alumno=mysqli_fetch_assoc($idAlumno);
    $id_alumno=$id_alumno["idAlumno"];

    //registro
    $insertar9="INSERT INTO tiene (fechaSolicitud, contSolicitud, archiAdjuntos, idSolicitante, idAlumno) VALUES ('$fechaEnvio_sol','$cont_sol','$adjuntos_sol','$id_solicitante','$id_alumno')";
    $funciona6=mysqli_query($mysqli,$insertar9);
        
    
    
    if($funciona && $funciona4 && $funciona6){
        echo "<script> alert('Registro exitoso, gracias.');
        location.href = '../index.php';
        </script>";
     
    }else{

        $eliminar="DELETE * FROM solicitante WHERE DNI='$dni_sol';";
        $eliminar1="DELETE * FROM alumno WHERE DNI='$dni_alu';"; 
        $eliminar2="DELETE * FROM tiene WHERE fechaSolicitud='$fechaEnvio_sol' and contSolicitud='$cont_sol';";

        echo "<script> alert('Error de registro, intente nuevamente');
        location.href = '../index.php';
        </script>";
    }
}
?> 
