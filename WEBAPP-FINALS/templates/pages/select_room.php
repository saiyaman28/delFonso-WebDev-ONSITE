<?php require_once "../elements/base_start.php"; require_once "../elements/header.php"; ?>
<title>Rooms to Avail</title>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $res_date = htmlspecialchars($_POST["res_date"]);
    $res_time = htmlspecialchars($_POST["res_time"]);

    $results_flexroom = SELECTSTMT($conn, "*", "flexroom");
    $results_reservations = SELECTCNDTNSTMT($conn, "res_id, room_id, room", "reservations_backend_only", "res_date = DATE'$res_date' AND res_time_id = $res_time");
?>

<main class="PCMOD-body MBMOD-body TBMOD-body selectroompage">
    <div class="pagecontent">
        <div class="selectroomsection">
            <div class="title">
                Rooms to avail
            </div>
            <div class="cards">
                <?php
                foreach ($results_flexroom as $result_room) {
                    $is_reserved = false;
                    foreach ($results_reservations as $result_reserved){
                        if ($result_room['room_id'] === $result_reserved['room_id']){
                            $is_reserved = true;
                        }
                    }
                    if ($is_reserved === true) { ?>
                        <div href="" class="card-room reserved">
                            <img src="../../static/assets/select room page/ROOM-<?php echo $result_room["room_id"]; ?>-<?php echo $result_room["room_name"]; ?>.jpg">
                            <div class="details">
                                <span class="title"><?php echo $result_room["room_name"]; ?></span>
                                <span class="avail reserved">RESERVED</span>
                            </div>
                        </div>
                    <?php }
                    else { ?>
                        <a href="" class="card-room available" data-bs-toggle="modal" data-bs-target="#room-<?php echo $result_room["room_id"]; ?>-modal">
                            <img src="../../static/assets/select room page/ROOM-<?php echo $result_room["room_id"]; ?>-<?php echo $result_room["room_name"]; ?>.jpg">
                            <div class="details">
                                <span class="title"><?php echo $result_room["room_name"] ?></span>
                                <span class="avail available">AVAILABLE</span>
                            </div>
                        </a>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    
    <?php 
    foreach ($results_flexroom as $result) { ?>
    <div class="modal fade" id="room-<?php echo $result["room_id"]; ?>-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="mdl-cntnt modal-content">
                <div class="header modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $result["room_name"]; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../backend/system/reserve_room.php" method="POST">
                    <div class="body modal-body">
                        <input type="text" class="PCMOD-HIDE MBMOD-HIDE" name="room" id="room" value="<?php echo $result["room_id"] ?>">
                        <input type="date" class="PCMOD-HIDE MBMOD-HIDE" name="res_date" id="res_date" value="<?php echo $res_date ?>">
                        <input type="text" class="PCMOD-HIDE MBMOD-HIDE" name="res_time" id="res_time" value="<?php echo $res_time ?>">
                    </div>
                    <div class="footer modal-footer">
                        <button type="submit" class="">Reserve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
<?php require_once "../elements/footer.php"; ?>
</main>

<?php } ?>
<?php require_once "../elements/base_end.html"; ?>
