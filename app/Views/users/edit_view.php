  <div class="container mt-5">
    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/update') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $user_obj['name']; ?>">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $user_obj['email']; ?>">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Save Data</button>
      </div>
    </form>
  </div>

  