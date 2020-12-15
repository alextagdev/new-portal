<?php include('template/menu.php'); ?>
<?php include('include/db.php'); ?>
<?php include('include/config.php'); ?>
<?php

if (isset($_POST['change'])) {
    $query= mysqli_query($mysqli, "SELECT name,password FROM users WHERE username='" . $username ."");
    $result = mysqli_fetch_assoc($query);
    $username = $result['username'];
    $name = $result['name'];
    $password =$_POST['password'];
    $change = mysqli_query($mysqli, "UPDATE users SET name='" . $name . "', password='".md5($password)."'  WHERE username='" . $username ."");
    if ($change) {
        echo "Modificat cu succes";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Nu s-a modificat: " . mysqli_error($mysqli);
    }
}

?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="template/stil.css">
    <title> <?php echo $sitename;?> </title>
    <h2 class="sitename"><?php echo $sitename;?></h2>
</head>
<?php
$query= mysqli_query($mysqli, "SELECT name, password FROM users WHERE username ='". $username . "'");
$result = mysqli_fetch_assoc($query);
echo 'Salut : ';
echo $result['name'];?>

    <br><form method="post" action="profile.php" class="input_form">
    <br>
    <input type="text" name="name" class="introdu_task" placeholder="Introdu nume">
    <br>
    <input type="text" name="password" class="introdu_task" placeholder="Introdu parola">
    <br>
    <button type="submit" name="change" id="buton_task" class="buton_task"> Schimba DATELE </button>
</form><br>
</div>