<?php
  $page_title = 'Lista de Beneficiarios';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_users = find_all_benef();
 $all_users1 = find_all_benef1();
?>
<script src="jquery-3.2.1.js" type="text/javascript"></script>
<script>
    window.onload=function(){
		 $("#tabla2").hide();
       $("#tabla1").hide(); 
	}
	
   $(document).ready(function(){
	  
   });

 function check() {
  document.getElementById("juridico").checked = false;
  $("#tabla2").hide();
  $("#tabla1").show(); 
}
function check1() {
  document.getElementById("natural").checked = false;
  $("#tabla1").hide();
  $("#tabla2").show();
}

</script>

<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Beneficiarios</span>
       </strong>
         <a href="add_beneficiario.php" class="btn btn-info pull-right">Agregar Beneficiario</a>
		 
      </div>
	
     <div class="panel-body">
	   <input type="checkbox" onclick="check()" id="natural" name="natural"> Natural
	  <input type="checkbox" onclick="check1()" id="juridico" name="juridico" > Juridico
		
		
      <table id="tabla1"  class="table table-bordered table-striped">
        <thead>
		
          <tr>
            <th  style="width: 5px;">#</th>
            <th  class="text-center"style="width: 10%;">Cedula</th>
            <th class="text-center" style="width: 30%;">Nombres</th>
            <th class="text-center" style="width: 5%;">#Familiares</th>
            <th class="text-center" style="width: 30%;">Ubicacion</th>
            <th class="text-center" style="width: 10%;">FechaRegistro</th>
            <th class="text-center" style="width: 10px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
          <tr>
           <td><?php echo remove_junk(ucwords($a_user['id']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['cedula']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['nombres']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_user['cantidad_familia']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_user['ubicacion_urbanistica']))?></td>
		   <td class="text-center"><?php echo remove_junk(ucwords($a_user['fecha_registro']))?></td>
          
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_beneficiario.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_beneficiario.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
	   <table id="tabla2"  class="table table-bordered table-striped">
        <thead>
		
          <tr>
            <th  style="width: 5px;">#</th>
            <th  class="text-center"style="width: 20%;">RUC</th>
            <th class="text-center" style="width: 30%;">Nombres</th>
            <th class="text-center" style="width: 20%;">Razon_Social</th>
            <th class="text-center" style="width: 30%;">Representante_Legal</th>
            <th class="text-center" style="width: 10%;">FechaRegistro</th>
            <th class="text-center" style="width: 10px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users1 as $a_user1): ?>
          <tr>
           <td><?php echo remove_junk(ucwords($a_user1['id']))?></td>
           <td><?php echo remove_junk(ucwords($a_user1['cedula']))?></td>
           <td><?php echo remove_junk(ucwords($a_user1['nombres']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_user1['razon_social']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_user1['Rrepre_legal']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_user1['fecha_registro']))?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_juridico.php?id=<?php echo (int)$a_user1['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_beneficiario.php?id=<?php echo (int)$a_user1['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
                  <i class="glyphicon glyphicon-remove" ></i>
                </a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>