<form class='form' method='POST' action='/register/proses/'>
<fieldset class='register'> 
<?php
if (!isAdmin()) {
?>
<legend>Register</legend> 
<?php
}
?>
<div class='label'>
<label for='nama'>Nama</label>
<input id='nama' name='nama' type='text' required/>
</div>

<div class='label'>
<label for='username'>Username</label>
<input id='username' name='username' type='text' required />
</div>

<div class='label'>
<label for='password'>Password</label>
<input id='password' name='password' type='password' required />
</div>

<div class='label'>
<label for='email'>Email</label>
<input id='email' name='email' type='email' required />
</div>

<div class='label'>
<label for='telp'>Telefon</label>
<input id='telp' name='telp' type='tel' required />
</div>

<div class='label'>
<label for='alamat'>Alamat</label>
<input id='alamat' name='alamat' type='text' required />
</div>
<?php
if (isAdmin()) {
?>
<div class='label'>
<label for='akses'>Hak Akses</label>
<select>
<option name='akses' value ="0">Admin</option>
<option name='akses' value ="1" selected>User</option>
</select>
</div>
<?php
}
?>
<input type='submit' class='submit btn input' Submit' name='' />
</fieldset>
</form>
