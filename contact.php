<?php
  include 'include_lf/auth.php';
  include 'include_lf/connect.php';

  $student_no = $_SESSION['student_no'];
  $role = $_SESSION['role'];
  $surname = $_SESSION['surname'];
  $fullnames = $_SESSION['fullnames'];
?>
<?php
  $message = '';
  if(isset($_POST['submit'])) {
    $salute = strtolower($_POST['salute']);
    $comment = strtolower($_POST['comment']);

    $sql = "INSERT INTO comments (salute, student_no, comment)VALUES ('$salute', '$student_no', '$comment')";
    $connect->query($sql);
    header("Location: contact.php?msg=success");
    exit();
  }
  $message = "";
  if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
    $message = '<p id="autoCloseAlert"<strong>Success!</strong> Your profile has been successful updated.</p>';
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
              <li>
                <?php if ($role == 'Admin') { ?>
                  <a href="report_lf.php"><i class="glyphicon glyphicon-inbox"></i> Report_L&F</a>
                <?php } ?>
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
              <li class="active">
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
                  <span class="badge badge-light"> <i class="glyphicon glyphicon-user "></i><?php echo ucwords($surname.' '.$fullnames); ?> <span class="caret"></span></span></a>
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
        <li class="active">Contact Us</li>
      </ol>

      <div class="panel panel-default">
        <div class="panel-heading">
          <?php if ($role == 'Student') { ?>
          <div class="page-heading"> <i class="glyphicon glyphicon-envelope"></i> Contact Us</div>
          <?php } ?>
        </div> <!-- /panel-heading -->
        <div class="panel-body">
          <form class="form-horizontal" action="" method="post">

            <div class="col-md-6">
              <label for="Subject">Subject</label>
              <div class="input-group">
                <span class="input-group-addon"id="basic-addon1"><img src="vendor/icons/question.svg" alt="" width="20" height="20"></i></span>
                <input name="salute" type="text" class="form-control"placeholder="Password Reset"aria-describedby="basic-addon1">
              </div>
              <br>
              <label for="Message">Message</label>
              <div class="input-group">
                <span class="input-group-addon"id="basic-addon2"><img src="vendor/icons/envelope.svg" alt="" width="20" height="20"></span>
                <textarea name="comment" class="form-control" rows="8" cols="68" placeholder="Hi can you assist me with...." aria-describedby="basic-addon2" required></textarea>
              </div>
            </div> <!--/col-md-6-->
            <br>
            <div class="col-md-6">
              <div class="col-sm-12">
                <img src="assets/images/report.WEBP" class="responsive_pics" alt="Isithome">
              </div>
            </div> <!--/col-md-6-->
              <div class="form-group submitButtonFooter">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" name="submit" class="btn btn-success"><i class="glyphicon glyphicon-send"></i> Send Message</button>
                  <button type="reset" class="btn btn-default" onclick="resetMessageForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
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
<script src="assets/jquery/jquery-3.7.0.slim.min.js"></script>
<script src="assets/jquery/maxlength.js"></script>
<script type="text/javascript" src="js_crud_script/page_Loader.js"></script>
<script>
    $(() => {
        $('[maxlength]').maxlength();
        if($("#autoCloseAlert").length) {
        setTimeout(function() {
            $("#autoCloseAlert").fadeOut(5000, function(){
                $(this).remove
            });
        }),50000
    }
    });
</script>
