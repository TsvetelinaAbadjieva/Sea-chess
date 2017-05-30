<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>

    <title>Contact form</title>
</head>
<body>
<div>
    <form action="../php/check_username.php" method="post" id="formSend">
        <div><input type="text" name="username" placeholder="username"><span style="color:red"></span></div>
        <div><input type="email" name="email" placeholder="email"></div>
        <div><input type="password" name="password" placeholder="password"></div>

        <div><input type="text" name="subject" placeholder="subject"></div>
        <div><textarea cols="50" rows="8" type="text" name="message" placeholder="message"></textarea></div>
        <div><button type="submit" value="Send" id="submit">Send</button></div>
        <div id="error"></div>
    </form>
</div>
<script type= "text/javascript" src="../ajax/form_validate.js"></script>
</body>
</html>