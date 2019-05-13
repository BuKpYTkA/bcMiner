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
<body style="background-color: rgba(255,167,11,0.29);">
<h1>TITLE</h1>
<?php foreach ($images as $image) {
    if ($image !== 'payment.gif') {
        if ($processes % 4 === 0) : ?>
            <div class="image-row">
        <?php endif; ?>

            <div class="image-container">
                <div style="position: relative">
                    <img class="image" src="<?php echo 'image/' . $image ?>" alt="">
                    <div class="layer">
                    </div>
                </div>
            </div>
        <?php if ($processes % 4 === 3) { ?>
            </div>
        <?php } ?>
        <?php $processes++;
    }
} ?>
</body>
</html>
<style>
    .image-row {
        display: flex;
        margin-left: 10%;
        margin-right: 10%;
    }

    .image-container {
        height: auto;
        width: 25%;
        padding: 3%;
        justify-content: center;
    }

    .layer {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    .image {
        max-width: 100%;
        max-height: 100%;
        background-size: auto;
    }

    @media screen and (max-width: 540px) {
        .image-row {
            margin-left: 5px;
            margin-right: 5px;
        }

        .image-container {
            padding: 5px;
        }
    }

    @media screen and (min-width: 540px) and (max-width: 780px) {
        .image-row {
            margin-left: 10px;
            margin-right: 10px;
        }

        .image-container {
            padding: 5px;
        }
    }

    @media screen and (min-width: 780px) and (max-width: 1200px) {
        .image-row {
            margin-left: 10px;
            margin-right: 10px;
        }

        .image-container {
            padding: 15px;
        }
    }
</style>