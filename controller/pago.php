<?php

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');


    require_once("../config/Conexion.php");
    require_once("../models/Pago.php");

    $Pago=new Pago();

    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["opc"]){

        case "get_pagos":
            $datos=$Pago->get_pagos();
            echo json_encode($datos);
        break;

        case "get_pago":
            $datos=$Pago->get_pago($body["NumeroPago"]);
            echo json_encode($datos);
        break;

        case "delete_pago":
            $datos=$Pago->delete_pago($body["NumeroPago"]);
            echo json_encode("Pago eliminado");
        break;


        case "insert_Pago":
            $datos=$Pago->insert_Pago($body["NumeroPago"],$body["FechaPago"],$body["MontoPago"],$body["TipoPago"],$body["Numero_Pedido"],$body["Empresa"]);
            echo json_encode("Pago agregado exitosamente");
        break;


        case "update_pago":
            $datos=$Pago->update_pago($body["NumeroPago"],$body["FechaPago"],$body["MontoPago"],$body["TipoPago"],$body["Numero_Pedido"],$body["Empresa"]);
            echo json_encode("Pago actualizado exitosamente");
        break;
         







    }





?> 