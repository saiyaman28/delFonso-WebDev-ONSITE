<?php 
session_start(); 

if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit();
}
else {
    $id = $_SESSION['username'];
    $authenticated = SELECTCNDTNSTMT($conn, "*", "users", "user_id = $id");
}
?>

<header class="PCMOD-header TBMOD-header MBMOD-header">
    <div class="header">
        <div class="titleside">
            <img src="../../static/assets/AMAES-Logo-2.png">
            <span>THE FLEX</span>
        </div>
        <nav class="navside MBMOD-HIDE">
            <div class="navitem">
                <a href="../pages/home.php">Home</a>
            </div>
            <div class="navitem">
                <a href="../pages/select_datetime.php">Reserve</a>
            </div>
            <div class="navitem">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                    <?php foreach ($authenticated as $result) { echo $result['first_name']; } ?>
                </a>
                <div class="drpdwn-menu dropdown-menu dropdown-menu-lg-end">
                    <div class="menu">
                        <a href="../pages/reserved_list.php">Reserved List</a>
                        <?php foreach ($authenticated as $result) { if ($result['admin']){ ?>
                        <a href="../pages/register.php">Insert Users (ADMIN!)</a>
                        <a href="../pages/user_list.php">Edit Users (ADMIN!)</a>
                        <?php } } ?>
                        <a href="">Preference</a>
                        <a href="../../backend/system/logout_user.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- THIS FEATURE IS ON MOBILE ONLY! -->
        <div class="menuside PCMOD-HIDE TBMOD-HIDE">
            <input type="checkbox" href="#NavMenu" data-bs-toggle="collapse">
        </div>
        <!-- !!! -->
    </div>
    <!-- THIS FEATURE IS ON MOBILE ONLY! -->
    <div class="cllps collapse PCMOD-HIDE TBMOD-HIDE" id="NavMenu">
        <div class="menu">
            <div class="menuitem">
                <a href="../pages/home.php">Home</a>
            </div>
            <div class="menuitem">
                <a href="../pages/select_datetime.php">Reserve</a>
            </div>
            <div class="menuitem">
                <a href="../pages/reserved_list.php">Reserved List</a>
            </div>
            <div class="menuitem">
                <a href="">Preference</a>
            </div>
            <div class="menuitem">
                <a href="../../backend/system/logout_user.php">Logout</a>
            </div>
        </div>
    </div>
    <!-- !!! -->
</header>