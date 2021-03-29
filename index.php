<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMA</title>
    <link rel="icon" sizes="100*100" href="./images/logo.png">
    <link rel="stylesheet"  href="./css/app.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/3eaa6e2d59.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php 
        include('./config/connection.php');
        include('./functions/function.php');
        include('./includes/pageEngine.php');

        if(isset($_SESSION['login'])){
            if($_SESSION['login']){
                include('./includes/template.php');
            }
        }else{
            include('./includes/login.php');
        }
    ?>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>