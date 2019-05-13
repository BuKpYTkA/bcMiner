<?php
/**
 * @var string $login
 * @var string $password
 * @var string $wallet
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
<body style="background-color: rgba(255,167,11,0.29); padding-bottom: 50px">
<h1 style="text-align: center">Your account has been generated</h1>
<div style="text-align: center; display: flex">
    <div class="mainInfo">
        <h3>To have access to your account you must activate it by paying
            0.004 BTC</h3>
        <div id="wallet">
            <label>BTC: <input style="width: 270px" type="text" value="<? echo($wallet) ?>"></label>
            <h4>Required payment time - 1 hour</h4>
            <h5>(if payment status is "success" you are able to <a href="/login">LOGIN</a>)</h5>
        </div>
    </div>
    <div class="mainInfo">
        <div id="loginInfo">
            <label>Username: <input type="text" value="<? echo($login) ?>"></label>
            <br>
            <br>
            <label>Password: <input type="text" value="<? echo($password) ?>"></label>
        </div>
        <p style="color:red;">Attention: DON'T FORGET TO SAVE YOUR LOGIN INFO</p>
    </div>
</div>
<div style="text-align: center; padding-top: 50px">
    <br>
    <h1>payment status: still in process</h1>
    <div style="position: relative">
        <img src="/image/payment.gif" alt="" width="150px">
        <div class="layer">
        </div>
    </div>
    <br>
    <h3></h3>
</div>
</body>
</html>
<style>
    .mainInfo {
        width: 50%;
    }

    #loginInfo {
        padding: 15px;
        width: 250px;
        display: inline-block;
        border: 1px solid black;
        background-color: rgb(218, 183, 120);
        margin-top: 25px;
        margin-bottom: 10px;
    }

    .layer {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }
</style>