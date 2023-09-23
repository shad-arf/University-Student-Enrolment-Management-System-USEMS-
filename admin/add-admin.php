<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    // get this user infromation
    
    $adminid=$_SESSION['aid'];
    $ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) {
         if($row['type']!='super_admin'){
            header('location:dashboard.php');


         }
    
    }

    if (isset($_POST['submit'])) {
        
        $username = $_POST['username'];
        $password=md5($_POST['password']);
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $type = $_POST['faculty'];
        echo $type;
    
// echo $phone;

try{

    $query = mysqli_query($con, "insert into tbladmin(AdminName,AdminuserName,MobileNumber,Email,Password,type) VALUES ('$username','$username','$phone','$email','$password','$type')");
} catch (Exception $e) {
    // Handle the exception
    echo "Caught exception: " . $e->getMessage();
}
      // handle this query exception

      

     
     
        if ($query) {
            
            $msg = "admin has been added.";
            echo '<script>alert("Admin has been added.")</script>';
            echo "<script>window.location.href ='add-admin.php'</script>";
        } else {
            
            throw new Exception("Error executing query: " . mysqli_error($mysqli));
        }
    }
?>
    <!DOCTYPE html>
    <html class="loading" lang="en" data-textdirection="ltr">

    <head>

        <title>College Addmission Management System | Add Admin</title>
        <?php include('../include/links.php');?>
 <style>
            .errorWrap {
                padding: 10px;
                margin: 20px 0 0px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }

            .succWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }
        </style>


    </head>

    <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
        <?php include('includes/header.php'); ?>
        <?php include('includes/leftbar.php'); ?>
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">
                            Add Course
                        </h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                                    </li>

                                    </li>
                                    <li class="breadcrumb-item active">Course</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="content-body">
                    <!-- Input Mask start -->

                    <!-- Formatter start -->

                    <form name="course" method="post" >
                        <section class="formatter" id="formatter">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">add new Admin</h4>


                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">


                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-12">
                                                        <fieldset>
                                                            <h5>UserName

                                                            </h5>
                                                            <div class="form-group">

                                                                <input class="form-control white_bg" id="username" type="text" name="username" required>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-12">
                                                        <fieldset>
                                                            <h5>password

                                                            </h5>
                                                            <div class="form-group">

                                                                <input class="form-control white_bg" id="password" type="text" name="password" required>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>Faculty </h5>
                                <div class="form-group">
                                  <select name='faculty' id="faculty" class="form-control white_bg" required="true">
                                    <option value="super_admin">Super Admin</option>
                                  </select>
                                </div>
                              </fieldset>

                            </div>
                                                    <div class="col-xl-6 col-lg-12">
                                                        <fieldset>
                                                            <h5>email

                                                            </h5>
                                                            <div class="form-group">

                                                                <input class="form-control white_bg" id="email" type="text" name="email" required>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-12">
                                                        <fieldset>
                                                            <h5>phone

                                                            </h5>
                                                            <div class="form-group">

                                                                <input class="form-control white_bg" id="phone" type="text" name="phone" required>
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                </div>


                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-12">
                                                        <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">ADD</button>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Formatter end -->
                    </form>


                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <?php include('includes/footer.php'); ?>
        <?php include('includes/footerjs.php'); ?>
    
    </body>

    </html>
<?php }  ?>