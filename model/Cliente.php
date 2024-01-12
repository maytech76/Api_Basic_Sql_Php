<?php


class Cliente extends Conectar{

 /* TODO: Mostrar todos los registro de Clientes */
  public function show_cliente(){
    $conectar=parent::Conexion();
    parent::set_names();
    $sql="call SP_LIST_CLI ()";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
 }

 

 /* TODO:Listar Registro especifico segun ID */
 public function show_cliente_x_id($cli_id){
    $conectar=parent::Conexion();
    parent::set_names();
    $sql="call SP_LIST_CLI_ID(?)";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $cli_id);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
 }


  /* TODO: Insertar Nuevo Registro desde Frontend */
  public function create_cliente( $pais_id, $cli_nombre, $cli_direccion, $cli_correo, $cli_celular){
   $conectar=parent::Conexion();
   parent::set_names();
   $sql="call SP_INSERT_CLI(?,?,?,?,?)";
   $sql=$conectar->prepare($sql);
   $sql->bindValue(1, $pais_id);
   $sql->bindValue(2, $cli_nombre);
   $sql->bindValue(3, $cli_direccion);
   $sql->bindValue(4, $cli_correo);
   $sql->bindValue(5, $cli_celular);
   $sql->execute();
   return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
 }



  /* TODO: Insertar Nuevo Registro desde Frontend */
  public function update_cliente($cli_id, $pais_id, $cli_nombre, $cli_direccion, $cli_correo, $cli_celular){
      $conectar=parent::Conexion();
      parent::set_names();
      $sql="call SP_UPDATE_CLI (?,?,?,?,?,?)";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $cli_id);
      $sql->bindValue(2, $pais_id);
      $sql->bindValue(3, $cli_nombre);
      $sql->bindValue(4, $cli_direccion);
      $sql->bindValue(5, $cli_correo);
      $sql->bindValue(6, $cli_celular);
    
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  }


  /* TODO: Actualizar Campo est = 0 (Eliminar de Lista) del Registro Segun cli_id */
  public function update_estado($cli_id){
      $conectar=parent::Conexion();
      parent::set_names(); 
      $sql="call SP_DELETE_CLI_ID(?)";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $cli_id);
      $sql->execute();

  }









}



?>