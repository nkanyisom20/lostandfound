<?php
  include 'include_lf/auth.php';
  include 'include_lf/connect.php';

  include 'include_lf/select_profile.php';

  $student_no = $_SESSION['student_no'];
  $role = $_SESSION['role'];
  $surname = $_SESSION['surname'];
  $fullnames = $_SESSION['fullnames'];
?>
<?php

  if(isset($_POST['submit'])) {
    $fullnames = ucwords (htmlspecialchars($_POST['fullnames']));
    $surname = ucfirst (htmlspecialchars($_POST['surname']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = htmlspecialchars($_POST['gender']);
    $identity_no = htmlspecialchars($_POST['identity_no']);
    $email_addr = strtolower (htmlspecialchars($_POST['email_addr']));
    $date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth']));
    $contact_no = htmlspecialchars($_POST['contact_no']);
    $biography = htmlspecialchars($_POST['biography']);

    if (!empty($_POST['password'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE student_reg SET fullnames='$fullnames',surname='$surname', password='$password', gender='$gender' WHERE student_no='$student_no'";
      } 
      else 
      {
       $sql = "UPDATE student_reg SET fullnames='$fullnames', surname='$surname', gender='$gender' WHERE student_no='$student_no'";
     }
      
    $connect->query($sql);

    $_SESSION['surname'] = $surname;
    $surname = $_SESSION['surname'];
    
    $_SESSION['fullnames'] = $fullnames;
    $fullnames = $_SESSION['fullnames'];

    $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no;");
    if($row = mysqli_fetch_array($result)){
      $stu_reg_id = $row['stu_reg_id'];
      }
    $sql = "UPDATE student_inf SET identity_no = '$identity_no', email_addr = '$email_addr', date_of_birth = '$date_of_birth', contact_no = '$contact_no', biography = '$biography'
    WHERE stu_reg_id = $stu_reg_id";

    $connect->query($sql);
    if ($sql) { 
      header("Location: profile.php?msg=success");
      exit();
    }
    
  }
  $message = "";
  if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
   $message = '<div id="autoCloseAlert" class="alert alert-success">
    			<strong>Success!</strong> Your profile was successfully updated.
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
  </head>
  <body>
    <div class="container">
      
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
              <li class="dropdown active">
                <a href="#" style="color: lightblue" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="badge badge-light"> <i class="glyphicon glyphicon-user "></i><?php echo " ". ucwords($surname.' '.$fullnames); ?> <span class="caret"></span></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="active"><a href="profile.php"><i class="glyphicon glyphicon-cog"></i> Profile</a></li>
                  <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div>
      </nav>
      <ol class="breadcrumb">
        <li><a href="home.php">Home</a></li>
  		  <li class="active">Profile</li>
  		</ol>

      <div class="panel panel-default">
        <div class="panel-heading">
          <?php if ($role == 'Admin') { ?>
  				<div class="page-heading"> <i class="glyphicon glyphicon-cog"></i> Profile</div>
          <?php } ?>
          <?php if ($role == 'Student') { ?>
  				<div class="page-heading"> <i class="glyphicon glyphicon-cog"></i> Profile</div>
          <?php } ?>
  			</div> <!-- /panel-heading -->
        <div class="panel-body">
          <form class="form-horizontal" action="" method="post">
            <div class="col-md-6">
              <div class="form-group">
                <label for="fullnames" class="col-sm-3 control-label">Fullnames</label>
                <div class="input-group col-sm-8">
                  <span class="input-group-addon"id="basic-addon1"><img src="vendor/icons/person.svg" alt="" width="20" height="20"></i></span>
                  <input type="text" class="form-control" name="fullnames" maxlength="30" id="fullnames"value="<?php echo $fullnames; ?> " aria-describedby="basic-addon1">
                </div>
              </div>

              <div class="form-group">
                <label for="surname" class="col-sm-3 control-label">Surname</label>
                <div class="input-group col-sm-8">
                  <span class="input-group-addon"id="basic-addon2"><img src="vendor/icons/at.svg" alt="" width="20" height="20"></i></span>
                  <input type="text" class="form-control" name="surname" maxlength="30" id="surname" value="<?php echo $surname; ?>" aria-describedby="basic-addon2">
                </div>
              </div>

              <div class="form-group">
                <label for="student_no" class="col-sm-3 control-label">Student No.</label>
                <div class="input-group col-sm-8">
                  <span class="input-group-addon"id="basic-addon3"><img src="vendor/icons/person-lock.svg" alt="" width="20" height="20"></i></span>
                  <input type="text" class="form-control" name="student_no" value="<?php echo $student_no; ?> " aria-describedby="basic-addon3" disabled>
                </div>
              </div>

              <div class="form-group">
                <small style="color: purple"><i>( Leave this blank if you do not want to change the password. )</i></small>
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="input-group col-sm-8">
                  <span class="input-group-addon"id="basic-addon4"><img src="vendor/icons/key.svg" alt="" width="20" height="20"></i></span>
                  <input type="password" class="form-control" name="password" id="password" aria-describedby="basic-addon4">
                </div>
                <label for="password" class="col-sm-3 control-label">Show</label>
                <div class="col-sm-8">
                  <input type="checkbox" id="showPassword">  
                </div>
              </div>

              <div class="form-group">
                <label for="identity_no" class="col-sm-3 control-label">Identity No.</label>
                <div class="input-group col-sm-8">
                  <span class="input-group-addon"id="basic-addon3"><img src="vendor/icons/upc.svg" alt="" width="20" height="20"></i></span>
                  <input type="text" class="form-control" name="identity_no" id="identity" maxlength="16" value="<?php echo $identity_no; ?>" placeholder="XXXXXX XXXX XX X" required>
                </div>
              </div>

              <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Notes</label>
                <div class="col-sm-8">
                  <small><i><?php echo $message; ?></i></small>
                </div>
              </div>

            </div>

            <div class="col-md-6">
              <fieldset class="form-group">
                <legend class="col-sm-3 control-label">Gender</legend>
                  <label for="female" class="col-sm-3 control-label">Female</label>
                  <div class="col-sm-1">
                    <input type="radio" class="form-control" name="gender" <?php if (isset($gender) && $gender == "Female" ) echo "checked";?> value="Female" required>
                  </div>
                  <label for="male" class="col-sm-3 control-label">Male</label>
                  <div class="col-sm-1">
                    <input type="radio" class="form-control" name="gender" <?php if (isset($gender) && $gender  == "Male" ) echo "checked";?> value="Male" required>
                  </div>
              </fieldset>

              <div class="form-group">
                <label for="email_addr" class="col-sm-3 control-label">Email Address</label>
                <div class="input-group col-sm-8">
                  <span class="input-group-addon"id="basic-addon4"><img src="vendor/icons/envelope-at.svg" alt="" width="20" height="20"></i></span>
                  <input type="text" class="form-control" name="email_addr" value="<?php echo $email_addr; ?>"placeholder="xxxxx@lost_found.com" aria-describedby="basic-addon4" required>
                </div>
              </div>

              <div class="form-group">
                <label for="date_of_birth" class="col-sm-3 control-label">Date of Birth</label>
                <div class="input-group col-sm-8">
                  <span class="input-group-addon"id="basic-addon4"><img src="vendor/icons/calendar2-date.svg" alt="" width="20" height="20"></i></span>
                  <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?php echo date("Y-m-d",strtotime($date_of_birth)); ?>" aria-describedby="basic-addon3" required>
                </div>
              </div>

              <div class="form-group">
                <label for="contact_no" class="col-sm-3 control-label">Contact No.</label>
                <div class="input-group col-sm-8">
                  <span class="input-group-addon"id="basic-addon5"><img src="vendor/icons/telephone.svg" alt="" width="20" height="20"></i></span>
                  <input type="text" class="form-control" name="contact_no" id="contact" maxlength="12" value="<?php echo $contact_no; ?>" aria-describedby="basic-addon5" placeholder="XXX XXX XXXX " required>
                </div>
              </div>

              <div class="form-group">
                <label for="biography" class="col-sm-3 control-label">Full Biography</label>
                <div class="input-group col-sm-8">
                  <span class="input-group-addon"id="basic-addon3"><img src="vendor/icons/pen.svg" alt="" width="20" height="20"></i></span>
                  <textarea name="biography" class="form-control" rows="5" cols="65" placeholder="I am Nkanyiso M a Software Developer...." maxlength="120" aria-describedby="basic-addon3"><?php echo $biography;?></textarea>
                </div>
              </div>


        	    </div> <!--/col-md-6-->

              <div class="form-group submitButtonFooter">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" name="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                  <button type="reset" class="btn btn-default" onclick="resetProfileForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
                </div>
              </div>

            </div>
          </form>
        </div>
        <footer>
          <p style="color: lightgrey" align="center"><i><b> Copyright <i class="glyphicon glyphicon-registration-mark"></i> | All Rights Reserved | Designed by Nkanyiso Consulting Pty Ltd</b></i></p>
        </footer>
      </div>
    </body>
</html>
<!-- <script src="assets/jquery/jquery-3.7.0.slim.min.js"></script>
<script src="assets/jquery/maxlength.js"></script> -->
<script>
    $(() => {
        $('[maxlength]').maxlength();
    });
</script>
<script>
    var contact = document.querySelector('#contact');

    contact.addEventListener('keyup', function(e){
    if (event.key != 'Backspace' && (contact.value.length === 3 || contact.value.length === 7)){
      contact.value += ' ';
      }
    });

    var identity = document.querySelector('#identity');

    identity.addEventListener('keyup', function(e){
    if (event.key != 'Backspace' && (identity.value.length === 6 || identity.value.length === 11 || identity.value.length ===14)){
      identity.value += ' ';
      }
    });
</script>
<script type="text/javascript" src="assets/src/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="assets/src/jquery-key-restrictions.js"></script>
<script type="text/javascript" src="js_crud_script/page_Loader.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $("#fullnames").alphaNumericOnly();
      $("#surname").lettersOnly();
      $("#identity").numbersOnly();
      $("#contact").numbersOnly();
     if ($("#autoCloseAlert").length) {
        setTimeout(function () {
            $("#autoCloseAlert").fadeOut(1000, function () {
                $(this).remove();
            });
        }, 5000);
    }
      $("#showPassword").change(function () {
        $("#password").attr(
            "type",
            this.checked ? "text" : "password"
        );
    });
  });
</script>
