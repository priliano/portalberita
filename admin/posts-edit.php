<?php include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $postId = $_GET['id'];

    $postData = $postService->findById($postId);
    $images = $imageService->list();
    $categories = $categoryService->list();
    $authors = $userService->list();
} else if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_GET['id'])) {
    $postService->update($_POST['id'], $_POST['title'], $_POST['image_id'], $_POST['author_id'], $_POST['category'], $_POST['content']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin ZenZet News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>

    <!-- <link rel="shortcut icon" href="img/favicon.png"> -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>

    <!-- Syntax Highlighter -->
    <link rel="stylesheet" type="text/css" href="syntax-highlighter/styles/shCore.css" media="all">
    <link rel="stylesheet" type="text/css" href="syntax-highlighter/styles/shThemeDefault.css" media="all">

    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Normalize/Reset CSS-->
    <link rel="stylesheet" href="css/normalize.min.css">
    <!-- Main CSS-->
    <link rel="stylesheet" href="css/main.css">

    <style>
        body {
            display: flex;
            background-color: #f8f9fa;
            /* Warna seragam */
        }

        #main-wrapper {
            flex: 1;
            padding-left: 0;
        }

        #sidebar {
            width: 200px;
            background-color: orange;
            /* Warna orange */
            padding: 20px;
        }

        table thead {
            background-color: orange;
            /* Warna orange */
            color: white;
        }

        .main-content {
            background-color: white;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <?php require_once "./sidebar.php" ?>

        <div id="main-wrapper">
            <div class="main-content">
                <!-- Display the post data in a form for editing -->
                <h2>Edit Post</h2>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $postData['id'] ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $postData['title'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_id" class="form-label">Image ID</label>
                        <select class="form-control" id="image_id" name="image_id" required>
                            <?php foreach ($images as $i => $image) { ?>
                                <option value="<?= $image['id'] ?>" <?php echo $image['id'] == $postData['image_id'] ? "selected='selected'" : '' ?>>
                                    <?= $image['id'] . " - " . $image['alt'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="author_id" class="form-label">Author ID</label>
                        <select class="form-control" id="author_id" name="author_id" required>
                            <?php foreach ($authors as $author) { ?>
                                <option value="<?= $author['id'] ?>" <?= $author['id'] == $postData['author_id'] ? "selected" : '' ?>>
                                    <?= $author['id'] . " - " . $author['nama'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?= $category['id'] ?>" <?= $category['id'] == $postData['category'] ? "selected" : '' ?>>
                                    <?= $category['id'] . " - " . $category['nama'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required><?= $postData['content'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>