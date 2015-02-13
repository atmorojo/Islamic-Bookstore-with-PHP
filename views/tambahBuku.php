<form action='/buku/tambah/' enctype="multipart/form-data" method='POST' class='form'>
<fieldset>
<div class='label'>
<label for='nama'>ISBN</label>
<input id='nama' name='ISBN' type='text' />
</div>

<div class='label'>
<label for='username'>Judul</label>
<input id='username' name='judul' type='text' />
</div>

<div class='label'>
<label for='password'>Pengarang</label>
<input id='password' name='pengarang' type='text' />
</div>

<div class='label'>
<label for='email'>Penerbit</label>
<input id='email' name='penerbit' type='text' />
</div>

<div class='label'>
<label for='telp'>Stok</label>
<input id='telp' name='stok' type='number' />
</div>

<div class='label'>
<label for='alamat'>Harga</label>
<input id='alamat' name='harga' type='text' />
</div>

<div class='label'>
<label for='kategori'>Kategori</label>
<select name='kategori' id='kategori' class='input' >
<option value ="fiqh">Fiqh</option>
<option value ="tarikh" selected>Tarikh</option>
<option value ="hadits" >Hadits</option>
<option value ="aqidah" >Aqidah</option>
<option value ="lain-lain" >Lain-lain</option>
</select>
</div>

<div class='label'>
<label for='bs'>Best Seller</label>
<select name='bs' id='bs' class='input' >
<option value ="1">Best Seller</option>
<option value ="0" selected>Biasa</option>
</select>
</div>

<div class='label'>
<label for='sinopsis'>Sinopsis</label>
<textarea name='sinopsis' id='sinopsis' class='input'></textarea>
</div>

<div class='label'>
<label for='sampul'>Sampul</label>
<input name='sampul' type='file' id='sampul' />
</div>

<input type='submit' class='submit btn input' value='Submit' name='' />
</fieldset>
</form>
