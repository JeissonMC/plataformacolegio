<?php

session_start();
if (isset($_SESSION["Usuario"])) {
  header("location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="assets/gallery/colegio.jfif" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form  action="" method="POST">

      <input type="text"  class="fadeIn second" name="Usuario" placeholder="Usuario" required>
      <input type="password" class="fadeIn third" name="Clave" placeholder="Contraseña" required>
      <input type="submit" class="fadeIn fourth" name="ingresar" value="Ingresar">

    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
    	<span id="result"></span>
     
    </div>

  </div>
</div>
</body>
</html>

<script>
	 $('#ingresar').click(function(){

var Usuario = $('#Usuario').val();
 var Clave = $('#Clave').val();

 if ($.trim(Usuario).length > 0 && $.trim(Clave).length > 0) {

$.ajax({
          url:"login/logueame.php",
          method:"POST",
          data:{Usuario:Usuario, Clave:Clave},
          cache:"false",
          beforeSend:function() {
            $('#ingresar').val("Conectando...");
          },
 success:function(data) {
            $('#ingresar').val("ingresar");
            if (data=="1") {
              $(location).attr('href','paginaprincipal.php');
            } else {
              $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> las credenciales son incorrectas.</div>");
            }

 }

}



</script>