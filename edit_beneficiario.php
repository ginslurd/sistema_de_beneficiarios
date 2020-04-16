<?php
  $page_title = 'Editar Usuario';
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
		   $nombres = $_POST['nombres'];
		   $familia = $_POST['familia'];
		   $ubicacion = $_POST['ubicacion'];
		   $niños = $_POST['niños'];
		   $embarazada = $_POST['embarazada'];
		   $discapacitado = $_POST['discapacitado'];
		   $enfermo = $_POST['enfermo'];
		   $terceredad = $_POST['terceredad'];
		   $adultos = $_POST['adultos'];
       
            $sql = "UPDATE beneficiario SET cedula ='{$cedula}', nombres ='{$nombres}',cantidad_familia='{$familia}',ubicacion_urbanistica='{$ubicacion}', ";
            $sql.="	cant_Per_adult='{$adultos}',cant_per_3_edad='{$terceredad}',cant_per_ninos='{$niños}',cant_per_embar='{$embarazada}' ,cant_per_enfer='{$enfermo}', ";
			$sql.=" cant_per_discp='{$adultos}' WHERE id='{$db->escape($id)}'";
			$result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Beneficiario Actualizado ");
            redirect('edit_beneficiario.php?id='.(int)$e_user['id'], false);
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
            redirect('edit_benifeciario.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_beneficiario.php?id='.(int)$e_user['id'],false);
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
          Actualiza cuenta <?php echo remove_junk(ucwords($e_user['nombres'])); ?>
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_beneficiario.php?id=<?php echo (int)$e_user['id'];?>" class="clearfix">
		   <div class="form-group">
                  <label for="name" class="control-label">Cedula:</label>
                  <input type="name" class="form-control" name="cedula" value="<?php echo remove_junk(ucwords($e_user['cedula'])); ?>">
            </div>
            <div class="form-group">
                  <label for="name" class="control-label">Nombres:</label>
                  <input type="name" class="form-control" name="nombres" value="<?php echo remove_junk(ucwords($e_user['nombres'])); ?>">
            </div>
			 <div class="form-group">
                  <label for="name" class="control-label">Numero de Familiares</label>
                  <input type="number" class="form-control" name="familia" value="<?php echo remove_junk(ucwords($e_user['cantidad_familia'])); ?>">
            </div>
			 <div class="form-group">
                  <label for="name" class="control-label">Numero de Adultos</label>
                  <input type="number" class="form-control" name="adultos" value="<?php echo remove_junk(ucwords($e_user['cant_Per_adult'])); ?>">
            </div>
			 <div class="form-group">
                  <label for="name" class="control-label">Numero de Niños</label>
                  <input type="number" class="form-control" name="niños" value="<?php echo remove_junk(ucwords($e_user['cant_per_ninos'])); ?>">
            </div>
			 <div class="form-group">
                  <label for="name" class="control-label">Numero de Personas Tercera Edad</label>
                  <input type="number" class="form-control" name="terceredad" value="<?php echo remove_junk(ucwords($e_user['cant_per_3_edad'])); ?>">
            </div>
            <div class="form-group">
                  <label for="name" class="control-label">Numero de Mujeres Embarazadas</label>
                  <input type="number" class="form-control" name="embarazada" value="<?php echo remove_junk(ucwords($e_user['cant_per_embar'])); ?>">
            </div>
			<div class="form-group">
                  <label for="name" class="control-label">Numero de Personas Enfermas</label>
                  <input type="number" class="form-control" name="enfermo" value="<?php echo remove_junk(ucwords($e_user['cant_per_enfer'])); ?>">
            </div>
            <div class="form-group">
                  <label for="name" class="control-label">Numero de Personas Discapacitadas</label>
                  <input type="number" class="form-control" name="discapacitado" value="<?php echo remove_junk(ucwords($e_user['cant_per_discp'])); ?>">
            </div>
            <div class="form-group">
                  <label for="name" class="control-label">Ubicacion</label>
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
