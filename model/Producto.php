<?php


class Producto extends Conectar{


  /* TODO: Mostrar todos los registro de Producto */
  public function show_producto(){
    $conectar=parent::Conexion();
    parent::set_names();
    $sql="call SP_LIST_PROD";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
 }



   /* TODO: Mostrar registro de Producto Por Id especifico */
   public function show_producto_id($prod_id){
    $conectar=parent::Conexion();
    parent::set_names();
    $sql="call SP_LIST_PROD_ID(?)";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $prod_id);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
   }

 
  /* TODO: Insertar Nuevo Registro desde Frontend */
  public function create_producto($prod_nom, $prod_descrip, $prod_costo, $prod_precio, $prod_stock, $cat_id,$emp_id){
    $conectar=parent::Conexion();
    parent::set_names();
    $sql="call SP_INSERT_PROD (?,?,?,?,?,?,?)";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $prod_nom);
    $sql->bindValue(2, $prod_descrip);
    $sql->bindValue(3, $prod_costo);
    $sql->bindValue(4, $prod_precio);
    $sql->bindValue(5, $prod_stock);
    $sql->bindValue(6, $cat_id);
    $sql->bindValue(7, $emp_id);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  }



  /* TODO: Actualizar datos del Registro desde Frontend */
  public function update_producto($prod_id, $prod_nom, $prod_descrip, $prod_costo, $prod_precio, $prod_stock, $cat_id, $est){
        $conectar=parent::Conexion();
        parent::set_names(); 

        $sql="call SP_UPDATE_PROD(?,?,?,?,?,?,?,?)";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);
        $sql->bindValue(2, $prod_nom);
        $sql->bindValue(3, $prod_descrip);
        $sql->bindValue(4, $prod_costo);
        $sql->bindValue(5, $prod_precio);
        $sql->bindValue(6, $prod_stock);
        $sql->bindValue(7, $cat_id);
        $sql->bindValue(8, $est);
        $sql->execute();
    
  }



  /* TODO: Actualizar Campo est = 0 (Eliminar de Lista) del Registro Segun prod_id */
  public function update_estado($prod_id){
    $conectar=parent::Conexion();
    parent::set_names(); 
    $sql="call SP_DELETE_PROD_ID(?)";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $prod_id);
    $sql->execute();

  }



}




?>