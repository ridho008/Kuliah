<!DOCTYPE html>
<html>
<head>
<title>Aplikasi Siswa</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style_login.css">
<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>

<h3><center>Login Aplikasi</center></h3>

<div class="container loginbox">
  <form action="cek_login.php" method="POST">
    <label>Username</label>
    <input type="text" name="username"  required>

    <label>Password</label>
    <input type="password"  name="password"  required>

    <label>Level</label>
    <select id="level" name="level" required>
    <option value="" selected>-Pilih-</option>
      <option value="Admin">Admin</option>
      <option value="Pimpinan">Pimpinan</option>
   
    </select>


    <input type="submit" value="Login">
  </form>
</div>

</body>
</html>
