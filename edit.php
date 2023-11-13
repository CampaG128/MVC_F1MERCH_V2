<?php
include("db.php");

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM envio WHERE id_envio=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $id_producto = $row['id_producto'];
    $direccion_envio = $row['direccion_envio'];
    $pais_envio = $row['pais_envio'];
    $envio_coste = $row['envio_coste'];
    $total = $row['total'];
    $paqueteria = $row['paqueteria'];
    $nombre_cuenta = $row['nombre_cuenta'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $id_producto= $_POST['id_producto'];
  $direccion_envio = $_POST['direccion_envio'];
  $pais_envio = $_POST['pais_envio'];
  $envio_coste = $_POST['envio_coste'];
  $total = $_POST['total'];
  $paqueteria = $_POST['paqueteria'];
  $nombre_cuenta = $_POST['nombre_cuenta'];

  $query = "UPDATE envio SET id_producto='$id_producto',direccion_envio='$direccion_envio',pais_envio='$pais_envio',envio_coste='$envio_coste',total='$total',paqueteria='$paqueteria',nombre_cuenta='$nombre_cuenta' WHERE id_envio = '$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="id_producto" type="text" class="form-control" value="<?php echo $id_producto; ?>" placeholder="Actualizar id_producto">
        </div>
        <div class="form-group">
          <input name="direccion_envio" type="text" class="form-control" value="<?php echo $direccion_envio; ?>" placeholder="Actualizar direccion_envio">
        </div>
        <div class="form-group">
          <input name="pais_envio" type="text" class="form-control" value="<?php echo $pais_envio; ?>" placeholder="Actualizar pais_envio">
        </div>
        <div class="form-group">
          <input name="envio_coste" type="text" class="form-control" value="<?php echo $envio_coste; ?>" placeholder="Actualizar envio_coste">
        </div>
        <div class="form-group">
          <input name="total" type="text" class="form-control" value="<?php echo $total; ?>" placeholder="Actualizar total">
        </div>
        <div class="form-group">
          <input name="paqueteria" type="text" class="form-control" value="<?php echo $paqueteria; ?>" placeholder="Actualizar paqueteria">
        </div>
        <div class="form-group">
          <input name="nombre_cuenta" type="text" class="form-control" value="<?php echo $nombre_cuenta; ?>" placeholder="Actualizar nombre_cuenta">
        </div>
        <button class="btn-success" name="update">
          Actualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
