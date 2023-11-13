<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
        <div class="form-group">
          <input name="id_producto" type="text" class="form-control" placeholder="id_producto">
        </div>
        <div class="form-group">
          <input name="direccion_envio" type="text" class="form-control" placeholder="direccion_envio">
        </div>
        <div class="form-group">
          <input name="pais_envio" type="text" class="form-control" placeholder="pais_envio">
        </div>
        <div class="form-group">
          <input name="envio_coste" type="text" class="form-control" placeholder="envio_coste">
        </div>
        <div class="form-group">
          <input name="total" type="text" class="form-control" placeholder="total">
        </div>
        <div class="form-group">
          <input name="paqueteria" type="text" class="form-control" placeholder="paqueteria">
        </div>
        <div class="form-group">
          <input name="nombre_cuenta" type="text" class="form-control" placeholder="nombre_cuenta">
        </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id_envio</th>
            <th>Id_producto</th>
            <th>Direccion_envío</th>
            <th>País_envío</th>
            <th>Envío_coste</th>
            <th>Total</th>
            <th>Paquetería</th>
            <th>Nombre_cuenta</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM envio";
          $result_tasks = mysqli_query($conn, $query);  
          $cont = 1;  

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $cont++; ?></td>
            <td><?php echo $row['id_producto']; ?></td>
            <td><?php echo $row['direccion_envio']; ?></td>
            <td><?php echo $row['pais_envio']; ?></td>
            <td><?php echo $row['envio_coste']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <td><?php echo $row['paqueteria']; ?></td>
            <td><?php echo $row['nombre_cuenta']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id_envio']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id_envio']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
