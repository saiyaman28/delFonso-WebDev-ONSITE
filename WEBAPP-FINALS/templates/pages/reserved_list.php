<?php require_once "../elements/base_start.php"; require_once "../elements/header.php"; ?>
<title>Reserved List</title>

<?php
$results_user_reservations = SELECTCNDTNSTMT($conn, "*", "reservations_backend_only", "res_date >= CURRENT_DATE() AND user_id = $id ORDER BY res_date ASC");
?>

<main class="PCMOD-body MBMOD-body TBMOD-body reservedlistpage">
    <div class="pagecontent">
        
        <div class="yourreservationsection">
            <div class="title">
                YOUR RESERVATIONS
            </div>
            <div class="tb">
            <div class="row lead">
                <div class="row-col">ROOM</div>
                <div class="row-col">DATE</div>
                <div class="row-col">TIME</div>
                <div class="row-col">ACTIONS</div>
            </div>
            <?php foreach ($results_user_reservations as $result) { ?>
            <div class="row">
                <div class="row-col"><?php echo $result["room"] ?></div>
                <div class="row-col"><?php echo date("F j, Y", strtotime($result["res_date"])) ?></div>
                <div class="row-col"><?php echo DateTime::createFromFormat('H:i:s', $result['res_time_start'])->format('g:iA') ?> — <?php echo DateTime::createFromFormat('H:i:s', $result['res_time_end'])->format('g:iA') ?></div>
                <div class="row-col actions">
                    <form action="" method="POST">
                        <input type="number" name="id" id="id" value="<?php echo $result["res_id"] ?>">
                        <button type="submit">EDIT</button>
                    </form>
                    <form action="../../backend/system/cancel_reservation.php" onsubmit="return res_list_del_cnfrm();" method="POST">
                        <input type="number" name="id" id="id" value="<?php echo $result["res_id"] ?>">
                        <button type="submit">CANCEL</button>
                    </form>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>

    </div>
</main>

<?php require_once "../elements/base_end.html"; ?>