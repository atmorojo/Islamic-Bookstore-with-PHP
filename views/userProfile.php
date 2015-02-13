<div class='user-main'>

  <div class='label'>
    <label for='nama'>Nama</label>
    <input id='nama' disabled type='text' value='<?php echo $_SESSION['nama']; ?>' />
  </div>

  <div class='label'>
    <label for='username'>Username</label>
    <input id='username' disabled type='text' value='<?php echo $_SESSION['username']; ?>' />
  </div>

  <div class='label'>
    <label for='email'>Email</label>
    <input id='email' disabled type='email' value='<?php echo $_SESSION['email']; ?>' />
  </div>

  <div class='label'>
    <label for='telp'>Telefon</label>
    <input id='telp' disabled type='tel' value='<?php echo $_SESSION['telp']; ?>' />
  </div>

  <div class='label'>
    <label for='alamat'>Alamat</label>
    <input id='alamat' disabled type='text' value='<?php echo $_SESSION['alamat']; ?>' />
  </div>
</div>
