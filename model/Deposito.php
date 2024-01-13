<?php

   class Deposito extends Conectar{


      /* TODO: Mostrar todos los registro de Deposito */
     public function show_Deposito(){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="call SP_L_ALL_DEP";
        $query=$conectar->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
     }




     /* TODO: Mostrar registro por dep_id recibido desde Frontend */
     public function show_Deposito_id($dep_id){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="call SP_L_DEP_X_ID(?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $dep_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
     }




     /* TODO: Insertar Nuevo Registro desde Frontend */
     public function create_Deposito($dep_nombre, $dep_descripcion, $dep_direccion){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="call SP_I_NEW_DEP(?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $dep_nombre);
        $query->bindValue(2, $dep_descripcion);
        $query->bindValue(3, $dep_direccion);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
     }



      /* TODO: Actualizar datos del Registro desde Frontend */
      public function update_Deposito($dep_id, $dep_nombre, $dep_descripcion, $dep_direccion){
            $conectar=parent::Conexion();
            parent::set_names(); 

            $sql="call SP_UP_DEP_X_ID(?,?,?,?)";

            $query=$conectar->prepare($sql);
            $query->bindValue(1, $dep_id);
            $query->bindValue(2, $dep_nombre);
            $query->bindValue(3, $dep_descripcion);
            $query->bindValue(4, $dep_direccion);
            $query->execute();
        
     }



      /* TODO: Actualizar Campo est = 0 del Registro Segun dep_id */
      public function update_estado($dep_id){
        $conectar=parent::Conexion();
        parent::set_names(); 
        
        $sql="call SP_DEL_dep_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $dep_id);
        $query->execute();
    
     }


   }



?>