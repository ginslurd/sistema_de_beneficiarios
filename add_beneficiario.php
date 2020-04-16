<?php
  $page_title = 'Agregar Beneficiario';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
 
?>
<?php
  if(isset($_POST['add_beneficiario'])){

   

   if(empty($errors)){
       $cedula   = $_POST['cedula'];
       $nombre   = $_POST['nombre'];
       $familia   = $_POST['familia'];
       $ubicacion   = $_POST['ubicacion'];
	   $nino   = $_POST['ninos'];
       $adultos   = $_POST['adultos'];
	   $terceredad   = $_POST['terceredad'];
	   $enfermo   = $_POST['enfermo'];
	   $embarazada   = $_POST['embarazada'];
	   $discapacitado   = $_POST['discapacitado'];
        $query = "INSERT INTO beneficiario (";
        $query .="cedula,nombres,cantidad_familia,ubicacion_urbanistica,fecha_registro,";
		$query .="cant_Per_adult,cant_per_3_edad,cant_per_ninos,cant_per_embar,cant_per_enfer,";
		$query .="cant_per_discp,Nnatural";
        $query .=") VALUES (";
        $query .=" '{$cedula}', '{$nombre}', '{$familia}','{$ubicacion}',NOW(),'{$adultos}','{$terceredad}','{$nino}','{$embarazada}','{$enfermo}','{$discapacitado}','1'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," beneficiario agregado con exito");
          redirect('add_beneficiario.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo Agregar al beneficiario.');
          redirect('add_beneficiario.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_beneficiario.php',false);
   }
 }
?>

<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <script src="jquery-3.2.1.js" type="text/javascript"></script>
<script>
    window.onload=function(){
	   $("#panel2").hide();
       $("#panel1").hide(); 
	}
	
   $(document).ready(function(){
	  
   });

 function check() {
  document.getElementById("juridico").checked = false;
  $("#panel2").hide();
  $("#panel1").show(); 
}
function check1() {
  document.getElementById("natural").checked = false;
  $("#panel1").hide();
  $("#panel2").show();
}

</script>
  
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Agregar Beneficiario</span>
       </strong>
      </div>
	  </br>
	  <strong>
	   <input type="checkbox" onclick="check()" id="natural" name="natural"> Natural
	  <input type="checkbox" onclick="check1()" id="juridico" name="juridico" > Juridico
	  </strong>
      <div id="panel1" class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_beneficiario.php">
            <div class="form-group">
                <label for="name">*Cedula:</label>
                <input type="text" class="form-control" name="cedula" placeholder="Cedula" required>
            </div>
            <div class="form-group">
                <label for="username">*Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido">
            </div>
            <div class="form-group">
                <label for="password">*#Integrantes_Familia</label>
                <input type="number" class="form-control" value="0" name ="familia"  placeholder="Numero de familiares">
            </div>
            <div class="form-group">
                <label for="password">*Ubicacion</label>
                <input type="text" class="form-control" name ="ubicacion"  placeholder="Ubicacion">
            </div>
			<div class="form-group">
                <label for="password">*Num.Niños</label>
                <input type="number" class="form-control" value="0" name ="ninos">
            </div>
			<div class="form-group">
                <label for="password">*Num.Adultos</label>
                <input type="number" class="form-control" value="0" name="adultos">
            </div>
			<div class="form-group">
                <label for="password">*Num.Tecera Edad</label>
                <input type="number" class="form-control" value="0" name ="terceredad">
            </div>
			<div class="form-group">
                <label for="password">*Num.Personas_Enfermas</label>
                <input type="number" class="form-control" value="0" name ="enfermo">
            </div>
			<div class="form-group">
                <label for="password">*Num.Personas_Enbarazada</label>
                <input type="number" class="form-control" value="0" name ="embarazada">
            </div>
			<div class="form-group">
                <label for="password">*Num.Personas_Discap</label>
                <input type="number" class="form-control" value="0" name ="discapacitado">
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_beneficiario" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>

      </div>
	  <div id="panel2" class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_juridico.php">
            <div class="form-group">
                <label for="name">*Ruc</label>
                <input type="text" class="form-control" name="cedula" placeholder="Ruc" required>
            </div>
            <div class="form-group">
                <label for="username">*Nombres</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido" required>
            </div>
            <div class="form-group">
                <label for="password">*Razon social</label>
                <input type="text" class="form-control" name ="social"  placeholder="Razon social" required>
            </div>
            <div class="form-group">
              <label for="level">*Representante legal</label>
               <input type="text" class="form-control" name ="legal"  placeholder="Representante Legal" required>
            </div>
			<div class="form-group">
                <label for="password">*Ubicacion</label>
                <input type="text" class="form-control" name ="ubicacion"  placeholder="Ubicacion" required>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_juridico" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>