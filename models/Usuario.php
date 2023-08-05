<?php
    class Usuario extends Conectar{
        public function get_usuario(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario WHERE usu_est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_x_id($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario WHERE usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_usuario($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario
                SET
                    usu_est=0,
                    fech_elim=now()
                WHERE
                    usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_usuario($usu_nom, $usu_user, $usu_pass, $usu_correo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_usuario (usu_id,usu_nom, usu_user, usu_pass, usu_correo, fech_crea, fech_mod, fech_elim, usu_est) VALUES (NULL,?,?,MD5(?),?, now(),Null,NUll,1);";
            $sql=$conectar->prepare($sql);          
            $sql->bindValue(1,$usu_nom);
            $sql->bindValue(2,$usu_user);
            $sql->bindValue(3,$usu_pass);
            $sql->bindValue(4,$usu_correo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_usuario($usu_id,$usu_nom,$usu_correo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario
                SET
                    usu_nom=?,
                    usu_correo=?,
                    fech_mod=now()

                WHERE
                    usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_nom);
            $sql->bindValue(2,$usu_correo);
            $sql->bindValue(3,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }



    }
