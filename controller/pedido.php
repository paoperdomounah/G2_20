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
    require_once("../models/Pedido.php");

    $pedidos = new Pedidos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["opc"]){
        
        case "GetPedidos":
            $datos=$pedidos->get_pedidos();
            echo json_encode($datos);
        break;

        case "Getpedido":
            $datos=$pedidos->get_pedido($body["Numero_Pedido"]);
            echo json_encode($datos);
        break;

        case "InsertPedido":
            $datos=$pedidos->insert_pedido($body["Numero_Pedido"],$body["Numero_Cliente"],$body["Empresa"],$body["Fecha_Pedido"],$body["Direccion"],$body["Tipo_Pago"],$body["Monto_Total"]);
            echo json_encode("Pedido Agregado con Exito");
        break;

        case "UpdatePedido":
            $datos=$pedidos->update_pedido($body["Numero_Pedido"],$body["Numero_Cliente"],$body["Empresa"],$body["Fecha_Pedido"],$body["Direccion"],$body["Tipo_Pago"],$body["Monto_Total"]);
            echo json_encode("Pedido Actualizado con Exito");
        break;

        case "DeletePedido":
        $datos=$pedidos->delete_pedido($body["Numero_Pedido"]);
        echo json_encode("El Pedido se ha borrado con Exito");
        break;
    }

   ?> 