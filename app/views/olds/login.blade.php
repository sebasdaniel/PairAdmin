<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/csslogin.css">
<!--<link rel="stylesheet" href="../css/demo.css">-->

<!--<script type="text/javascript" src="../js/demo.js"></script>-->
<script type="text/jscript" src="../js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" language="javascript">
$(function(){
	
	$("#recuperar").click(function(e) {
        $("#fondo").css("display","block");
		$("#recuperacion").css("display","block");
		$("#creacion").css("display","none");
    });
	
	$('#recuperacion,#creacion').click(function(e){
	e.stopPropagation();
	});
 
	$('#fondo').click(function(){
	$('#fondo').css("display","none"); 
	});
	
	$("#crear").click(function(e){
		$("#fondo").css("display","block");
		$("#creacion").css("display","block");
		$("#recuperacion").css("display","none");
		});
		
	$("#recuperar").mouseover(function(){
		$("#span1").css("visibility","visible");		
		}).mouseout(function(){
			$("#span1").css("visibility","hidden");
			});
	$("#crear").mouseover(function(){
		$("#span2").css("visibility","visible");		
		}).mouseout(function(){
			$("#span2").css("visibility","hidden");
			});
	
});

</script>

<title>Ingresar</title>
</head>

<body id="bodylogin">
<div id="principal">
	<div class="titles">
    	<h1>Temas Agrarios</h1>
        <h4>Busqueda de Pares Academicos de la Revista Temas Agrarios<br><a href="http://fca.edu.co/TA/" target="_blank">http://fca.edu.co/TA/</a>
        </h4>
    </div>
    
<form action="../php/validar.php"  method="post" id="main">
    	<label>Nombre de Usuario:</label>
        <input type="text" name="user" class="login" placeholder="Nombre de Usuario">
        
   		<label>Contraseña</label>
        <input type="password" name="password" class="login" placeholder="Contraseña">
        
        <input type="submit" value="login" id="logueo">
    
       <input type="button" id="recuperar" class="opc" value="?" onClick="actydesac('fondo')"/>
       <span class="auxiliar" id="span1">Recuperar Contraseña</span>
      <input type="button" id="crear" class="opc" value="C"/>
      <span class="auxiliar" id="span2">Crear una Cuenta</span>
  </form>
    
  <section id="fondo">
    <section class="dialogos" id="recuperacion">
      <div class="info" id="recu"> <span class="titu">¿Se le olvidó la contraseña?</span>
        <p class="tex">Para recuperar su contraseña por favor ingrese la dirección de correo con la que abrió la cuenta</p>
      </div>
      <div id="simbolo">?</div>
      <div id="infrecu">
        <form name="repo" method="post" action="">
          <input type="email" name="email" id="email" class="cmp" placeholder="ejemplo@mail.com"/>
          <input type="submit" id="busc" class="bt" value="Enviar"/>
        </form>
      </div>
    </section>
    
    <!--<section id="fondo">-->
    <section class="dialogos" id="creacion">
      <div class="info" id="crea"> <span class="titu">Hola!</span>
        <p class="tex">Por favor para evitar desorden: crear una sola cuenta</p>
      </div>
      <div id="datosCrea">
        <form name="repo" method="post" action="">
          <input type="email" name="email" id="email" class="cmp" placeholder="ejemplo@mail.com"/>
                 <input type="password" name="pass" id="pass" class="cmp" placeholder="Contraseña"/>
<input type="submit" id="new" class="bt" value="Crear"/>
        </form>
      </div>
     
      
    </section>
        </body>
</html>
