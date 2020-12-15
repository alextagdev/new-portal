<?php
include_once("include/db.php");

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password =$_POST['password'];
	$email=$_POST['email'];
	$data=date("Y-m-d  H:i:s",time());
    $sql = mysqli_query($mysqli, "INSERT users SET username='" . $username . "', email='" . $email . "', name='" . $name . "', password='".md5($password)."', created='" . $data ."'");
    
}
?>
<?php
include('template/menu.php');
include('include/config.php');
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="template/stil.css">
    <title> <?php echo $sitename;?> </title>
    <h2 class="sitename"><?php echo $sitename;?></h2>
</head>
<br><form method="post" action="register.php" class="input_form">
    <input type="text" name="username" class="introdu_task" placeholder="Username">
    <br>
	<input type="text" name="email" class="introdu_task" placeholder="Email">
	<br>
    <input type="text" name="name" class="introdu_task" placeholder="Nume">
    <br>
    <input type="password" name="password" class="introdu_task" placeholder="Parola">
    <br>
    <button type="submit" name="submit" id="buton_task" class="buton_task">Inregistrare</button>
</form><br>
</div>