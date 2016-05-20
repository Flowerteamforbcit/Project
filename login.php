<?php
session_start();
require 'src/db.php';
include 'header.php';

?>

<?php

if(isset($_POST['submit'])){
    $errMsg = '';
        //userEmail and password sent from Form
    $userEmail = trim($_POST['userEmail']);
    $password = trim($_POST['password']);

    if($userEmail == '')
        $errMsg .= 'You must enter your Email<br>';

    if($password == '')
        $errMsg .= 'You must enter your Password<br>';


    if($errMsg == ''){
        $records = $dbh->prepare('SELECT id,email,password FROM  accounts WHERE email = :userEmail');
        $records->bindParam(':userEmail', $userEmail);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if(count($results) > 0 && (password_verify($password,$results['password']))){
            $_SESSION['userEmail'] = $results['email'];
            header('location:index.php');

            exit;

        }else{
            $errMsg .= 'userEmail and Password are not found<br>';
        }

    }
}
?>

<div id="banner">
    <img src="img/logo.jpg"/>
</div>

<div class="container col-lg-4 col-md-4 col-md-offset-4 col-lg-offset-4">
    <h2>Login</h2>
    <?php
    if(isset($errMsg)){
        echo '<div style="color:#FF0000;text-align:center;font-size:15px;">'.$errMsg.'</div>';
    }
    ?>
    <form action="" method="post">
      <fieldset class="form-group">
        <label>Email</label><input type="text" class="form-control" name="userEmail">
    </fieldset>
    <fieldset class="form-group">
        <label>Password</label><input type="password" class="form-control" name="password" placeholder="Password">
    </fieldset>
    <button type="submit" name ='submit' class="btn btn-primary">Log in</button>
</div>

<?php
include 'footer.php';
?>