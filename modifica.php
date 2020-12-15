<?php
include_once("include/db.php");
session_start();
if (empty($_SESSION['username'])){
    echo 'Nu esti logat';
    die;
}
if (isset($_GET['logout'])){
if($_GET['logout']==1) {
    session_destroy();
}
}
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $update = mysqli_query($mysqli, "UPDATE posts SET title='" . $title . "',description='" . $description . "' WHERE id='" . $id . "'");

    if ($update) {
        echo "Modificat cu succes";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Nu s-a modificat: " . mysqli_error($mysqli);
    }
}


if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $description =$_POST['description'];
    $sql = mysqli_query($mysqli, "INSERT posts SET title='" . $title . "',description='" . $description . "' ");
    echo '<div class="post">';
    echo "Post-ul a fost adaugat !";
    echo '</div>';
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
<?php
$username = $_SESSION['username'];
        echo '<br>';
        echo 'Salut : ';
        echo $username;
        echo '. Aici esti in panoul de control';
        echo '<br>';
        ?>
<br><form method="post" action="modifica.php" class="input_form">
    <input type="text" name="title" class="introdu_task" placeholder="titlu">
    <br>
    <input type="text" name="description"  class="introdu_task" placeholder="descriere">
    <br>
    <br>
    <button type="submit" name="submit" id="buton_task" class="buton_task">Adaugă Post</button>
</form><br>
<?php
$query = mysqli_query($mysqli, "SELECT * FROM posts");
$rand = mysqli_num_rows($query);
if ($rand > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row['id'];
        $title = $row['title'];
        $link = $row['link'];
        $description = $row['description'];
        echo '<input type="text" name="title" value="';
        echo $title;
        echo '">';
        echo '<input type="text" name="description" value="';
        echo $description;
        echo '">';
        echo '<input type="hidden" name="id" value="';
        echo $id;
        echo '">';
        echo '<input type="submit" name="update" value="Modifica">';
        echo '<br><br>';
    }
} ?>
</div>