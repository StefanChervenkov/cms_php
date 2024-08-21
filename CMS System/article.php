<?php

require 'database.php';

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $sql = "SELECT * FROM article WHERE id = " . $_GET['id'];

    $result = mysqli_query($con, $sql);

    if ($result === false) {
        echo mysqli_error($con);
    } else {
        $article = mysqli_fetch_assoc($result);
    }
} else {
    $article = null;
}
?>

<?php require './includes/header.php'; ?>

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
<?php endif; ?>

<?php require './includes/footer.php';