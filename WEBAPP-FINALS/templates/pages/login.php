<?php require_once "../elements/base_start.php"; ?>
<title>THE FLEX - Login</title>

<?php
session_start();

if (isset($_SESSION['authenticated'])){
    header("Location: home.php");
    exit();
}

?>

<main class="PCMOD-body MBMOD-body">
    <div class="loginpage">
        <div class="loginform">
            <div class="title">
                <img src="../../static/assets/AMAES-Logo-2.png">
                <span>THE FLEX</span>
            </div>
            <div class="form">
                <form action="../../backend/system/user_authentication.php" method="POST">
                    <div class="inputboxes">
                        <input type="text" name="username" id="username" placeholder="USN / Email" required>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="button-a">
                        <button type="submit">LOGIN</button>
                        <a href="">Lost Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php require_once "../elements/base_end.html"; ?>