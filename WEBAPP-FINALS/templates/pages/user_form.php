<?php require_once "../elements/base_start.php"; require_once "../elements/header.php"; ?>
<title>Edit User</title>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = htmlspecialchars($_POST["id"]);

    $results_program = SELECTSTMT($conn, '*', 'user_program');
    $results_rank = SELECTSTMT($conn, '*', 'user_rank');
    $results_user_edit = SELECTCNDTNSTMT($conn, "*", "users", "user_id = $id");
?>

<main class="PCMOD-body formpage">
    <div class="pagecontent">
        <div class="formsection">
            <div class="title">
                EDIT USER
            </div>
            <form action="../../backend/system/edit_user.php" method="POST">
                <div class="inputboxes">
                    <?php foreach ($results_user_edit as $result) { ?>
                    <input type="text" class="PCMOD-HIDE" name="id" id="id" value="<?php echo $id; ?>">
                    <input type="text" class="ninput" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $result['first_name']; ?>">
                    <input type="text" class="ninput" name="middle_name" id="middle_name" placeholder="Middle Name" value="<?php echo $result['middle_name']; ?>">
                    <input type="text" class="ninput" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $result['last_name']; ?>">
                    <input type="text" class="einput" name="email" id="email" placeholder="Email" value="<?php echo $result['email']; ?>">
                    <input type="number" class="einput" name="ama_id" id="ama_id" placeholder="AMA Number" value="<?php echo $result['ama_number']; ?>">
                    <select class="einput" name="program" id="program">
                    <?php foreach ($results_program as $result2) { ?>
                        <option value="<?php echo $result2['program_id'];?>" <?php echo ($result2['program_id'] == $result['program']) ? 'selected' : ''; ?>><?php echo $result2['program_name'];?></option>
                    <?php } ?>
                    </select>
                    <select class="einput" name="rank" id="rank">
                    <?php foreach ($results_rank as $result2) { ?>
                        <option value="<?php echo $result2['rank_id']; ?>" <?php echo ($result2['rank_id'] == $result['rank']) ? 'selected' : ''; ?>> <?php echo $result2['rank_name']; ?></option>
                    <?php } ?>
                    </select>
                    <?php } ?>
                </div>
                <button>
                    SUBMIT
                </button>
            </form>
        </div>
    </div>
</main>

<?php } ?>