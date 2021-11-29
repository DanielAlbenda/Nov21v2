<?php
   $Server = "localhost";
   $ServerUser = "root";
   $ServerPass = "1986RoOt35*";
   $DB = "injsql";


   $conexion = new mysqli($Server, $ServerUser, $ServerPass, $DB);

   if($conexion->connect_error){
      header("location:../Error.html");
   }

   if(isset($_POST['username']) && isset($_POST['pass'])){
     $user = $_POST['username'];
     $password = md5($_POST['pass']);

      $sql = "SELECT * FROM tb_usuarios WHERE user = '$user' AND password = '$password'";
      $resultado = $conexion->query($sql);

     if($resultado->num_rows > 0){
        header("location:../AccessIn.html");
     }else{
        header("location:../AccessWrong.html");
     }
   }

   $conexion->close();
?>
