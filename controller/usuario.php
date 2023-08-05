<?php
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    switch($_GET["op"]){

        case "listar":
            $datos=$usuario->get_usuario();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["usu_nom"];
                $sub_array[] = $row["usu_user"];
                $sub_array[] = $row["usu_correo"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["usu_id"].');"  id="'.$row["usu_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["usu_id"].');"  id="'.$row["usu_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
                $data[]=$sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

            break;

        case "guardaryeditar":
            $datos=$usuario->get_usuario_x_id($_POST["usu_id"]);
            if(empty($_POST["usu_id"])){
                if(is_array($datos)==true and count($datos)==0){
                    $usuario->insert_usuario($_POST["usu_nom"],$_POST["usu_user"],$_POST["usu_pass"],$_POST["usu_correo"]);
                }
            }else{
                $usuario->update_usuario($_POST["usu_id"],$_POST["usu_nom"],$_POST["usu_correo"]);
            }
            break;

        case "mostrar":
            $datos=$usuario->get_usuario_x_id($_POST["usu_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_user"] = $row["usu_user"];
                    $output["usu_pass"] = $row["usu_pass"];
                    $output["usu_correo"] = $row["usu_correo"];
                    

                }
                echo json_encode($output);
            }
            break;

        case "eliminar":
            $usuario->delete_usuario($_POST["usu_id"]);
            break;

    }
