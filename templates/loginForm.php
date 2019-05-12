<?php
/**
 * @var string $info
 */
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
<body style="background-color: rgba(255,167,11,0.29); margin-top: 200px">
    <form action="" method="POST" style="text-align: center">
        <?php if ($info !== '') : ?>
            <strong style="color: red"><?php echo($info) ?></strong>
            <br>
            <br>
        <?php endif; ?>
        <label>Username: <input type="text" placeholder="username" name="login"></label>
        <br>
        <label>Password: <input type="password" placeholder="password" name="password"></label>
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
<style>
    input {
        margin-bottom: 10px;
    }
</style>