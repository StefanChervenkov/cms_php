<?php

$db_host = 'localhost';
$db_name = 'cms';
$db_user = 'cms_admin';
$db_password = '9[[z6h9)8b/RiBTF';

$con = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

//echo '<h1>Connected successfully!</h1>';

$sql = "SELECT * FROM article WHERE id = {$_GET['id']}";

$result = mysqli_query($con, $sql);

if ($result === false) {
    echo mysqli_error($con);
} else {
    $article = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
</head>

<body>
    <header>
        <h1>My Blog</h1>
    </header>
    <main>
        <?php
        if (empty($article)):
        ?>
            <h2>Article not found.</h2>
        <?php else: ?>
            <h2>
                <?= $article['title']; ?>
            </h2>
            <p>
                <?= $article['content']; ?>
            </p>
        <?php endif; 
        ?>
        
    </main>

</body>

</html>