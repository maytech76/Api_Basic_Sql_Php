<?php

    /* 1ra linea necesaria para recibir y enviar datos tipo JSON */
    header('Content-Type: application/json');

     require_once("../config/conexion.php");
     require_once("../model/Producto.php");

     /* 2da linea necesaria para recibir y enviar datos tipo JSON */
      $body = json_decode(file_get_contents("php://input"), true);

     $producto = new Producto();

     switch ($_GET["op"]) {

        /* TODO:MOSTRAR LISTADO DE PRODUCTOS SEGUN EST=1 */
        case "showall":
              $datos=$producto->show_producto();
              echo json_encode($datos);
        break;


        /* TODO:MUESTRA REGISTRO DE PRODUCTO ESPECIFICO SEGUN PROD_ID */
        case"ShowPdId":
             $datos= $producto->show_producto_id($body["prod_id"]);
             echo json_encode($datos);


        break;


        /* TODO:INSERTA NUEVO REGISTRO EN TB TM_PRODUCTO */
        case "Insert_Prod":
            $datos = $producto->create_producto($body["prod_nom"], $body["prod_descrip"], $body["prod_costo"], $body["prod_precio"], $body["prod_stock"], $body["cat_id"], $body["emp_id"]);
            echo "Registro de Producto Correcto";
             
        break;


        /* TODO:ACTUALIZA INFORMACION EN CAMPOS EN TB TM_PRODUCTO */
        case "Update_Prod":
            $datos = $producto->update_producto(
                $body["prod_id"], 
                $body["prod_nom"], 
                $body["prod_descrip"], 
                $body["prod_costo"], 
                $body["prod_precio"], 
                $body["prod_stock"], 
                $body["cat_id"], 
                $body["est"]);
            echo "Actualización Correcta";
             
        break;

        /* TODO:CAMBIA EL VALOR DEL CAMPO EST=0, ELIMINADO ESTE REGISTRO DEL LISTADO SHOWALL */
        case "del_pro":
            $datos = $producto->update_estado($body["prod_id"]);
            echo "Registro Eliminado";
             
        break;

        
     }



?>