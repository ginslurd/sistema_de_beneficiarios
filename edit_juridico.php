<?php
  $page_title = 'Editar Beneficiario';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_user = find_by_id('beneficiario',(int)$_GET['id']);
  
  if(!$e_user){
    $session->msg("d","Missing beneficiario id.");
    redirect('beneficiarios.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
   
    if(empty($errors)){
             $id = (int)$e_user['id'];
           $cedula = $_POST['cedula'];
		   $nombre = $_POST['nombre'];
		   $ubicacion = $_POST['ubicacion'];
		   $social = $_POST['social'];
		   $legal = $_POST['legal'];
       
            $sql = "UPDATE beneficiario SET cedula ='{$cedula}', nombres ='{$nombre}',ubicacion_urbanistica='{$ubicacion}',razon_social='{$social}',Rrepre_legal='{$legal}' WHERE id='{$id}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Beneficiario Actualizado ");
            redirect('edit_juridico.php?id='.(int)$e_user['id'], false);
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
            redirect('edit_juridico.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_juridico.php?id='.(int)$e_user['id'],false);
    }
  }
?>

<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Actualiza Beneficiario <?php echo remove_junk(ucwords($e_user['razon_social'])); ?>
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_juridico.php?id=<?php echo (int)$e_user['id'];?>" class="clearfix">
		  <div class="form-group">
                  <label for="name" class="control-label">Cedula:</label>
                  <input type="name" class="form-control" name="cedula" value="<?php echo remove_junk(ucwords($e_user['cedula'])); ?>">
            </div>
            <div class="form-group">
                  <label for="name" class="control-label">Nombres:</label>
                  <input type="name" class="form-control" name="nombre" value="<?php echo remove_junk(ucwords($e_user['nombres'])); ?>">
            </div>
            <div class="form-group">
                  <label for="username" class="control-label">Razon Social</label>
                  <input type="text" class="form-control" name="social" value="<?php echo remove_junk(ucwords($e_user['razon_social'])); ?>">
            </div>
			 <div class="form-group">
                  <label for="username" class="control-label">Representante Legal</label>
                  <input type="text" class="form-control" name="legal" value="<?php echo remove_junk(ucwords($e_user['Rrepre_legal'])); ?>">
            </div>
            <div class="form-group">
                  <label for="username" class="control-label">ubicacion</label>
                  <input type="text" class="form-control" name="ubicacion" value="<?php echo remove_junk(ucwords($e_user['ubicacion_urbanistica'])); ?>">
            </div>
            
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Actualizar</button>
            </div>
        </form>
       </div>
     </div>
  </div>
 </div>
<?php include_once('layouts/footer.php'); ?>
