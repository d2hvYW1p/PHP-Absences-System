<?php
session_start();
include "db_connect.php";
include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0)
    {   
header('location:index.php');
}
else{
$sid=$_SESSION['emplogin'];
if(isset($_POST['update'])){
$fname=$_POST['firstName'];$lname=$_POST['lastName'];   
$gender=$_POST['gender']; $dob=$_POST['dob']; 
$year=$_POST['year']; $address=$_POST['address']; 
$city=$_POST['city']; $country=$_POST['country']; 
$mobileno=$_POST['mobileno']; 
$sql="update Students set FirstName=:fname,LastName=:lname,Gender=:gender,Dob=:dob,AcademicYear=:year,Address=:address,City=:city,Country=:country,Phonenumber=:mobileno where Email=:sid";
$query = $datbaseh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->execute();
$msg=" Your private information  are updated   Successfully";
}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title> Personal Information</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">       
        
        <!-- Styles -->
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
  .errorWrap,[class~=succWrap]{padding-left:.625pc;}[class~=succWrap],.errorWrap{padding-bottom:.625pc;}[class~=succWrap],.errorWrap{padding-right:.625pc;}[class~=succWrap],.errorWrap{padding-top:.625pc;}[class~=succWrap],.errorWrap{margin-left:0;}.errorWrap,[class~=succWrap]{margin-bottom:1.25pc;}.errorWrap,[class~=succWrap]{margin-right:0;}[class~=succWrap],.errorWrap{margin-top:0;}[class~=succWrap],.errorWrap{background:#fff;}.errorWrap{border-left-width:4px;}.errorWrap{border-left-style:solid;}.errorWrap{border-left-color:#dd3d36;}.errorWrap{border-image:none;}[class~=succWrap],.errorWrap{-webkit-box-shadow:0 .75pt .0625pc 0 rgba(0,0,0,.1);}.errorWrap,[class~=succWrap]{box-shadow:0 1px .75pt 0 rgba(0,0,0,.1);}[class~=succWrap]{border-left-width:3pt;}[class~=succWrap]{border-left-style:solid;}[class~=succWrap]{border-left-color:#5cb85c;}[class~=succWrap]{border-image:none;}
        </style>
    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
   <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Personal Information </div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">

                            <div class="card-content">

                                <form id="example-form" method="post" name="updatemp">

                                    <div>
                                        <h3>Update Personal Information</h3>
                                           <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
<?php 
$sid=$_SESSION['emplogin'];$sql = "SELECT * from  Students where Email=:sid";$query = $datbaseh -> prepare($sql);
$query -> bindParam(':sid',$sid, PDO::PARAM_STR);$query->execute();$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){
foreach($results as $result)
{               ?> 
 <div class="input-field col  s12">
<label for="csnumber">CS Number</label>
<input  name="csnumber" id="csnumber" value="<?php echo htmlentities($result->StudID);?>" type="text" autocomplete="off" readonly required>
<span id="empid-availability" style="font-size:12px;"></span> 
</div>

<div class="input-field col s12">
<label for="phone">Mobile number</label>
<input id="phone" name="mobileno" type="tel" value="<?php echo htmlentities($result->Phonenumber);?>" maxlength="10" autocomplete="off" required>
 </div>
</div>
</div>

<div class="col m6">
<div class="row">
<div class="input-field col m6 s12">
<select  name="gender" autocomplete="off">
<option value="<?php echo htmlentities($result->Gender);?>"><?php echo htmlentities($result->Gender);?></option>                                          
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>
</div>                                                    

<div class="input-field col m6 s12">
<select  name="year" autocomplete="off">
<option value="<?php echo htmlentities($result->AcademicYear);?>"><?php echo htmlentities($result->AcademicYear);?></option>
<?php $sql = "SELECT AcademicYearName from academicyears";
$query = $datbaseh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $resultt)
{   ?>                                            
<option value="<?php echo htmlentities($resultt->AcademicYearName);?>"><?php echo htmlentities($resultt->AcademicYearName);?></option>
<?php }} ?>
</select>
</div>

<div class="input-field col m6 s12">
  <label for="city">City/Town</label>
  <input id="city" name="city" type="text" value="
			<?php echo htmlentities($result->City);?>" autocomplete="off" required>
</div>

<div class="input-field col m6 s12">
  <label for="country">Country</label>
  <input id="country" name="country" type="text" value="
				<?php echo htmlentities($result->Country);?>" autocomplete="off" required>
</div>                                                          

<?php }}?>
                                                        
<div class="input-field col s12">
<button type="submit" name="update"  id="update" class="waves-effect waves-light btn indigo m-b-xs">UPDATE</button>

</div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>                                    
                                    
                                        </section>
                                    </div>
                                </form>
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