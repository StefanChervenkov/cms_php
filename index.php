<?php

require 'database.php';

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}


$sql = 'SELECT * FROM article ORDER BY published_at';

$results = mysqli_query($con, $sql);

if ($results === false) {
    echo mysqli_error($con);
} else {
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

?>

<?php require 'header.php'; ?>

<?php
if (empty($articles)):
?>
    <h2>No articles found</h2>
<?php else: ?>
    <ul>
        <?php foreach ($articles as $article): ?>
            <li>
                <h2>
                    <a href="article.php?id=<?= $article['id'] ?>">
                        <?= $article['title'] ?>
                    </a>
                </h2>
                <p>
                    <?= $article['content'] ?>
                </p>
                <hr>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require 'footer.php'; 