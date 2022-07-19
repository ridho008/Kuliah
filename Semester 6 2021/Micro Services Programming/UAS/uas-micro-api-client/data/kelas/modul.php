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
<form method='POST' action='index.php?menu=kelas' enctype='multipart/form-data'>

<input name='submit' class='input-textr' value='Tambah Data' type='button' onclick=location.href='index.php?menu=kelas&act=tambah'>


<h5>Data Kelas</h5>

<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search for ...' title='Type in a name'>

<div style='overflow-x:auto;'>
<table class='table'>
    <tr>
    <th class='center'>No</th>
      <th>Kelas</th>
      <th class='center'>Edit</th>
      <th class='center'>Delete</th>
    </tr>";

$no=1;	
$tulis=mysqli_query($conn, "SELECT * FROM kelas");
while($r=mysqli_fetch_array($tulis))
{

echo"	
 <tbody id='myTable'>
<tr>
<td class='center'>$no</td>
<td>$r[nama_kelas]</td>
  
<td class='center'><a href='index.php?menu=kelas&act=edit&id=$r[id]'>
<i class='fa fa-pencil fa-lg' style='color:#2B93C6;'></i>

<td class='center'><a href='data/kelas/simpan.php?menu=kelas&act=hapus&id=$r[id]'>
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

<h4>Tambah Kelas</h4>
<form method='POST' action='data/kelas/simpan.php?menu=kelas&act=input' enctype='multipart/form-data'>

  
    <label>Nama Kelas</label>
    <input type='text'  name='nama_kelas' required>
 
 
<input type='submit' value='Simpan Data'>
<input name='submit' type='button' value='Kembali' onclick=self.history.back() >

</form>
</div>

</body>
</html>";
break;


case "edit":

$edit=mysqli_query($conn, "select * from kelas where id='$_GET[id]'");
$r   =mysqli_fetch_array($edit);

echo"
<body>
<div class='container loginbox'>
<h4>Edit Data Kelas</h4>
<form method='POST' action='data/kelas/simpan.php?menu=kelas&act=update' enctype='multipart/form-data'>
<input type='hidden' name='id' value='$r[id]'>

    
    <label>Nama Kategori</label>
    <input type='text'  name='nama_kelas' value='$r[nama_kelas]' required>
    
 <input type='submit' value='Update Data'>
<input name='submit' class='input-texty' type='button' value='Kembali' onclick=self.history.back() >

</form>
</div>

</body>
</html>";
break;

}

?>
