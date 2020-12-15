<?php
///PORTAL - CMS
///
if (!empty($_GET['id'])){
    $post_id = $_GET['id'];
	
}
if (!empty($_GET['link'])){
    $link = $_GET['link'];
	
}
require_once ('include/db.php');
require_once ('include/config.php');
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="template/stil.css">
    <title> <?php echo $sitename;?> </title>
    <h2 class="sitename"><?php echo $sitename;?></h2>
</head>
<?php
include ('template/menu.php');
$query= mysqli_query($mysqli,"SELECT * FROM posts");
$rand = mysqli_num_rows($query);
if (!empty($post_id)) {
    $query= mysqli_query($mysqli, "SELECT title,link,description FROM posts WHERE id='" . $post_id . "'");
    $result = mysqli_fetch_assoc($query);
    //mysqli_close($mysqli);
    echo '<div class="post">';
    echo '<h2 class="title">';
	echo $result['title'];
	echo '</h2>';
	echo '<br>';
	echo '<p>Link:';
	echo 'http://ecaraghios';
	echo '/portal/index.php?link=';
	echo $result['link'];
	echo "</p>";
	echo '<br>';
    
	echo '<br>';
    echo '</h2>';
    echo $result['description'];
    echo '</div>';
}
if (!empty($link)) {
	$query= mysqli_query($mysqli, "SELECT title,link,description FROM posts WHERE link='" . $link . "'");
    $result = mysqli_fetch_assoc($query);
    //mysqli_close($mysqli);
    echo '<div class="post">';
    echo '<h2 class="title">';
	$ip = $_SERVER['REMOTE_ADDR'];
	echo '<a href=http://';
	echo 'ecaraghios';
	echo '/portal/index.php?link=';
	echo $result['link'];
	echo ">Link</a>";
	echo '<br>';
    echo $result['title'];
	echo '<br>';
    echo '</h2>';
    echo $result['description'];
echo '</div>';}
	
if($rand>0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row['id'];
        $title = $row['title'];
        $link = $row['link'];
        $description = $row['description'];
        echo '<div class="post">';
        echo '<a href="index.php?id='.$id.'"><h2 class="title">';
        echo $title;
        echo '</h2></a>';
        echo '<p>';
       // echo $description;
        echo '</p>';
        echo '</div>';
    }
    mysqli_close($mysqli);
}
?>
</div>
