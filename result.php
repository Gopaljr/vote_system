<?php
include 'includes/db.php';

$election_id = $_GET['election_id'];
$results = $conn->query("SELECT candidates.name, COUNT(votes.id) as votes_count 
                         FROM votes 
                         JOIN candidates ON votes.candidate_id = candidates.id 
                         WHERE votes.election_id = '$election_id' 
                         GROUP BY candidates.id ORDER BY votes_count DESC");
?>
<h2>Election Results</h2>
<ul>
<?php while ($row = $results->fetch_assoc()) { ?>
    <li><?php echo $row['name'] . " - " . $row['votes_count'] . " votes"; ?></li>
<?php } ?>
</ul>
