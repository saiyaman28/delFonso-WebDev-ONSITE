<?php require_once "../elements/base_start.php"; require_once "../elements/header.php"; ?>
<title>Select Date & Time</title>

<?php
$results_restime = SELECTSTMT($conn, "*", "res_time");
$results_reservations = SELECTCNDTNSTMT($conn, "res_id, room, res_date, res_time_start, res_time_end, user", "reservations", "res_date >= CURRENT_DATE() ORDER BY res_date ASC");
?>

<main class="PCMOD-body MBMOD-body TBMOD-body selecttimedatepage">
    <div class="pagecontent">
        <div class="selecttimedatesection">
            <div class="title">
                SELECT DATE & TIME
            </div>
            <form action="select_room.php" method="POST">
                <div class="inputboxes">
                    <input type="date" name="res_date" id="res_date" 
                    value="<?php if (date('l') != 'Sunday') {echo date('Y-m-d');} else {echo date('Y-m-d', strtotime('+1 day'));} ?>" 
                    min="<?php if (date('l') != 'Sunday') {echo date('Y-m-d');} else {echo date('Y-m-d', strtotime('+1 day'));} ?>" 
                    max="<?php echo date('Y-m-d', strtotime('+3 months')); ?>" required>
                    <select name="res_time" id="res_time">
                            <?php foreach ($results_restime as $result){ ?>
                            <option value="<?php echo $result['res_time_id']?>"><?php echo DateTime::createFromFormat('H:i:s', $result['res_time_start'])->format('g:iA') ?> - <?php echo DateTime::createFromFormat('H:i:s', $result['res_time_end'])->format('g:iA') ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="buttons">
                    <button>NEXT</button>
                </div>
            </form>
        </div>
        
        <div class="roomsreservedsection">
            <div class="title">
                ROOMS RESERVED
            </div>
            <div class="tb">
                <div class="row lead">
                    <div class="row-col">ROOM</div>
                    <div class="row-col">DATE</div>
                    <div class="row-col">TIME</div>
                    <div class="row-col">USER</div>
                </div>
                <?php foreach ($results_reservations as $result) { ?>
                <div class="row">
                    <div class="row-col"><?php echo $result["room"] ?></div>
                    <div class="row-col"><?php echo date("F j, Y", strtotime($result["res_date"])) ?></div>
                    <div class="row-col"><?php echo DateTime::createFromFormat('H:i:s', $result['res_time_start'])->format('g:iA') ?> — <?php echo DateTime::createFromFormat('H:i:s', $result['res_time_end'])->format('g:iA') ?></div>
                    <div class="row-col"><?php echo $result["user"] ?></div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php require_once "../elements/footer.php"; ?>
</main>

<?php require_once "../elements/base_end.html"; ?>