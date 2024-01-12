<?php

    /* 1ra linea necesaria para recibir y enviar datos tipo JSON */
    header('Content-Type: application/json');

     require_once("../config/conexion.php");
     require_once("../model/Cliente.php");

     /* 2da linea necesaria para recibir y enviar datos tipo JSON */
      $body = json_decode(file_get_contents("php://input"), true);

     $cliente = new Cliente();

        switch ($_GET["op"]) {

                /* TODO:MOSTRAR LISTADO DE CLIENTES SEGUN EST=1 */
            case "showall":
                    $datos=$cliente->show_cliente();
                    echo json_encode($datos);
            break;


            /* TODO:MUESTRA REGISTRO DE CLIENTE ESPECIFICO SEGUN CLI_ID */
            case"ShowCliId":
                $datos= $cliente->show_cliente_x_id($body["cli_id"]);
                echo json_encode($datos);
            break;


            /* TODO:INSERTA NUEVO REGISTRO EN TB TM_CLIENTE */
            case "Insert_Cli":
                $datos = $cliente->create_cliente(
                    $body["pais_id"],
                    $body["cli_nombre"],
                    $body["cli_direccion"],
                    $body["cli_correo"],
                    $body["cli_celular"]);
                echo "Registro de Cliente Correcto";   
            break;


            /* TODO:ACTUALIZA INFORMACION EN CAMPOS EN TB TM_CLIENTE */
            case "Update_Cli":
                $datos = $cliente->update_cliente(
                    $body["cli_id"], 
                    $body["pais_id"],
                    $body["cli_nombre"],
                    $body["cli_direccion"],
                    $body["cli_correo"],
                    $body["cli_celular"]);
                echo "Actualización Efectuada";      
            break;


            /* TODO:CAMBIA EL VALOR DEL CAMPO EST=0, ELIMINADO ESTE REGISTRO DEL LISTADO SHOWALL */
            case "Delete_Cli":
                $datos = $cliente->update_estado($body["cli_id"]);
                echo "Registro Eliminado";      
            break;

        }

        



     ?>