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
        function check_student_no_for_registration(va) {
          $.ajax({
            type: "POST",
            url: "include_lf/stu_no_for_registration.php",
            data:'student_no='+va,
            success: function(data){
              $("#student_no_for_registration").html(data);
              }
            });
          }
      </script>
      <script>
        function check_student_no_for_login(va) {
          $.ajax({
            type: "POST",
            url: "include_lf/stu_no_for_login.php",
            data:'student_no='+va,
            success: function(data){
              $("#student_no_for_login").html(data);
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
              <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
              <li class="active"><a href="services.php"><i class="glyphicon glyphicon-tasks"></i> Services</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-education"></i> About Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#" data-toggle="modal" data-target="#myModal_sign-up"><span class="glyphicon glyphicon-pencil"></span> Sign Up</a></li>
              <li><a href="#" data-toggle="modal" data-target="#myModal_sign-in"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="page-heading"><i class="glyphicon glyphicon-tasks"></i> Services</div>
        </div> <!-- /panel-heading -->
          <div class="panel-body">
            <embed class="col-md-12" src= "include_lf/lost&found_services.pdf" height="420">
              <br>
            <p style="color: lightgreen" align="center">
              For better viewing of this document just print / save it and open using pdf-reader
            </p>
        </div>
      </div>
        <!--Start Modal Login -->
        <div class="modal fade" id="myModal_sign-in" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" align="center"><b>Welcome Back</b></h3>
                <p style="color: grey" align="center">Please enter your details to continue</p>
              </div>
              <div class="container">
              <form name="insertrecord" action="include_lf/sign_in.php" method="post">
              <small><span id="student_no_for_login"></span></small>
              
                <div class="row">
                  <div class="col-md-3">
                    <label for="Student Number">Student Number</label>
                    <div class="input-group">
                      <span class="input-group-addon"id="basic-addon1"><img src="vendor/icons/person-lock.svg" alt="" width="20" height="20"></span>
                      <input type="text" id="student_no_login" name="student_no" maxlength="9" placeholder="202654321"aria-describedby="basic-addon1"
                      onblur="check_student_no_for_login(this.value)" class="form-control" value="" required="true">
                    </div>
                  </div>

                  <div class="col-md-3">
                  <label for="Password">Password</label>
                    <div class="input-group">
                      <span class="input-group-addon"id="basic-addon2"><img src="vendor/icons/key.svg" alt="" width="20" height="20"></span>
                        <input type="password" name="password" id="password_login"  placeholder="********"aria-describedby="basic-addon2" class="form-control" required="true">
                    </div>
                      <label style="margin-top:5px;">
                          <input type="checkbox" onclick="togglePassword('password_login')">
                          Show Password
                      </label>
                  </div>
                </div>

                <div class="row" style="margin-top:1%">
                  <div class="col-md-8">
                    <button class="btn btn-success" type="submit" name="submit_login" id="submit_login" value="Submit"><i class="glyphicon glyphicon-log-in"></i> Sign in</button>
                  </div>
                </div>
                <div class="col-md-6">
                  <hr>
                </div>
              </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
              </div>
            </div>

          </div>
        </div>
        <!--End Modal Login -->

        <!--Start Modal Register -->
        <div class="modal fade" id="myModal_sign-up" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" align="center"><b>Create Account</b></h3>
                <p style="color: grey" align="center">Join us today! Fill in the details to get started</p>
              </div>
              <div class="container">
              <form name="insertrecord" action="include_lf/sign_up.php" method="post">
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <label for="Fullnames">Fullnames</label>
                    <div class="input-group">
                      <span class="input-group-addon"id="basic-addon4"><img src="vendor/icons/person.svg" alt="" width="20" height="20"></i></span>
                        <input type="text" name="fullnames" id="fullnames"  placeholder="Fullnames" maxlength="20" aria-describedby="basic-addon4" class="form-control" required="true">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <label for="Surname">Surname</label>
                    <div class="input-group">
                      <span class="input-group-addon"id="basic-addon3"><img src="vendor/icons/at.svg" alt="" width="20" height="20"></span>
                        <input type="surname" name="surname" id="surname"  placeholder="Surname"aria-describedby="basic-addon3" class="form-control" required="true">
                    </div>
                  </div>
                </div>

                <br>
                <div class="row">

                  <div class="col-md-3">
                    <label for="Student Number">Student Number</label>
                    <div class="input-group">
                      <span class="input-group-addon"id="basic-addon1"><img src="vendor/icons/person-lock.svg" alt="" width="20" height="20"></span>
                      <input type="text" id="student_no_reg" name="student_no" maxlength="9" placeholder="202654321"aria-describedby="basic-addon1"
                      onblur="check_student_no_for_registration(this.value)" class="form-control" value="" required="true">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="Password">Password</label>
                    <div class="input-group">
                      <span class="input-group-addon"id="basic-addon2"><img src="vendor/icons/key.svg" alt="" width="20" height="20"></span>
                        <input type="password" name="password" id="password_register"  placeholder="********"aria-describedby="basic-addon2" class="form-control" required="true">
                    </div>
                      <label style="margin-top:5px;">
                          <input type="checkbox" onclick="togglePassword('password_register')">
                          Show Password
                      </label>
                  </div>
                </div>
                <small><span id="student_no_for_registration"></span></small>
                <br>
                <div class="row">
                  <legend class="col-md-2">Gender</legend>
                    <div class="col-md-3"><b>Female</b>
                      <input type="radio" name="gender" value="Female" class="" required>
                    </div>
                    <div class="col-md-3"><b>Male</b>
                      <input type="radio" name="gender" value="Male" class="" required>
                    </div>
                </div>
                <div class="col-md-6">
                  <hr>
                  <label >
                    <input type="checkbox" id="terms_and_conditions" value ="read"><i>I agree on the Terms & Condions and Privacy Policy</i>
                  </label>
                </div>
                <div class="row" style="margin-top:1%">
                  <div class="col-md-8">
                    <button type="Submit" class="btn btn-success" name="submit_register" id="submit_register">
                      <i class="glyphicon glyphicon-user"></i> Create Account
                    </button>
                  </div>
                </div>
                <div class="col-md-6">
                  <hr>
                </div>
              </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
              </div>
            </div>

          </div>
        </div>
        <!--End Modal Register -->
      <footer>
        <p style="color: lightgrey" align="center"><i><b> Copyright <i class="glyphicon glyphicon-registration-mark"></i> | All Rights Reserved | Designed by Nkanyiso Consulting Pty Ltd</b></i></p>
      </footer>
    </div>
  </body>

</html>

<script type="text/javascript" src="assets/src/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="assets/src/jquery-key-restrictions.js"></script>
<script type="text/javascript" src="js_crud_script/page_Loader.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $("#student_no_reg").numbersOnly();
      $("#student_no_login").numbersOnly();
      $("#fullnames").alphaNumericOnly();
      $("#surname").lettersOnly();
  });
</script>
<script>
  function togglePassword(fieldId) {
      var passwordField = document.getElementById(fieldId);

      if (passwordField.type === "password") {
          passwordField.type = "text";
      } else {
          passwordField.type = "password";
      }
  }
</script>
