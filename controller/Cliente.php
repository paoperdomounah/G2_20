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
  require_once("../models/Cliente.php");
  $clientes = new Clientes();

  $body = json_decode(file_get_contents("php://input"), true);

  switch ($_GET["opc"]) {

    case "GetClientes":
      $datos=$clientes->get_clientes();
      echo json_encode($datos); 
    break;

    case "GetCliente":
      $datos=$clientes->get_cliente($body["Numero_Cliente"]);
      echo json_encode($datos); 
    break;

    case "InsertCliente":
      $datos=$clientes->insert_cliente($body["Numero_Cliente"],$body["Nombre"],$body["Apellidos"],$body["Fecha_Registro"],$body["Direccion_Cliente"],$body["RTN"],$body["Email"]);
      echo json_encode("Cliente Agregado"); 
    break;

    case "UpdateCliente":
      $datos=$clientes->update_cliente($body["Numero_Cliente"],$body["Nombre"],$body["Apellidos"],$body["Fecha_Registro"],$body["Direccion_Cliente"],$body["RTN"],$body["Email"]);
      echo json_encode("Cliente Actualizado"); 
    break;
      
    case "DeleteCliente":
      $datos=$clientes->delete_cliente($body["Numero_Cliente"]);
      echo json_encode("Cliente eliminado"); 
    break;
      
  }

?>