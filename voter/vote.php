<?php
session_start();
include '../includes/db.php';

$election_id = $_GET['election_id'];
$candidates = $conn->query("SELECT * FROM candidates WHERE election_id='$election_id'");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $candidate_id = $_POST['candidate_id'];

    $conn->query("INSERT INTO votes (user_id, election_id, candidate_id) VALUES ('$user_id', '$election_id', '$candidate_id')");
    echo "Vote cast successfully!";
}
?>
<form method="POST">
    <select name="candidate_id">
        <?php while ($row = $candidates->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
        <?php } ?>
    </select>
    <button type="submit">Vote</button>
</form>