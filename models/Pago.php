<?php

class Pago extends conectar{

   public function get_pagos(){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT*FROM Pago";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

   }

   public function get_pago($NumeroPago){
      $conectar= parent::conexion();
      parent::set_names();
      $sql="SELECT*FROM Pago WHERE NumeroPago = ?";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $NumeroPago);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

   }

   public function delete_pago($NumeroPago){
      $conectar= parent::conexion();
      parent::set_names();
      $sql="DELETE FROM Pago WHERE NumeroPago = ?";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $NumeroPago);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

   }

   public function insert_Pago($NumeroPago, $FechaPago, $MontoPago, $TipoPago, $Numero_Pedido, $Empresa){
      $conectar= parent::conexion();
      parent::set_names();
      $sql="INSERT INTO Pago(NumeroPago,FechaPago,MontoPago,TipoPago,Numero_Pedido,Empresa)
      VALUES (?,?,?,?,?,?);";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $NumeroPago);
      $sql->bindValue(2, $FechaPago);
      $sql->bindValue(3, $MontoPago);
      $sql->bindValue(4, $TipoPago);
      $sql->bindValue(5, $Numero_Pedido);
      $sql->bindValue(6, $Empresa);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

   }


   public function update_pago($NumeroPago, $FechaPago, $MontoPago, $TipoPago, $Numero_Pedido, $Empresa){
      $conectar= parent::conexion();
      parent::set_names();
      $sql="UPDATE Pago set FechaPago=?,MontoPago=?,TipoPago=?,Numero_Pedido=?,Empresa=? WHERE NumeroPago=?";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $FechaPago);
      $sql->bindValue(2, $MontoPago);
      $sql->bindValue(3, $TipoPago);
      $sql->bindValue(4, $Numero_Pedido);
      $sql->bindValue(5, $Empresa);
      $sql->bindValue(6, $NumeroPago);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


   }














}

?> 



































