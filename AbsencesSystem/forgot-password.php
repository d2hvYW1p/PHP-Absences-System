<?php
 goto l1skJ; FZOID: include "\151\x6e\x63\154\x75\x64\x65\163\x2f\143\x6f\156\146\151\147\56\160\x68\160"; goto qjFc8; k2gA5: error_reporting(0); goto FZOID; qjFc8: if (isset($_POST["\x63\150\x61\156\x67\x65"])) { $newpassword = md5($_POST["\x6e\145\167\x70\x61\x73\163\167\x6f\x72\x64"]); $empid = $_SESSION["\123\164\165\144\111\104"]; $con = "\165\160\144\141\x74\145\40\123\x74\x75\x64\x65\x6e\164\163\x20\163\x65\164\40\x50\141\x73\163\x77\157\x72\144\75\72\x6e\145\167\x70\141\163\163\x77\x6f\x72\144\40\167\150\x65\162\145\x20\151\144\75\x3a\123\x74\x75\144\111\104"; $chngpwd1 = $datbaseh->prepare($con); $chngpwd1->bindParam("\72\x53\164\165\144\x49\x44", $StudID, PDO::PARAM_STR); $chngpwd1->bindParam("\x3a\156\145\167\x70\141\163\163\167\x6f\x72\144", $newpassword, PDO::PARAM_STR); $chngpwd1->execute(); $msg = "\131\x6f\x75\162\40\120\141\x73\x73\x77\x6f\162\144\40\x73\x75\x63\143\145\x73\x66\165\154\x6c\x79\40\x63\150\x61\x6e\147\x65\x64"; } goto sd08v; l1skJ: session_start(); goto k2gA5; sd08v: ?>
<!DOCTYPE html>
<html lang="en">
    <head>
               
        <title> Password Recovery</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        

        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
  <style>
  [class~=succWrap],[class~=errorWrap]{padding-left:.625pc;}[class~=errorWrap],[class~=succWrap]{padding-bottom:.625pc;}[class~=succWrap],[class~=errorWrap]{padding-right:.625pc;}[class~=succWrap],[class~=errorWrap]{padding-top:.625pc;}[class~=succWrap],[class~=errorWrap]{margin-left:0;}[class~=succWrap],[class~=errorWrap]{margin-bottom:1.25pc;}[class~=succWrap],[class~=errorWrap]{margin-right:0;}[class~=errorWrap],[class~=succWrap]{margin-top:0;}[class~=errorWrap],[class~=succWrap]{background:#fff;}[class~=errorWrap]{border-left-width:.25pc;}[class~=errorWrap]{border-left-style:solid;}[class~=errorWrap]{border-left-color:#dd3d36;}[class~=errorWrap]{border-image:none;}[class~=errorWrap],[class~=succWrap]{-webkit-box-shadow:0 .0625pc .75pt 0 rgba(0,0,0,.1);}[class~=errorWrap],[class~=succWrap]{box-shadow:0 .75pt .010416667in 0 rgba(0,0,0,.1);}[class~=succWrap]{border-left-width:3pt;}[class~=succWrap]{border-left-style:solid;}[class~=succWrap]{border-left-color:#5cb85c;}[class~=succWrap]{border-image:none;}
        </style>
        
    </head>
    <body>
    <?php include('includes/header.php');?>
 
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                   
                  
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" style="">
                    <li>&nbsp;</li>
                    <li class="no-padding"><a class="waves-effect waves-red" href="index.php"><i class="material-icons">account_box</i>Student/Proffesor Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-red" href="forgot-password.php"><i class="material-icons">account_box</i> Password Recovery</a></li>
                                                      
                </ul>

            </aside>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"><h4> Password Recovery for our lovely users</h4></div>

                          <div class="col s12 m6 l8 offset-l2 offset-m3">
                              <div class="card white darken-1">

                                  <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;">User Details</span>
                                         <?php if($msg){?><div class="succWrap"><strong>Success </strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                       <div class="row">
                                           <form class="col s12" name="signin" method="post">
                                               <div class="input-field col s12">
                                                   <input id="StudID" type="text" name="StudID" class="validate" autocomplete="off" required >
                                                   <label for="email">Student Id</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password" type="text" class="validate" name="emailid" autocomplete="off" required>
                                                   <label for="password">Email id</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">
                                                
                                                   <input type="submit" name="submit" value="Sign in" class="waves-effect waves-light btn teal">
                                               </div>
                                           </form>
                                      </div>
                                  </div>
<?php if(isset($_POST['submit']))
{
$empid=$_POST['StudID'];
$badmail=$_POST['emailid'];
$sql ="SELECT id FROM Students WHERE Email=:email and StudID=:empid";
$query= $datbaseh -> prepare($sql);$query-> bindParam(':email', $badmail, PDO::PARAM_STR);$query-> bindParam(':empid', $empid, PDO::PARAM_STR);
$query-> execute();$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach ($results as $result) {
    $_SESSION['empid']=$result->id;
  } 
    ?>

 <div class="row">
          <span class="card-title" style="font-size:20px;">change your password </span>                                     
    <form class="col s12" name="udatepwd" method="post">
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
<?php } else{ ?>
<div class="errorWrap" style="margin-left: 2%; font-size:22px;">
 <strong>ERROR</strong> : <?php echo htmlentities("Invalid details");
}?></div>
<?php } ?>
                              </div>
                          </div>
                    </div>
                </div>
            </main>
            
        </div>
        <div class="left-sidebar-hover"></div>
        
        
        
    </body>
</html>