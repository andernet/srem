<div class="container mt-4">
    <!-- <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('user-form') ?>" class="btn btn-success mb-2">Adicionar usuário</a>
	</div> -->
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="reserva-list">
       <thead>
          <tr>
             <th>Equipamento</th>
             <th>Professor</th>
             <th>Data da retirada</th>
             <th>Data da devolução</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($reservas): ?>
          <?php foreach($reservas as $reserva): ?>
          <tr>
             <td><?php echo $reserva['equipamento']; ?></td>
             <td><?php echo $reserva['professor']; ?></td>
             <td><?php echo $reserva['data_retirada']; ?></td>
             <td><?php echo $reserva['data_devolucao']; ?></td>
             <td>
              <a href="<?php echo base_url('edit-reserva/'.$reserva['id']);?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="<?php echo base_url('delete-reserva/'.$reserva['id']);?>" class="btn btn-danger btn-sm">Deletar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#reserva-list').DataTable();
  } );
</script>
</body>
</html>