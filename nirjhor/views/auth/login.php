<?php
?>

<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href ="css/style.css">
    </head>
<body>
    <form action="../../controllers/authController.php" method="POST">
        Enter E-mail:
        <input type="email" name="email" placeholder="Input Email"><br>
        <span name="emailErr"><?php if(isset($_GET["emailErr"])){echo $_GET["emailErr"];}?></span><br>
        Password:
        <input type="password" name="password"placeholder="password"><br>
        <span name="passErr"><?php if(isset($_GET["passErr"])){echo $_GET["passErr"];}?></span><br>
        <input type="submit" name="submit" value="submit">

    </form>
    <span name="genErr"><?php if(isset($_GET["genErr"])){echo $_GET["genErr"];}?></span>
</body>
</html>
