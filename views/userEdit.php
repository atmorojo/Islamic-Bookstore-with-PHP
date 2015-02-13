<?php
if (!isAdmin()) {
?>
<div class='user-main'>
<?php
}
?>
<form action='/user/update/' method='POST' class='form'>
<fieldset>
<legend>Edit Profil</legend>
<div class='label'>
<label for='nama'>Nama</label>
<input id='nama' name='nama' type='text' value='<?php echo $data['nama']; ?>' />
</div>

<div class='hidden'>
<label for='username'>Username</label>
<input id='username' name='username' type='text' value='<?php echo $data['username']; ?>' />
</div>

<div class='label'>
<label for='password'>Password</label>
<input id='password' name='password' type='password' value='<?php echo $data['password']; ?>' />
</div>

<div class='label'>
<label for='email'>Email</label>
<input id='email' name='email' type='email' value='<?php echo $data['email']; ?>' />
</div>

<div class='label'>
<label for='telp'>Telefon</label>
<input id='telp' name='telp' type='tel' value='<?php echo $data['telp']; ?>' />
</div>

<div class='label'>
<label for='alamat'>Alamat</label>
<input id='alamat' name='alamat' type='text' value='<?php echo $data['alamat']; ?>' />
</div>

<?php
if (isAdmin()) {
?>
<div class='label'>
<label for='akses'>Hak Akses</label>
<select name='akses' >
<option value ="0">Admin</option>
<option value ="1" selected>User</option>
</select>
</div>
<?php
}
?>

<input type='submit' class='submit btn input' value='Submit' name='' />
</fieldset>
</form>
<?php
if (!isAdmin()) {
?>
</div>
<?php
}
?>
