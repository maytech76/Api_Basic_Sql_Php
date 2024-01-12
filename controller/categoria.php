<?php

   /* 1ra linea necesaria para recibir y enviar datos tipo JSON */
   header('Content-Type: application/json');

     require_once("../config/conexion.php");
     require_once("../model/Categoria.php");

     /* 2da linea necesaria para recibir y enviar datos tipo JSON */
      $body = json_decode(file_get_contents("php://input"), true);

     $categoria = new Categoria();

     switch ($_GET["op"]) {

        /* TODO:MOSTRAR TODOS LOS REGISTROS DE LA TABLA  */
        case "ShowAllcat":
              $datos=$categoria->show_categoria();
              echo json_encode($datos);
        break;


        /* TODO:MUESTRA UN REGISTRO ESPECIFICO SEGUN CAT_ID */
        case"ShowIdcat":
             $datos= $categoria->show_categoria_id($body["cat_id"]);
             echo json_encode($datos);


        break;


        /* TODO:INSERTA UN NUEVO REGISTRO EN LA TABLA TM_CATEGORIAS */
        case "Insert_cat":
            $datos = $categoria->create_categoria($body["cat_nombre"], $body["cat_descripcion"]);
            echo "Nuevo Registro Correcto";
             
        break;

        /* TODO:ACTUALIZA INFORMACION DE REGISTRO ESPECIFICO SEGUN CAT_ID */
        case "Updatecat":
            $datos = $categoria->update_categoria($body["cat_id"], $body["cat_nombre"], $body["cat_descripcion"]);
            echo "Actualización Correcta";
             
        break;
        

        /* TODO:CAMBIA VALOR DEL CAMPO EST=0, ELIMINADO ESTE REGISTRO DEL LISTADO SHOWALL */
        case "Deletecat":
            $datos = $categoria->update_estado($body["cat_id"]);
            echo "Registro Eliminado del Listado";
             
        break;

        
     }



?>