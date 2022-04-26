<?php
include "db_connect.php";
session_start();include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0){   
header('location:index.php');}
else{
if(isset($_POST['change']))
    {
$pswrd=md5($_POST['password']);$newpassword=md5($_POST['newpassword']);$usrnme=$_SESSION['emplogin'];
    $sql ="SELECT Password FROM Students WHERE Email=:username and Password=:password";
$query= $datbaseh -> prepare($sql);$query-> bindParam(':username', $usrnme, PDO::PARAM_STR);$query-> bindParam(':password', $pswrd, PDO::PARAM_STR);$query-> execute();$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update Students set Password=:newpassword where Email=:username";
$chngpwd1 = $datbaseh->prepare($con);$chngpwd1-> bindParam(':username', $usrnme, PDO::PARAM_STR);$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);$chngpwd1->execute();

$msg="Your Password succesfully changed";
}
else {
$error="Your current password is wrong";    
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>       
       
        <title>Change Password</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/><meta charset="UTF-8"> 
               
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
        <style>
[class~=errorWrap],[class~=succWrap]{padding-left:.104166667in;}[class~=errorWrap],[class~=succWrap]{padding-bottom:.104166667in;}[class~=succWrap],[class~=errorWrap]{padding-right:.104166667in;}[class~=errorWrap],[class~=succWrap]{padding-top:.104166667in;}[class~=succWrap],[class~=errorWrap]{margin-left:0;}[class~=succWrap],[class~=errorWrap]{margin-bottom:15pt;}[class~=errorWrap],[class~=succWrap]{margin-right:0;}[class~=errorWrap],[class~=succWrap]{margin-top:0;}[class~=errorWrap],[class~=succWrap]{background:#fff;}[class~=errorWrap]{border-left-width:3pt;}[class~=errorWrap]{border-left-style:solid;}[class~=errorWrap]{border-left-color:#dd3d36;}[class~=errorWrap]{border-image:none;}[class~=errorWrap],[class~=succWrap]{-webkit-box-shadow:0 .75pt .75pt 0 rgba(0,0,0,.1);}[class~=succWrap],[class~=errorWrap]{box-shadow:0 .75pt .0625pc 0 rgba(0,0,0,.1);}[class~=succWrap]{border-left-width:3pt;}[class~=succWrap]{border-left-style:solid;}[class~=succWrap]{border-left-color:#5cb85c;}[class~=succWrap]{border-image:none;}
        </style>
    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Change Pasword</div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">
                              
                                <div class="row">
                                    <form class="col s12" name="chngpwd" method="post">
                                          <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                        <div class="row">
                                            <div class="input-field col s12">
<input id="password" type="password"  class="validate" autocomplete="off" name="password"  required>
                                                <label for="password">Current Password</label>
                                            </div>

  <div class="input-field col s12">
 <input id="password" type="password" name="newpassword" class="validate" autocomplete="off" required>
                                                <label for="password">New Password</label>
                                            </div>

<div class="input-field col s12">
<input id="password" type="password" name="confirmpassword" class="validate" autocomplete="off" required>
 <label for="password">Confirm Password</label>
</div>


<div class="input-field col s12">
<button type="submit" name="change" class="waves-effect waves-light btn indigo m-b-xs" onclick="return valid();">Change</button>

</div>

                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                                
                   
                    </div>
                
                </div>
            </main>

        </div>
        <div class="left-sidebar-hover"></div>     
                
    </body>
</html>
<?php } ?> 