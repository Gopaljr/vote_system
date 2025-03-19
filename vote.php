<?php
session_start();
include("includes/db.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Fetch Active Elections
$query = "SELECT * FROM elections WHERE NOW() BETWEEN start_time AND end_time";
$elections = $conn->query($query);

if ($elections->num_rows == 0) {
    echo "<h2>No active elections available.</h2>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vote</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Vote for a Candidate</h2>
        <form action="submit_vote.php" method="post">
            <?php while ($election = $elections->fetch_assoc()) { ?>
                <h3><?= $election['title'] ?></h3>
                <input type="hidden" name="election_id" value="<?= $election['id'] ?>">
                
                <?php
                $candidates = $conn->query("SELECT * FROM candidates WHERE election_id=" . $election['id']);
                if ($candidates->num_rows > 0) {
                    while ($candidate = $candidates->fetch_assoc()) {
                        echo "<input type='radio' name='candidate_id' value='" . $candidate['id'] . "' required> " . $candidate['name'] . "<br>";
                    }
                } else {
                    echo "<p>No candidates available.</p>";
                }
                ?>
            <?php } ?>
            <button type="submit">Submit Vote</button>
        </form>
    </div>
</body>
</html>



