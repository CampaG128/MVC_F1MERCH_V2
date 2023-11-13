<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $id_producto = $_POST['id_producto'];
  $direccion_envio = $_POST['direccion_envio'];
  $pais_envio = $_POST['pais_envio'];
  $envio_coste = $_POST['envio_coste'];
  $total = $_POST['total'];
  $paqueteria = $_POST['paqueteria'];
  $nombre_cuenta = $_POST['nombre_cuenta'];
  $query = "INSERT INTO envio (id_producto, direccion_envio, pais_envio, envio_coste, total, paqueteria, nombre_cuenta) VALUES ('$id_producto','$direccion_envio','$pais_envio','$envio_coste','$total','$paqueteria','$nombre_cuenta')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
