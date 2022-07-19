<link rel="stylesheet" href="css/css_form.css">
<script src="js/jquery.min.js"></script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<?php
//error_reporting(0);
// if(empty($_SESSION['username'] AND $_SESSION['password'] AND $_SESSION['level']))
// {
// header('location:index.php');
// exit;
// }

switch($_GET["act"])
{
	default:
echo "
<div class='container-depan'>
<form method='POST' action='index.php?menu=user' enctype='multipart/form-data'>

<input name='submit' class='input-textr' value='Tambah Data' type='button' onclick=location.href='index.php?menu=user&act=tambah'>


<h5>Data User</h5>

<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search for ...' title='Type in a name'>

<div style='overflow-x:auto;'>
<table class='table'>
    <tr>
    <th class='center'>No</th>
      <th>Nama Lengkap</th>
      <th>Username</th>
      <th>Level</th>
      <th class='center'>Edit</th>
      <th class='center'>Delete</th>
    </tr>";

$no=1;	
$tulis=mysqli_query($conn, "SELECT * FROM user");
while($r=mysqli_fetch_array($tulis))
{

echo"	
 <tbody id='myTable'>
<tr>
<td class='center'>$no</td>
<td>$r[nama_user]</td>
<td>$r[username]</td>
<td>$r[role]</td>
  
<td class='center'><a href='index.php?menu=user&act=edit&id=$r[id_user]'>
<i class='fa fa-pencil fa-lg' style='color:#2B93C6;'></i>

<td class='center'><a href='data/user/simpan.php?menu=user&act=hapus&id=$r[id_user]'>
<i class='fa fa-trash fa-lg' style='color:#2B93C6;'></i>


</tr>";
$no++;
	}
echo"
</table></form>";

break;

case "tambah":

echo"	
<body>
<div class='container loginbox'>

<h4>Tambah User</h4>
<form method='POST' action='data/user/simpan.php?menu=user&act=input' enctype='multipart/form-data'>

  
    <label>Username</label>
    <input type='text'  name='username' required>

    <label>Password</label>
    <input type='password'  name='password' required>

    <label>Nama Lengkap</label>
    <input type='text'  name='nama_user' required>

   <label for='role'>Level</label>
    <select  name='role' required>
    <option value='' selected>-Pilih-</option>
      <option value='1'>Admin</option>
      <option value='2'>Pimpinan</option>
    </select>
 
 
<input type='submit' value='Simpan Data'>
<input name='submit' type='button' value='Kembali' onclick=self.history.back() >

</form>
</div>

</body>
</html>";
break;


case "edit":

$edit=mysqli_query($conn, "select * from user where id_user='$_GET[id]'");
$r   =mysqli_fetch_array($edit);

echo"
<body>
<div class='container loginbox'>
<h4>Data User</h4>
<form method='POST' action='data/user/simpan.php?menu=user&act=update' enctype='multipart/form-data'>
<input type='hidden' name='id' value='$r[id_user]'>


    <label>Username</label>
    <input type='text'  name='username'  value='$r[username]' required>

    <label>Password</label>
    <input type='password'  name='password' value='' required>

    <label>Nama Lengkap</label>
    <input type='text'  name='nama_user'  value='$r[nama_user]' required>
 
   <label>Level</label>
   " . '
<select  name="role">
<option value="">-Pilih-</option>
      <option value="1" '. ($r["role"] == 1 ? "selected" : "") .'>Admin</option>
      <option value="2" '. ($r["role"] == 2 ? "selected" : "") .' >Pemimpin</option>
    </select>
   '."
 <input type='submit' value='Update Data'>
<input name='submit' class='input-texty' type='button' value='Kembali' onclick=self.history.back() >

</form>
</div>

</body>
</html>";
break;

}

?>

<!-- <select  name='level' required>
    <option value='$r[level]' selected>$r[level]</option>
      <option value='Admin' <?= $r["hak_akses"] == 0 ? "Admin" : "" ?>>Admin</option>
      <option value='Pimpinan' <?= $r["hak_akses"] == 1 ? "Pimpinan" : "" ?>>Pimpinan</option>
    </select> -->