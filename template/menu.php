<div class="meniu">
<a href="index.php" class="button_menu"> Prima Pagină <a/>
<?php
if (!empty($_SESSION['username'])){
    echo '<a href="login.php?logout=1" class="button_menu"> Logout </a>';
    echo '<a href="profile.php" class="button_menu"> Profil </a>';
} else {
    echo '<a href = "login.php" class="button_menu" > Login </a >';
    echo '<a href = "register.php" class="button_menu" > Inregistrare </a >';
}
?>
</div>
<div class="content">
