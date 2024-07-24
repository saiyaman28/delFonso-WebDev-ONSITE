<?php require_once "../elements/base_start.php"; ?>
<title>Register</title>

<?php
$results_program = SELECTSTMT($conn, '*', 'user_program');
$results_rank = SELECTSTMT($conn, '*', 'user_rank');
?>

<h3 style="color: white; text-align: center;">THIS PAGE SUPPOSE TO BE NOT ACCESSED BY ANYONE OTHER THAN THE ADMINS!!! <br> PLEASE REFRAIN FROM ACCESSING!!!</h3>

<main>
    <form action="../../backend/system/register_user.php" method="POST" style="display: flex; flex-direction: column; width: 300px; gap: 13px;">
        <div style="display: flex; flex-direction: column; width: 300px; gap: 13px;">
            <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
            <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name (Optional)">
            <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>

            <select name="program" id="program" placeholder="Program">
                <?php foreach ($results_program as $result) { ?>
                <option value="<?php echo $result['program_id'];?>"><?php echo $result['program_name'];?></option>
                <?php } ?>
            </select>
            <select name="rank" id="rank" placeholder="Program">
                <?php foreach ($results_rank as $result) { ?>
                <option value="<?php echo $result['rank_id'];?>"><?php echo $result['rank_name'];?></option>
                <?php } ?>
            </select>
            <input type="text" name="ama_id" id="ama_id" placeholder="USN / Employee ID" required>
            <input type="text" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="button-a">
            <button type="submit">SUBMIT</button>
        </div>
    </form>
</main>

<?php require_once "../elements/base_end.html"; ?>