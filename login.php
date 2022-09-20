<?php
include_once('connection.php');

if(isset($_POST['login'])){

    $query="SELECT * FROM user WHERE user_id = '".$_POST['staffid']."' AND user_pass = '".$_POST['staffpass']."'";
    $result=mysqli_query($con,$query);

    if($row=mysqli_fetch_assoc($result)){
        
        /*session_start();
        $_SESSION['user']=$_POST['staffid'];
        echo"<script> window.location.href='index.php'</script>";*/

        $user_type = $row['user_type'];
        
        if($user_type==1){
            session_start();
            $_SESSION['staff']=$_POST['staffid'];
            echo "<script> window.location.href='index.php'</script>";
        }else{
            session_start();
            $_SESSION['admin']=$_POST['staffid'];
            echo "<script> window.location.href='index.php'</script>";
        }

    }else{
        echo "<script> window.alert('Invalid ID or Password')</script>";
        echo"<script> window.location.href='login.php'</script>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="images/logo-mbk-lg.png" alt="logo">
                        </div>
                        <h4>i-Dasar | Majlis Bandaraya Kuantan</h4>
                        <h6 class="fw-light">Sign in to continue.</h6>
                        <form method="post" class="pt-3 form-group">
                            <div class="form-group has-validation">
                                <input type="text" class="form-control form-control-lg is" id="staffid" name="staffid" placeholder="Staff Id">
                                
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="staffpass" name="staffpass" placeholder="Password">
                                
                            </div>
                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-block btn-primary" name="login">SIGN IN</a>
                            </div>
                            <!--<div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input">
                                    Keep me signed in
                                </label>
                                </div>
                                <a href="#" class="auth-link text-black">Forgot password?</a>
                            </div>-->
                        </form>
                    </div>
                    <!--<footer class="footer mt-3">
                        <div class="container-fluid">
                            <div class="footer-content text-center small">
                                <span class="text-muted">&copy; 2022 Majlis Bandaraya Kuantan. All Rights Reserved.</span>
                            </div>
                        </div>
					</footer>-->
                    <?php include('footer.php'); ?>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php include('js.php') ?>
</body>
</html>