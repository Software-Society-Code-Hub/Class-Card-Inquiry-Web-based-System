<?php session_start();
 if(!isset($_SESSION['Admin'])){
        header("Location:scripts/php/admin-login.php");
    }
?>
<?php
    include 'scripts/php/xmlupload.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/dependencies/bulma-0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="css/dependencies/bulma-0.7.1/css/bulma.css.map">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="hero is-fullheight is-info">
        <div class="hero-body">
            <div class="container">
                
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

                    <label class="label"><p class="title">Upload XML file</p></label>
                    <input type="file" name="StudentList" required><br>
                    <br>
                    <button class="button is-primary" value="submit" type="submit" name="submit">Submit XML file</button>
                    <button class="button is-danger"><a href="scripts/php/logout.php">Logout</a></button>
                </form><br>
            </div>
        </div>
    </div>
</body>

</html>