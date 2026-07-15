<?php
include 'include_lf/auth.php';
include 'include_lf/connect.php';

$student_no = $_SESSION['student_no'];
$role       = $_SESSION['role'];
$surname    = $_SESSION['surname'];
$fullnames  = $_SESSION['fullnames'];
?>
<?php

$message = '';

if (isset($_POST['submit_reporting'])) {

    $student_no = mysqli_real_escape_string($connect, trim($_POST['student_no']));
    $type_of_doc = mysqli_real_escape_string($connect, trim($_POST['type_of_doc']));
    $location = mysqli_real_escape_string($connect, trim($_POST['location']));

    // Check if student exists
    $result = mysqli_query(
        $connect,
        "SELECT fullnames, surname  FROM student_reg WHERE student_no = '$student_no'");

    if (!$result) {
        $message = '<div class="alert alert-danger">Database error.</div>';
    }
    elseif (mysqli_num_rows($result) == 0) {
        $message = '<div class="alert alert-danger">
                      The Student Number '.$student_no.' does not exist in our system.
                    </div>';
    } else {

        $row = mysqli_fetch_assoc($result);

        $fullnames = $row['fullnames'];
        $surname   = $row['surname'];
        $reported_by = $_SESSION['student_no'];

        $insert = mysqli_query( $connect,"INSERT INTO lost_found( student_no, fullnames, surname, type_of_doc,location, reported_by)
                          VALUES ('$student_no','$fullnames','$surname','$type_of_doc','$location','$reported_by')");

        if ($insert) {
            header("Location: report_lf.php?msg=success");
            exit();
        } else {
            $message = '<div class="alert alert-danger">Failed to save report. </div>';
        }
    }
}

if (isset($_GET['msg']) && $_GET['msg'] == 'success') {

    $message = '
    <div id="autoCloseAlert" class="alert alert-success">
        <strong>Success!</strong> Reported successfully.
    </div>';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
        <title>Nkanyiso Consulting Pty Ltd</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
            include 'assets/include_head_footer/header.php';
        ?>
      <script>
        function checkstudent_no_for_reporting(va) {
          $.ajax({
            type: "POST",
            url: "include_lf/stu_no_for_reporting.php",
            data:'student_no='+va,
            success: function(data){
              $("#student_no_for_reporting").html(data);
              }
            });
          }
      </script>
  </head>
 
  <body>
    <div class="container">
    <?php
        include 'assets/include_head_footer/loader.php';
      ?>
      <hr/>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Brand</a> -->
            <div class="navbar-header">
              <a class="navbar-brand" href="#"><img src="assets/images/logos.png" alt="Lost & Found"></a>
            </div>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li>
                <a href="home.php"><i class="glyphicon glyphicon-home"></i> Home</a>
              </li>
              <li>
                <?php if ($role == 'Admin') { ?>
                  <a href="manage_users.php"><i class="glyphicon glyphicon-wrench"></i> Manage Users</a>
                <?php } ?>
              </li>
              <li class="active">
                  <a href="report_lf.php"><i class="glyphicon glyphicon-inbox"></i> Report_L&F</a>
              </li>
              <li>
                <?php if ($role == 'Student') { ?>
                  <a href="manage_lf.php"><i class="glyphicon glyphicon-folder-open"></i> View_L&F</a>
                <?php } ?>
              </li>
              <li>
                <?php if ($role == 'Admin') { ?>
                  <a href="manage_lf.php"><i class="glyphicon glyphicon-folder-open"></i> Manage_L&F</a>
                <?php } ?>
              </li>
              <li>
                <?php if ($role == 'Student') { ?>
                  <a href="messages.php"><i class="glyphicon glyphicon-comment"></i> Messages</a>
                <?php } ?>
              </li>
              <li>
                <?php if ($role == 'Student') { ?>
                  <a href="contact.php"><i class="glyphicon glyphicon-envelope"></i> Contact Us</a>
                <?php } ?>
              </li>
              <li class="dropdown">
                <?php if ($role == 'Admin') { ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                  <i class="glyphicon glyphicon-asterisk"></i> Setting Up <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="add_doc_type.php"> <i class="glyphicon glyphicon-save-file"></i>Add Doc Type</a></li>
                  <li><a href="add_location.php"> <i class="glyphicon glyphicon-map-marker"></i>Add Location</a></li>
                </ul>
                <?php } ?>
              </li>
              <li>
                <?php if ($role == 'Admin') { ?>
                  <a href="messages.php"><i class="glyphicon glyphicon-comment"></i> Messages</a>
                <?php } ?>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" style="color: lightblue" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="badge badge-light"> <i class="glyphicon glyphicon-user "></i><?php echo " ". ucwords($surname.' '.$fullnames); ?> <span class="caret"></span></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="profile.php"><i class="glyphicon glyphicon-cog"></i> Profile</a></li>
                  <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <ol class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li class="active">Report L&F</li>
      </ol>

      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <?php if ($role == 'Admin') { ?>
          <div class="page-heading"> <i class="glyphicon glyphicon-inbox"></i> Report L&F</div>
          <?php } ?>
          <?php if ($role == 'Student') { ?>
          <div class="page-heading"> <i class="glyphicon glyphicon-inbox"></i> Report L&F</div>
          <?php } ?>
        </div> <!-- /panel-heading -->
        <div class="panel-body">
          <div class="col-md-8">
            <p>Everything is important to us</p>
            <p>Take few munites to return it to owner</p>
            <p>Follow this few ticks </p>
          </div>
          <form class="form-horizontal" action="" id="frmDemo" method="post">

            <div class="col-md-6">
              
              <div class="form-group">
                <label for="feedback" class="col-sm-4 control-label">Feedback on reporting</label>
                <div class="col-sm-8">
                <small><div class="alert alert-success"><?php echo $message; ?></div></small>
                </div>
              </div>

              <div class="form-group">
                <label for="student_no" class="col-sm-4 control-label">Enter Student No.:</label>
                <div class="col-sm-8">
                  <input type="text" id="student_no" name="student_no" maxlength="9" onblur="checkstudent_no_for_reporting(this.value)" class="form-control" value="" required="true" autofocus>
                  <small><span id="student_no_for_reporting"></span></small>
                </div>
              </div> <!--/form-group-->

              <div class="form-group">
                <label for="contact_no" class="col-sm-4 control-label">Type of Document:</label>
                <div class="col-sm-8">
                  <select class="form-control" name="type_of_doc" id="type_of_doc" required>
                    <option value="">-- Select --</option>
                    <?php 
                      $select_doc_type = "SELECT document_id, document_name FROM doc_type 
                                          WHERE document_status = '1' ORDER BY document_name ASC ";
                      $result_doc_type = $connect->query($select_doc_type);
                      while ($row = $result_doc_type->fetch_assoc()) {
                        echo '<option value="'.$row['document_name'].'">'.$row['document_name'].'</option>';
                      }
                    ?>
                    
                  </select>
                </div>
              </div> <!--/form-group-->

              <div class="form-group">
                <label for="location" class="col-sm-4 control-label">Where to Collect:</label>
                <div class="col-sm-8">
                  <select class="form-control" name="location" id="location" required>
                    <option value="">-- Select --</option>
                      <?php 
                      $select_location = "SELECT location_id, location_name FROM locations 
                                          WHERE location_status = '1' ORDER BY location_name ASC ";
                      $result_location = $connect->query($select_location);
                      while ($row = $result_location->fetch_assoc()) {
                        echo '<option value="'.$row['location_name'].'">'.$row['location_name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div> <!--/form-group-->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="col-sm-12">
                  <img src="assets/images/report.gif" class="responsive_pics" alt="Isithome">
                </div>
              </div> <!--/col-md-6-->
            </div>

            <div class="form-group submitButtonFooter">
              <div class="col-sm-offset-4 col-sm-10">
                <button type="submit" name="submit_reporting" id="submit_reporting" class="btn btn-success">
                  <i class="glyphicon glyphicon-ok-sign"></i> Submit
                </button>
                <button type="reset" class="btn btn-default" onclick="resetReportForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <footer>
        <p style="color: lightgrey" align="center"><i><b> Copyright <i class="glyphicon glyphicon-registration-mark"></i> | All Rights Reserved | Designed by Nkanyiso Consulting Pty Ltd</b></i></p>
      </footer>
    </div>
  </body>
</html>
<script type="text/javascript" src="assets/src/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="assets/src/jquery-key-restrictions.js"></script>

<script src="assets/jquery/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js_crud_script/page_Loader.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
      $("#student_no").numbersOnly();

      if ($("#autoCloseAlert").length) {
        setTimeout(function () {
            $("#autoCloseAlert").fadeOut(1000, function () {
                $(this).remove();
            });
        }, 5000);
    }
  });
</script>

