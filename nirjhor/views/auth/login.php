<?php
?>

<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href ="css/style.css">
    </head>
<body>
    <form action="../../controllers/authController.php" method="POST">
        User Id:
        <input type="text" name="id" placeholder="Input Id"><br>
        <span name="idErr"><?php if(isset($_GET["idErr"])){echo $_GET["idErr"];}?></span><br>
        Password:
        <input type="password" name="password"placeholder="Input password"><br>
        <span name="passErr"><?php if(isset($_GET["passErr"])){echo $_GET["passErr"];}?></span><br>
        <input type="submit" name="submit" value="submit">

    </form>
    <span name="genErr"><?php if(isset($_GET["genErr"])){echo $_GET["genErr"];}?></span>
</body>
</html>
