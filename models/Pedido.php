<?php
  
    class Pedidos extends Conectar{

        public function get_pedidos(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM pedido ";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_pedido($numeropedido){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM pedido WHERE Numero_Pedido = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $numeropedido);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_pedido($numeropedido, $numerocliente, $empresa, $fechapedido, $direccion, $tipopago, $montototal){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO pedido(Numero_Pedido,Numero_Cliente,Empresa,Fecha_Pedido,Direccion,Tipo_Pago,Monto_Total) VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numeropedido);
            $sql->bindValue(2, $numerocliente);
            $sql->bindValue(3, $empresa);
            $sql->bindValue(4, $fechapedido);
            $sql->bindValue(5, $direccion);
            $sql->bindValue(6, $tipopago);
            $sql->bindValue(7, $montototal);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_pedido($numeropedido, $numerocliente, $empresa, $fechapedido, $direccion, $tipopago, $montototal){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE pedido SET Numero_Cliente = ?,Empresa = ?,Fecha_Pedido = ?,Direccion = ?,Tipo_Pago = ?,Monto_Total = ?  WHERE Numero_Pedido = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numerocliente);
            $sql->bindValue(2, $empresa);
            $sql->bindValue(3, $fechapedido);
            $sql->bindValue(4, $direccion);
            $sql->bindValue(5, $tipopago);
            $sql->bindValue(6, $montototal);
            $sql->bindValue(7, $numeropedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
         
        public function delete_pedido($numeropedido){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM pedido WHERE Numero_Pedido = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numeropedido);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

     }

?>