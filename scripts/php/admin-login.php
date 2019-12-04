<?php
if($_POST){
include 'config.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con,$sql);
        
        if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['Admin'] = 'true';
            header('location:../../../Class-Card-Inquiry-LCC-Website-migration/admin.php');
        } else {
            echo "wrong code";
        }
}
?>
<!DOCTYPE Html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="shortcut icon" type="image/png" href="css/img/lcclogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/dependencies/bulma-0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="../../css/dependencies/bulma-0.7.1/css/bulma.css.map">
    <style>
        .input {
            width: 50%;
        }

        @media screen and (max-width: 1000px) {
            .input {
                width: 50% !important;
            }

            h1 {
                width: 100% !important;
                padding: 5 !important;
            }
        }
    </style>
</head>

<body>
    <div class="hero is-fullheight is-info">
        <div class="hero-body">
            <div class="container">
                <form method="post">
                    <h1 class="title">Admin login</h1>
                    <label class="label"><p class="subtitle">Username:</p> </label>
                    <input type="text" class="input" placeholder="input username" name="username">
                    <label class="label"><p class="subtitle">Password: </p></label>
                    <input type="password" class="input" placeholder="input password" name="password"><br><br>
                    <button type="submit" value="submit" class="button is-primary" name="submit">Log In</button>
                    <button class="button is-warning"><a href="../../index.html">Home</a></button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>