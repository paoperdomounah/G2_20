<?php

    class Clientes extends Conectar {

        public function get_clientes(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM cliente";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_cliente($numerocliente){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM cliente WHERE numero_cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numerocliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            
        }

        public function insert_cliente($numerocliente, $nombre, $apellidos, $fecharegistro, $direccioncliente, $rtn, $email){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO cliente(numero_cliente,nombre,apellidos,fecha_registro,direccion_cliente,rtn,email)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numerocliente);
            $sql->bindValue(2, $nombre);
            $sql->bindValue(3, $apellidos);
            $sql->bindValue(4, $fecharegistro);
            $sql->bindValue(5, $direccioncliente);
            $sql->bindValue(6, $rtn);
            $sql->bindValue(7, $email);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_cliente($numerocliente, $nombre, $apellidos, $fecharegistro, $direccioncliente, $rtn, $email){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE cliente SET nombre = ?, apellidos = ?, fecha_registro = ?, direccion_cliente = ?,
             rtn = ?, email = ? WHERE numero_cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $apellidos);
            $sql->bindValue(3, $fecharegistro);
            $sql->bindValue(4, $direccioncliente);
            $sql->bindValue(5, $rtn);
            $sql->bindValue(6, $email);
            $sql->bindValue(7, $numerocliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_cliente($numerocliente){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM cliente WHERE numero_cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numerocliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }

?>