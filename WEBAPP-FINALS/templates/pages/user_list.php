<?php require_once "../elements/base_start.php"; require_once "../elements/header.php"; ?>
<title>Reserved List</title>

<?php
$results_user_list = SELECTCNDTNSTMT($conn, "*", "users", "user_id != $id ORDER BY user_id ASC");
?>

<main class="PCMOD-body MBMOD-body TBMOD-body reservedlistpage">
    <div class="pagecontent">
        
        <div class="yourreservationsection">
            <div class="title">
                USER LIST (ADMIN ONLY!)
            </div>
            <div class="tb">
            <div class="row lead">
                <div class="row-col">ID</div>
                <div class="row-col">NAME</div>
                <div class="row-col">AMA ID</div>
                <div class="row-col">ACTIONS</div>
            </div>
            <?php foreach ($results_user_list as $result) { ?>
            <div class="row">
                <div class="row-col"><?php echo $result["user_id"]; ?></div>
                <div class="row-col"><?php echo $result["first_name"]; ?> <?php echo $result["last_name"]; ?></div>
                <div class="row-col"><?php echo $result["ama_number"]; ?></div>
                <div class="row-col actions">
                    <form action="user_form.php" method="POST">
                        <input type="number" name="id" id="id" value="<?php echo $result["user_id"] ?>">
                        <button type="submit">EDIT</button>
                    </form>
                    <form action="../../backend/system/delete_user.php" onsubmit="return user_list_del_cnfrm();" method="POST">
                        <input type="number" name="id" id="id" value="<?php echo $result["user_id"] ?>">
                        <button type="submit">DELETE</button>
                    </form>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>

    </div>
</main>

<?php require_once "../elements/base_end.html"; ?>