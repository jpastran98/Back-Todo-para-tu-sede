<?php 

include("con_db.php");
//Validacion al seleccionar registro, que los campos no esten vacios, y tomando el valor para enviarlo a la BD, para a posterior insertar la consulta en la BD
if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1 && 
        strlen($_POST['dni']) >= 1 && 
        strlen($_POST['email']) >= 1 && 
        strlen($_POST['phone']) >= 1 && 
        strlen($_POST['date']) >= 1 &&
        strlen($_POST['pais']) >= 1 &&
        strlen($_POST['provincia']) >= 1) {
	    $name = trim($_POST['name']);
        $dni = trim($_POST['dni']);
	    $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
	    $date = date("y/m/d");
        $pais = trim($_POST['pais']);
        $provincia = trim($_POST['provincia']);
	    $consulta = "INSERT INTO datos(name, dni, email, phone, date, pais, provincia) VALUES ('$name','$dni','$email','$phone','$date','$pais','$provincia')";
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3>¡Te has inscripto correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3>¡Este dni ya se encuentra registrado!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3>¡Por favor complete los campos!</h3>
           <?php
    }
}

?>