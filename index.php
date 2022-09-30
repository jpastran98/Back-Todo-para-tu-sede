<!DOCTYPE html>
<html>
<head>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="post" name="f1">
    	<h1>¡Registrate!</h1>
        <!-- Todos los inputs necesitan de un name el cual esta asociado a tomar el dato en la logica que esta abajo y enviar a la BD -->
    <input type="text" name="name" placeholder="Nombre y Apellido">
    <input type="text" name="dni" placeholder="Dni">
    <input type="email" name="email" placeholder="Email">
    <input type="date" name="date" placeholder="Fecha de nacimiento">
    <input type="text" name="phone" placeholder="Celular">
  
    <!-- Select de las Provincias-->
    <select name=pais onchange="cambia_provincia()"> 
    <option value="0" selected>Seleccione... 
    <option value="1">Capital Federal 
    <option value="2">Buenos Aires 
    <option value="3">Catamarca
    <option value="4">Chaco
    <option value="5">Chubut
    <option value="6">Corrientes
    <option value="7">Cordoba 
    <option value="8">Entre Rios 
    <option value="9">Formosa 
    <option value="10">Jujuy 
    <option value="11">La Pampa 
    <option value="12">La Rioja 
    <option value="13">Mendoza 
    <option value="14">Misiones 
    <option value="15">Neuquen 
    <option value="16">Rio Negro 
    <option value="17">Salta 
    <option value="18">San Juan 
    <option value="19">San Luis 
    <option value="20">Santa Cruz 
    <option value="21">Santa Fe 
    <option value="22">Santiago del Estero 
    <option value="23">Tierra del Fuego 
    <option value="24">Tucuman 
    </select>
    
        <!-- Select de las Localidades-->
    <select name=provincia> 
    <option value="-">- 
    </select> 
    <input type="submit" name="register">

  </form>


  <script>
  var provincias_1=new Array("-","CABA");
  var provincias_2=new Array("-","Almirante Brown","Avellaneda","Bahia Blanca","Caseros","General Pacheco","Junin", "La Matanza", "La Plata", "Lanus", "Lomas de Zamora", "Lujan", "Malvinas Argentinas", "Moreno","Moron","Olavarria","Pilar","San Fernando","San Justo","Tres de Febrero");
  var provincias_3=new Array("-","Catamarca");
  var provincias_4=new Array("-","Resistencia","Roque Saenz Peña");
  var provincias_5=new Array("-","Comodoro Rivadavia","Puerto Madryn","Trelew");
  var provincias_6=new Array("-","Corrientes","Goya");
  var provincias_7=new Array("-","Cordoba","Rio Cuarto","Villa Maria");
  var provincias_8=new Array("-","Parana");
  var provincias_9=new Array("-","Clorinda","Formosa");
  var provincias_10=new Array("-","San Pedro de Jujuy","San Salvador de Jujuy");
  var provincias_11=new Array("-","General Pico","Santa Rosa");
  var provincias_12=new Array("-","La Rioja");
  var provincias_13=new Array("-","Mendoza","San Martin");
  var provincias_14=new Array("-","Posadas");
  var provincias_15=new Array("-","Neuquen");
  var provincias_16=new Array("-","Bariloche","Cipolletti","General Roca","Viedma");
  var provincias_17=new Array("-","Oran","Salta","Tartagal");
  var provincias_18=new Array("-","San Juan");
  var provincias_19=new Array("-","San Luis","Villa Mercedes");
  var provincias_20=new Array("-"," ");
  var provincias_21=new Array("-","Santa Fe");
  var provincias_22=new Array("-","Santiago del Estero");
  var provincias_23=new Array("-","");
  var provincias_24=new Array("-","Concepcion","Tucuman");

  var todasProvincias = [
    [],
    provincias_1,
    provincias_2,
    provincias_3,
    provincias_4,
    provincias_5,
    provincias_6,
    provincias_7,
    provincias_8,
    provincias_9,
    provincias_10,
    provincias_11,
    provincias_12,
    provincias_13,
    provincias_14,
    provincias_15,
    provincias_16,
    provincias_17,
    provincias_18,
    provincias_19,
    provincias_20,
    provincias_21,
    provincias_22,
    provincias_23,
    provincias_24,
  ];

  function cambia_provincia(){ 
   	//tomo el valor del select de la provincia elegida
   	var pais 
   	pais = document.f1.pais[document.f1.pais.selectedIndex].value 
   	//miro a ver si la provincia está definida
   	if (pais != 0) { 
      	//si estaba definida, entonces coloco las opciones de las localidades correspondientes. 
      	//selecciono el array de localidad adecuado 
      	mis_provincias=todasProvincias[pais]
      	//calculo el numero de localidades 
      	num_provincias = mis_provincias.length 
      	//marco el número de localidades en el select 
      	document.f1.provincia.length = num_provincias 
      	//para cada localidad del array, la introduzco en el select 
      	for(i=0;i<num_provincias;i++){ 
         	document.f1.provincia.options[i].value=mis_provincias[i] 
         	document.f1.provincia.options[i].text=mis_provincias[i] 
      	}	
   	}else{ 
      	//si no había localidad seleccionada, elimino las localidad del select 
      	document.f1.provincia.length = 1 
      	//coloco un guión en la única opción que he dejado 
      	document.f1.provincia.options[0].value = "-" 
      	document.f1.provincia.options[0].text = "-" 
   	} 
   	//marco como seleccionada la opción primera de localidad 
   	document.f1.provincia.options[0].selected = true 
}

  </script>
    <!-- incluyendo el registro -->
        <?php 
        include("registrar.php");
        ?>
</body>
</html>