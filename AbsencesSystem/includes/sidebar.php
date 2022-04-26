     <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                    <?php
$eid=$_SESSION['eid'];
$sql = "SELECT FirstName,LastName,StudID from  Students where id=:eid";
$query = $datbaseh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                <p><?php echo htmlentities($result->FirstName." ".$result->LastName);?></p>
                                <span><?php echo htmlentities($result->StudID)?></span>
                         <?php }} ?>
                        </div>
                    </div>

                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                 
  <li class="no-padding"><a class="waves-effect waves-grey" href="myprofile.php"><i class="material-icons">account_box</i>My Profiles</a></li>
  <li class="no-padding"><a class="waves-effect waves-grey" href="indexchangepswd.php"><i class="material-icons">settings_input_svideo</i>Change Password</a></li>
  <li class="no-padding"><a class="waves-effect waves-grey" href="ttendance_report.php"><i class="material-icons">settings_input_svideo</i>Absences Report</a></li>
  


                   <?php if ($_SESSION['role'] == 1): ?>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Admin Menu<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                
                                 <li class="no-padding"><a class="waves-effect waves-grey" href="check_attendance.php"><i class="material-icons">settings_input_svideo</i>Check Attendance</a></li>
                                 <li class="no-padding"><a class="waves-effect waves-grey" href="phpmail.php"><i class="material-icons">settings_input_svideo</i> Send Mail</a></li>
                                 <li class="no-padding"><a class="waves-effect waves-grey" href="testcour.php"><i class="material-icons">settings_input_svideo</i>Course Registration</a></li>
                                 <li class="no-padding"><a class="waves-effect waves-grey" href="class.php"><i class="material-icons">settings_input_svideo</i> Class Registration</a></li>
                               
                                
                            </ul>
                        </div>
                    </li>
                   <?php endif ?>


                  <li class="no-padding">
                                <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>


                </ul> 
                </div>
            </aside>

<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>

