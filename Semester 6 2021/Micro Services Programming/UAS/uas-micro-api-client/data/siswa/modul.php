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
<form method='POST' action='index.php?menu=siswa' enctype='multipart/form-data'>

<input name='submit' class='input-textr' value='Tambah Data' type='button' onclick=location.href='index.php?menu=siswa&act=tambah'>


<h5>Data Siswa</h5>

<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search for ...' title='Type in a name'>

<div style='overflow-x:auto;'>
<table class='table'>
    <tr>
    <th class='center'>No</th>
      <th>Siswa</th>
      <th class='center'>Edit</th>
      <th class='center'>Delete</th>
    </tr>";

$no=1;	
$tulis=mysqli_query($conn, "SELECT * FROM siswa");
while($r=mysqli_fetch_array($tulis))
{

echo"	
 <tbody id='myTable'>
<tr>
<td class='center'>$no</td>
<td>$r[nama_siswa]</td>
  
<td class='center'><a href='index.php?menu=siswa&act=edit&id=$r[id_siswa]'>
<i class='fa fa-pencil fa-lg' style='color:#2B93C6;'></i>

<td class='center'><a href='data/siswa/simpan.php?menu=siswa&act=hapus&id=$r[id_siswa]'>
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

<h4>Tambah Siswa</h4>
<form method='POST' action='data/siswa/simpan.php?menu=siswa&act=input' enctype='multipart/form-data'>

  
    <label>Nama Siswa</label>
    <input type='text' name='nama_siswa' required>
 
 
<input type='submit' value='Simpan Data'>
<input name='submit' type='button' value='Kembali' onclick=self.history.back() >

</form>
</div>

</body>
</html>";
break;


case "edit":

$edit=mysqli_query($conn, "select * from siswa where id_siswa='$_GET[id]'");
$r   =mysqli_fetch_array($edit);

echo"
<body>
<div class='container loginbox'>
<h4>Edit Data Siswa</h4>
<form method='POST' action='data/siswa/simpan.php?menu=siswa&act=update' enctype='multipart/form-data'>
<input type='hidden' name='id' value='$r[id_siswa]'>

    
    <label>Nama Siswa</label>
    <input type='text'  name='nama_siswa' value='$r[nama_siswa]' required>
    
 <input type='submit' value='Update Data'>
<input name='submit' class='input-texty' type='button' value='Kembali' onclick=self.history.back() >

</form>
</div>

</body>
</html>";
break;

}

?>
