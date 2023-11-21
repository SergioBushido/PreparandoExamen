<?php


try{
    //Establecemos la conexion
    $base=new PDO("mysql:host=localhost; dbname=proyecto", "gestor", "secreto");
    //Estamos configurando PDO para que lance excepciones cuando ocurran errores en las consultas a la base de datos.
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Consultamos nombre y contraseña
    $sql="SELECT * FROM usuarios WHERE usuario=:u AND pass=:p";
    //Preaparamos la consulta
    $result=$base->prepare($sql);
    //Capturamos los campos nombre y contraseña del formulario
    $login=$_POST['login'];
    $pass=$_POST['pass'];
    //Como la contraseña de la base de datos tiene hash hay que convertir la introducida por usuario a hash del mismo tipo
    $hashedPasswordUsuario = hash('sha256', $pass);

    //Vinculamos parametros para usuario gestor pass
    $result->bindParam(":u", $login, PDO::PARAM_STR);
  $result->bindParam(":p",  $hashedPasswordUsuario, PDO::PARAM_STR);
    //password sin hash para usuario pruebas 123 
    //$result->bindParam(":p",$pass, PDO::PARAM_STR);

    //Ejecutamos la consulta
    $result->execute();
    //Si la busqueda obtiene resultados
    $exito=$result->rowCount();
    //si hay mas de un resultado en la busqueda
    if($exito!=0){
        //si hay exito iniciamos una sesion llamada nombre y le damos el valor del login y nos dirige a inicio.php
        session_start();
        $_SESSION['nombre']=$_POST['login'];
        header("Location:inicio.php");

    }else{
        //Si no hay resultado en la busqueda no hay un nombre en la base de datos y vuelve al inicio
        header("Location:login.php");
    }


}catch(Exception $e){

    die("Error: ".$e->getMessage());

}

   
 