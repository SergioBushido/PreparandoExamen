<?php
session_start();
//Si se envia el formulario (name="Enviar") capturamos nombre y telefono y lo guardamos en variables
if(isset($_GET['enviar'])){
    $nombre = $_GET['nombre'];
    $telefono = $_GET['telefono'];

    //si no se escribe un nombre
    if(empty($nombre)){
        // Redirige a la página del formulario con un mensaje de error y el nombre ingresado
        //en agenda se procesa con el operador ternario que si no hay nombre devuelve una cadena vacia
        header("Location: ../agenda.php?error=1&nombre=$nombre");
        exit();

    //si no se escribe un telefono
    } elseif(empty($telefono)){
        //Si metemos un nombre sin telefono, elimina el nombre de la agenda
        // si ya estaba almacenado (entonces la sesion ya estaba creada)
        //primero mira si esta vacio el nombre, luego el tel y si no es asi..crea la sesion y almacena
        $existe = false;

        //Recorremos el array multidimimensional donde $key es el indice numerico del array 
        //y $contacto es el valor, que es un array('nombre' => 'Juan', 'telefono' => '123-456-7890'
        foreach($_SESSION['agenda'] as $key => $contacto){
            if($contacto['nombre'] === $nombre){
                //eliminamos el contacto del array
                unset($_SESSION['agenda'][$key]);//eliminas el indice, por lo tanto el arry
                $existe = true;
                break;
            }
        }

        // si metemos un nombre que no esta en la agenda (sin telefono) volvemos al inicio
        if(!$existe){
            header("Location: ../agenda.php");
            exit();
        } else {
            // Si metes un nombre sin telefono y en la agenda ya habia uno lo elimina segun el codigo de arriba
            //y gracias al existe true nos manda con este mensaje al inicio
            header("Location: ../agenda.php?error=2&nombre=$nombre");
            exit();
        }
        // se manda un nombre y un telefono que no estaban en la agenda
    } else {
        // Inicializa la sesion llamada agenda si hay nombre y telefono
        if(!isset($_SESSION['agenda'])){
            $_SESSION['agenda'] = array();
        }

        // Miramos si el nombre ya está en la agenda
        //y si es asi le podremos actualizar el numero
        $existe = false;
        foreach($_SESSION['agenda'] as &$contacto){
            if($contacto['nombre'] === $nombre){
                $existe = true;
                // Si el nombre es igual le metemos el nuevo número 
                $contacto['telefono'] = $telefono;
                break;
            }
        }

        // Si el nombre no existe (significa que tenemos uno nuevo), agrega el nuevo contacto
        if(!$existe){
            $_SESSION['agenda'][] = array('nombre' => $nombre, 'telefono' => $telefono);
        }

        // Redirige a agenda.php para mostrar la información
        header("Location: ../agenda.php");
        exit();
    }
}
