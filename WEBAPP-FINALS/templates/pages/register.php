<?php require_once "../elements/base_start.php"; require_once "../elements/header.php"; ?>
<title>Register</title>

<?php
$results_program = SELECTSTMT($conn, '*', 'user_program');
$results_rank = SELECTSTMT($conn, '*', 'user_rank');
?>

<main class="PCMOD-body formpage">
    <div class="pagecontent">
        <div class="formsection">
            <div class="title">
                INPUT USER
            </div>
            <form action="../../backend/system/register_user.php" method="POST">
                <div class="inputboxes">
                    <input type="text" name="first_name" id="first_name" placeholder="First Name" class="ninput">
                    <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name" class="ninput">
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="ninput">
                    <input type="text" name="email" id="email" placeholder="Email" class="einput">
                    <input type="text" name="ama_id" id="ama_id" placeholder="AMA Number" class="einput">
                    <select class="einput" name="program" id="program">
                    <?php foreach ($results_program as $result) { ?>
                        <option value="<?php echo $result['program_id'];?>"><?php echo $result['program_name'];?></option>
                    <?php } ?>
                    </select>
                    <select class="einput" name="rank" id="rank">
                    <?php foreach ($results_rank as $result) { ?>
                        <option value="<?php echo $result['rank_id']; ?>"><?php echo $result['rank_name']; ?></option>
                    <?php } ?>
                    </select>
                    <input type="password" placeholder="Password" class="psinput">
                </div>
                <button>
                    SUBMIT
                </button>
            </form>
        </div>
    </div>
</main>