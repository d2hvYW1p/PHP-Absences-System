<?php
session_start();
include "db_connect.php";
include ('includes/config.php');
if (isset($_POST['signin']))
{
    $userna = $_POST['username'];
    $pswrd = md5($_POST['password']);
    $sql = "SELECT Email,Password,Status,id FROM Students WHERE Email=:usern and Password=:password";
    $query = $datbaseh->prepare($sql);
    $query->bindParam(':usern', $userna, PDO::PARAM_STR);
    $query->bindParam(':password', $pswrd, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0)
    {
        foreach ($results as $result)
        {
            $status = $result->Status;
            $_SESSION['sid'] = $result->sid; 
            
        }
        if ($status == 1)
        {

            $_SESSION['emplogin'] = $_POST['username'];
            echo "<script type='text/javascript'> document.location = 'indexchangepswd.php'; </script>";
            $_SESSION['role'] = 0;
            }
    }

    else
    {   
        $userna1 = $_POST['username'];
        $pswrd1 = md5($_POST['password']);
        $sql1 = "SELECT username,Password,id FROM users WHERE username=:usern and Password=:password";
        $query1 = $datbaseh->prepare($sql1);
        $query1->bindParam(':usern', $userna1, PDO::PARAM_STR);
        $query1->bindParam(':password', $pswrd1, PDO::PARAM_STR);
        $query1->execute();
        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
        if ($query1->rowCount() > 0)
        {
        
            foreach ($results as $result1)
            {
                $status = $result->Status;
                $_SESSION['sid'] = $result->id; 
                
            }
            

                $_SESSION['emplogin'] = $_POST['username'];
                echo "<script type='text/javascript'> document.location = 'indexchangepswd.php'; </script>";
                $_SESSION['role'] = 1;
        }

        else
        {
            
            echo "<script>alert(' Wrong Credentials ');</script>";
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
            
        <title>ATH TECH | ABSENCES PORTAL</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">        

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>

        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
               
    </head>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="deep-orange darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">
                            <span class="chapter-title"> ATH TECH | ABSENCES SYSTEM</span>
                        </div>


                        </form>


                    </div>
                </nav>
            </header>

            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">


                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" style="">
                    <li>&nbsp;</li>
                    <li class="no-padding"><a class="waves-effect waves-purple" href="index.php"><i class="material-icons">account_box</i>Student/Proffesor Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-purple" href="forgot-password.php"><i class="material-icons">account_box</i> Password Recovery</a></li>                 

                </ul>
         
            </aside>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"><h4>If you are a bad boy you will get an absence</h4></div>

                          <div class="col s12 m6 l8 offset-l2 offset-m3">
                              <div class="card white darken-1">

                                  <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;">Student/Proffesor Login</span>
                                         <?php if ($msg)
{ ?><div class="errorWrap"><strong>Error</strong> : <?php echo htmlentities($msg); ?> </div><?php
} ?>
                                       <div class="row">
                                           <form class="col s12" name="signin" method="post">
                                               <div class="input-field col s12">
                                                   <input id="username" type="text" name="username" class="validate" autocomplete="off" required >
                                                   <label for="email">Email Id</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password" type="password" class="validate" name="password" autocomplete="off" required>
                                                   <label for="password">Password</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">

                                                   <input type="submit" name="signin" value="Sign in" class="waves-effect waves-light btn teal">
                                               </div>
                                           </form>
                                      </div>
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
