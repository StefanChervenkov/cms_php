<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require './database.php';

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }

    $sql = "INSERT INTO article (title, content, published_at) VALUES ('{$_POST['title']}', '{$_POST['content']}', '{$_POST['published_at']}')";
    
    //$sql = "INSERT INTO article (title, content, published_at) VALUES ('" . $_POST['title'] . "', '" . $_POST['content'] . "', '" . $_POST['published_at'] . "')";

    $result = mysqli_query($con, $sql);

    if ($result === false) {
        echo mysqli_error($con);
    } else {
        $id = mysqli_insert_id($con);
        echo "The inserted article has ID: {$id}";
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<h1>My Blog</h1>
<hr>

<h2>New Article</h2>

<form method="post">

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title here">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" name="content" rows="12"></textarea>
    </div>

    <div class="mb-3">
        <label for="published_at" class="form-label">Publication date and time</label>
        <input type="datetime-local" class="form-control" name="published_at" id="published_at">
    </div>

    <button type="submit" class="btn btn-primary btn-lg">Add</button>

</form>




<body>

</body>

</html>