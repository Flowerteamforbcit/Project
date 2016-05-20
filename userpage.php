<?php
session_start();
require 'src/db.php';
include 'header.php';
?>


<?php

if(isset($_POST['submit'])){
    $errMsg = '';
    $successMsg ='';
        //userEmail and password sent from Form
    $userEmail = $_SESSION['userEmail'];
    $oldPW = trim($_POST['oldPW']);
    $newPW = password_hash(trim($_POST['newPW']), PASSWORD_DEFAULT);
    $newPwComfirm = trim($_POST['newPwComfirm']);


    if($oldPW == '')
        $errMsg .= 'You must enter your Old password<br>';



    if($errMsg == ''){
        try{
            $records = $dbh->prepare('SELECT id,email,password FROM  accounts WHERE email = :userEmail');
            $records->bindParam(':userEmail', $userEmail);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);

            if(count($results) > 0 && (password_verify($oldPW,$results['password']))){

                $editPW = $dbh->prepare('UPDATE accounts SET password=:newPW WHERE email=:userEmail');
                $editPW->bindParam(':userEmail',$userEmail);
                $editPW->bindParam(':newPW',$newPW);
                $editPW->execute();
                $successMsg = 'Password has been changed successfully';
            }
			else{
				$errMsg .= 'Password is not matching<br>';

			}
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    else{
        $errMsg .= 'Email and Password are not found<br>';
    }

}

?>

<div id="banner">
    <img src="img/logo.jpg"/>
</div>
<div class="jumbotron container">
    <h2>Hi <?php echo $_SESSION['userEmail']; ?></h2>
    <p> This page is for editing your account information </p>
    <?php
    if(isset($errMsg)){
        echo '<div style="color:#FF0000;text-align:center;font-size:15px;">'.$errMsg.'</div>';
    }
    if(isset($successMsg)){
        echo '<div style="color:#2E2F31;text-align:center;font-size:15px;">'.$successMsg.'</div>';
    }
    ?>
    <a id="changePW"><h3>Change Password</h3></a>
    
    <div id="editForm" style="display:none">

        <form name="changePW" action="" method="POST" >
            <div class="form-group">
                <label>Your Old password </label>
                <input type="password" class="form-control" name="oldPW">
            </div>
            <div class="form-group">
                <label>Your New password </label>
                <input type="password" class="form-control" name="newPW">
            </div>
            <div class="form-group">
                <label>Confrim your New password </label>
                <input type="password" class="form-control" name="newPwComfirm">
            </div>
            <button type="submit" name ='submit' class="btn btn-primary">Change</button>
        </form>
    </div>
</div>



<script type="text/javascript" src="js/animation.js"></script>
<?php
include 'footer.php';
?>