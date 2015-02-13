<form class='form-login' method='POST' action='/login/check/'>
  <fieldset> 
    <legend>Log in</legend> 
    <div> 
        <input id="username" name="username" type="text" placeholder="username" required autofocus> 
    </div>
    <div> 
        <input id="password" name="password" type="password" placeholder="password" required> 
    </div>
    <div> 
      <button type=submit class='input'>Log in</button> 
<?php
if (!isset($admin)) {
  echo "<a href='/register/' class='input'>Belum punya akun? Klik di sini!</a>";
}
?>
    </div> 
  </fieldset>
</form>
