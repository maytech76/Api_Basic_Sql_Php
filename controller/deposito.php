<?php

   /* 1ra linea necesaria para recibir y enviar datos tipo JSON */
   header('Content-Type: applidepion/json');

     require_once("../config/conexion.php");
     require_once("../model/Deposito.php");

     /* 2da linea necesaria para recibir y enviar datos tipo JSON */
      $body = json_decode(file_get_contents("php://input"), true);

     $Deposito = new Deposito();

     switch ($_GET["op"]) {

        /* TODO:MOSTRAR TODOS LOS REGISTROS DE LA TABLA  */
        case "ShowAlldep":
              $datos=$Deposito->show_Deposito();
              echo json_encode($datos);
        break;


        /* TODO:MUESTRA UN REGISTRO ESPECIFICO SEGUN dep_ID */
        case"ShowIddep":
             $datos= $Deposito->show_Deposito_id($body["dep_id"]);
             echo json_encode($datos);


        break;


        /* TODO:INSERTA UN NUEVO REGISTRO EN LA TABLA TM_DepositoS */
        case "Insert_dep":
            $datos = $Deposito->create_Deposito($body["dep_nombre"], $body["dep_descripcion"], $body["dep_direccion"]);
            echo "Nuevo Registro Correcto";
             
        break;

        

        /* TODO:ACTUALIZA INFORMACION DE REGISTRO ESPECIFICO SEGUN dep_ID */
        case "Updatedep":
            $datos = $Deposito->update_Deposito($body["dep_id"], $body["dep_nombre"], $body["dep_descripcion"], $body["dep_direccion"]);
            echo "Actualización Correcta";
             
        break;
        

        /* TODO:CAMBIA VALOR DEL CAMPO EST=0, ELIMINADO ESTE REGISTRO DEL LISTADO SHOWALL */
        case "Deletedep":
            $datos = $Deposito->update_estado($body["dep_id"]);
            echo "Registro Eliminado del Listado";
             
        break;

        
     }



?>