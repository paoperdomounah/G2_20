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
    require_once("../models/Producto.php"); 

    $Producto=new Producto(); 

    $body = json_decode(file_get_contents("php://input"), true); 


    switch ($_GET["opc"]){

        case "get_productos":
            $datos=$Producto->get_productos();
            echo json_encode($datos);
        break; 


        case "get_producto":
            $datos=$Producto->get_producto($body["Numero_Pedido"]);
            echo json_encode($datos);
        break; 


        case "delete_producto":
            $datos=$Producto->delete_producto($body["Numero_Pedido"]);
            echo json_encode("Producto eliminado");
        break; 

 

        case "insert_Producto":
            $datos=$Producto->insert_Producto($body["Numero_Pedido"],$body["Nombre_Articulo"],$body["Precio_Unitario"],$body["Fecha_Pedido"],$body["Cantidad_Articulo"],$body["Monto_Total"],$body["Aplica_Impuesto"]);
            echo json_encode("Producto agregado");
        break; 
 

        case "update_producto":
            $datos=$Producto->update_producto($body["Numero_Pedido"],$body["Nombre_Articulo"],$body["Precio_Unitario"],$body["Fecha_Pedido"],$body["Cantidad_Articulo"],$body["Monto_Total"],$body["Aplica_Impuesto"]);
            echo json_encode("Producto actualizado");
        break; 


    } 

 

?> 