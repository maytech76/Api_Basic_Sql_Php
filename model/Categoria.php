<?php

   class Categoria extends Conectar{


      /* TODO: Mostrar todos los registro de Categoria */
     public function show_categoria(){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="call SP_L_ALL_CAT";
        $query=$conectar->prepare($sql);
        $query->execute();
        return $query->fetchAll();
     }




     /* TODO: Mostrar registro por cat_id recibido desde Frontend */
     public function show_categoria_id($cat_id){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="call SP_L_CAT_X_ID(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }




     /* TODO: Insertar Nuevo Registro desde Frontend */
     public function create_categoria($cat_nombre, $cat_descripcion){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="call SP_I_NEW_CAT(?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_nombre);
        $sql->bindValue(2, $cat_descripcion);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }



      /* TODO: Actualizar datos del Registro desde Frontend */
      public function update_categoria($cat_id, $cat_nombre, $cat_descripcion){
            $conectar=parent::Conexion();
            parent::set_names(); 

            $sql="call SP_UP_CAT_X_ID(?,?,?)";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->bindValue(2, $cat_nombre);
            $sql->bindValue(3, $cat_descripcion);
            $sql->execute();
        
     }



      /* TODO: Actualizar Campo est = 0 del Registro Segun cat_id */
      public function update_estado($cat_id){
        $conectar=parent::Conexion();
        parent::set_names(); 
        
        $sql="call SP_DEL_CAT_X_ID (?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
    
     }


   }



?>