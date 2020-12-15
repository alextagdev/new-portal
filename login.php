<?php
include('template/menu.php');
include('include/config.php');
    if (isset($_GET['logout'])){
    if($_GET['logout']==1) {
        session_destroy();
    }}
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="template/stil.css">
    <title> <?php echo $sitename;?> </title>
    <h2 class="sitename"><?php echo $sitename;?></h2>
</head>
<form method="post" action="">
        <div id="div_login">
            <h1>Login</h1>
            <div>
                <input type="text" class="textbox"  name="username" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox"  name="password" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Submit" name="submit" id="submit" />
            </div>
        </div>
</form>
<?php
session_start();
include ("include/db.php");

if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($mysqli,$_POST['username']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);

    if ($username != "" && $password != ""){

        $sql_query = "SELECT * from users WHERE username='".$username."' and password='".md5($password)."'";
        $result = mysqli_query($mysqli,$sql_query);
        $row = mysqli_num_rows($result);


        if($row > 0){
            $_SESSION['username'] = $username;
            header('Location: modifica.php');

        }else{
            echo "Invalid username and password";
        }

    }

}?>
</div>
