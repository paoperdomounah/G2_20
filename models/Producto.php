<?php 


    class Producto extends conectar{  

        public function get_productos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT*FROM producto";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        } 


        public function get_producto($NumeroPedido){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT*FROM Producto WHERE Numero_Pedido = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroPedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        } 
 

        public function delete_producto($NumeroPedido){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM Producto WHERE Numero_Pedido = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroPedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        } 


        public function insert_Producto($NumeroPedido, $NombreArticulo, $PrecioUnitario, $FechaPedido, $CantidadArticulo, $MontoTotal, $AplicaImpuesto){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO Producto(Numero_Pedido,Nombre_Articulo,Precio_Unitario,Fecha_Pedido,Cantidad_Articulo,Monto_Total,Aplica_Impuesto)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroPedido);
            $sql->bindValue(2, $NombreArticulo);
            $sql->bindValue(3, $PrecioUnitario);
            $sql->bindValue(4, $FechaPedido);
            $sql->bindValue(5, $CantidadArticulo);
            $sql->bindValue(6, $MontoTotal);
            $sql->bindValue(7, $AplicaImpuesto);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }


        public function update_producto($NumeroPedido, $NombreArticulo, $PrecioUnitario, $FechaPedido, $CantidadArticulo, $MontoTotal, $AplicaImpuesto){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE Producto set Nombre_Articulo=?,Precio_Unitario=?,Fecha_Pedido=?,Cantidad_Articulo=?,Monto_Total=?,Aplica_Impuesto=? WHERE Numero_Pedido=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NombreArticulo);
            $sql->bindValue(2, $PrecioUnitario);
            $sql->bindValue(3, $FechaPedido);
            $sql->bindValue(4, $CantidadArticulo);
            $sql->bindValue(5, $MontoTotal);
            $sql->bindValue(6, $AplicaImpuesto);
            $sql->bindValue(7, $NumeroPedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        } 
 

    } 

?> 