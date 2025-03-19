<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Now</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>Vote for Your Candidate</header>

<div class="voting-box">
    <h2>Select Your Candidate</h2>
    <form action="submit_vote.php" method="post">
        <input type="radio" name="candidate" value="1"> Candidate A <br>
        <input type="radio" name="candidate" value="2"> Candidate B <br>
        <input type="radio" name="candidate" value="3"> Candidate C <br>
        <button type="submit" class="vote-btn">Vote</button>
    </form>
</div>

</body>
</html>
