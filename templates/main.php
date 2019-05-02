<?php
/**
 * @var array $images
 */
$processes = 0;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>TITLE</h1>
<?php foreach ($images as $image) {
    if ($processes % 4 === 0) : ?>
        <div class="image-row">
    <?php endif; ?>
    <div class="image-container">
        <img class="image" src="<?php echo 'image/' . $image ?>" alt="">
    </div>
    <?php if ($processes % 4 === 3) { ?>
        </div>
    <?php } ?>
    <?php $processes++;
} ?>
</body>
</html>
<style>
    .image-row {
        display: flex;
        margin: 20px;
    }
    .image-container {
        display: flex;
        height: 100%;
        width: 25%;
        padding: 10px;
        justify-content: center;
    }
    .image {
        max-width: 100%;
        max-height: 300px;
    }
</style>