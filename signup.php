<?php
session_start();
require 'src/db.php';
include 'header.php';

?>

<?php

if(isset($_POST['submit'])){
    $errMsg = '';
    //assign variables according to the html form value
    $useremail = trim($_POST['useremail']);
    $userpassword = trim($_POST['userpassword']);

    //case of error
    if (strlen($userpassword)<6){
        $errMsg .= 'Password is too short<br>';
    }else 
    // without error(sucessful sign up condition)
    if($errMsg == ''){
        //check if there are same email in our Database
        $check = $dbh->prepare("SELECT * FROM accounts WHERE email LIKE :email");
        $check->bindParam(':email', $useremail);

        $check->execute();
        $results = $check->fetch(PDO::FETCH_ASSOC);

        // $results returns false when there is no matching user name in our Database
        if(!$results){
            $stmt = $dbh->prepare("INSERT INTO accounts (email, password) VALUES (:useremail, :pw)");
            // $stmt->bindParam(':username', $username);
            $stmt->bindParam(':useremail',$useremail);
            $stmt->bindParam(':pw',$userpassword);

            // $username = $_POST['username'];
            $useremail = $_POST['useremail'];
            $userpassword = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
            $stmt->execute();

            $_SESSION['userEmail'] = $useremail;
            
            header('location:index.php');

            break;
        }else{
            $errMsg .= 'Email is already occupied';
        }
        
        
    }else{
        $errMsg .= 'Email and Password are not found<br>';
    }
}
?>

<div id="banner">
    <img src="img/logo.jpg"/>
</div>



<div class="container col-lg-4 col-md-4 col-md-offset-4 col-lg-offset-4">
    <h2>Sign up</h2>
    <?php
    if(isset($errMsg)){
        echo '<div style="color:#FF0000;text-align:center;font-size:15px;">'.$errMsg.'</div>';
    }
    ?>
    <form name="signin" action="" method="POST" >

        <fieldset class="form-group">
            <label for="usermail">Email</label>
            <input type="email" class="form-control" name="useremail" required>
        </fieldset>
        <fieldset class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="userpassword" placeholder="At least 6 characters" required>
        </fieldset>
        <button type="submit" name ='submit' class="btn btn-primary">Sign up</button>
        <p>Already have an account?<a href="login.php">Log in</a></p>
    </div>

    <?php
    include 'footer.php';
    ?>
