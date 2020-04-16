<?php
require_once('includes/load.php');
  if(isset($_POST['add_juridico'])){

   

   if(empty($errors)){
       $cedula   = $_POST['cedula'];
       $nombre   = $_POST['nombre'];
       $social   = $_POST['social'];
	   $legal   = $_POST['legal'];
	   $ubicacion   = $_POST['ubicacion'];
       
       
        $query = "INSERT INTO beneficiario (";
        $query .="cedula,nombres,ubicacion_urbanistica,usuario_registro,fecha_registro,razon_social,Rrepre_legal,fundacion";
        $query .=") VALUES (";
        $query .="'{$cedula}','{$nombre}','{$ubicacion}','{$_SESSION['user']}',NOW(),'{$social}','{$legal}','1'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," beneficiario agregado con exito");
          redirect('add_beneficiario.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo Agregar al Beneficiario.');
          redirect('add_beneficiario.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_beneficiario.php',false);
   }
 }
?>