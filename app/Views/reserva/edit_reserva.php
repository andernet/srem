  <div class="container mt-5">
   <form method="post" id="reserva-form" name="reserva-form" 
      action="<?= site_url('/update-reserva') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $reserva_obj['id']; ?>">
      <div class="form-group">
         <label>Equipamento</label>
         <select name="equipamento">
            <option value="">Selecione ...</option>
            <option value="Datashow">Datashow</option>
            <option value="TV/VCR">TV  com  VCR</option>
            <option value="TV/DVD" >TV  com  DVD</option>
            <option value="Projetor_Slides">Projetor  de  Slides</option>
            <option value="Sistemas_Áudio-Microfone">Sistemas de Áudio-Microfone</option>
            <option value="Caixa Amplificada">Caixa Amplificada</option>
            <option value="Notebooks">Notebooks</option>
            <option value="Kits Multimídia">Kits Multimídia</option>
         </select>
      </div>
      <div class="form-group">
         <label>Professor</label>
         <select name="proferssor">
         <option value="">Selecione ...</option>
         <?php if($users): ?>
         <?php foreach($users as $user):
            echo '<option value="'.$user['name'].'">'.$user['name'].'</option>';
            
              endforeach; ?>
         <?php endif; ?>
         </select>
      </div>
              
      <div class="form-group">
         <label>Data retirada</label>
         <input type="date" name="data_retirada" class="form-control">
      </div>

      <div class="form-group">
         <label>Data devolução</label>
         <input type="date" name="data_devolucao" class="form-control">
      </div>

      <div class="form-group">
         <button type="submit" class="btn btn-primary btn-block">Reservar</button>
      </div>
   </form>
</div>