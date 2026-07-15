<?php
  include 'include_lf/auth.php';
  include 'include_lf/connect.php';

  $student_no = $_SESSION['student_no'];
  $role = $_SESSION['role'];
  $surname = $_SESSION['surname'];
  $fullnames = $_SESSION['fullnames'];
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
              <a class="navbar-brand" href="#"><img src="assets/images/logo.png" alt="Lost & Found"></a>
            </div>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="home.php"><i class="glyphicon glyphicon-home"></i> Home</a>
              </li>
              <li>
                <?php if ($role == 'Admin') { ?>
                  <a href="manage_users.php"><i class="glyphicon glyphicon-wrench"></i> Manage Users</a>
                <?php } ?>
              </li>
              <li>
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
                  <li><a href="add_document.php"> <i class="glyphicon glyphicon-map-marker"></i>Add document</a></li>
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
          </div><!-- /.navbar-collapse -->
        </div>
      </nav>
      <div class="panel panel-default">
        <div class="panel-heading">
          <?php if ($role == 'Admin') { ?>
          <div class="page-heading"> Welcome back <?php echo $_SESSION['role']; ?></div>
          <?php } ?>
          <?php if ($role == 'Student') { ?>
          <div class="page-heading"> Welcome back <?php echo $_SESSION['role']; ?></div>
          <?php } ?>
        </div> <!-- /panel-heading -->
          <div class="panel-body">
              <br>
                <?php
                $result_count = mysqli_query($connect,"SELECT COUNT(`doc_id`) as collected FROM `lost_found` WHERE `collecting_status` = 'Un-Collected' AND `student_no`= $student_no;");
                while($row_count = mysqli_fetch_array($result_count))
                  {
                    $user_collected = $row_count['collected'];
                  }

                  $result_count = mysqli_query($connect,"SELECT COUNT(`stu_reg_id`) as un_verified FROM `student_reg` WHERE `verified` = 'No';");
                  while($row_count = mysqli_fetch_array($result_count))
                    {
                      $un_verified = $row_count['un_verified'];
                    }

                  $result_count = mysqli_query($connect,"SELECT COUNT(`doc_id`) as collected FROM `lost_found` WHERE `collecting_status` = 'Collected';");
                  while($row_count = mysqli_fetch_array($result_count))
                    {
                      $collected = $row_count['collected'];
                    }

                  $result_count = mysqli_query($connect,"SELECT COUNT(`doc_id`) as un_collected FROM `lost_found` WHERE `collecting_status` = 'Un-Collected';");
                  while($row_count = mysqli_fetch_array($result_count))
                    {
                      $un_collected = $row_count['un_collected'];
                    }

                  $result_count = mysqli_query($connect,"SELECT COUNT(`doc_id`) as all_collected FROM `lost_found`;");
                  while($row_count = mysqli_fetch_array($result_count))
                    {
                      $all_collected = $row_count['all_collected'];
                    }

                ?>

              <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading"><i class="glyphicon glyphicon-pushpin"></i> For you</div>
                  <div class="panel-body">
                    <?php  if($role == 'Admin' && $un_verified >0 ) { ?>
                      <div class="card">
                        <div class="cardContainer">
                          <a href="manage_users.php" style="text-decoration:none;color:black;">
                            Please verify them
                            <span class="badge pull pull-right"><?php echo $un_verified; ?></span>
                          </a>
                        </div>
                      </div>
                    <?php } ?>
                    <?php  if($role == 'Admin' && $un_verified == 0 ) { ?>
                      <div class="card">
                        <div class="cardContainer">
                          <a href="manage_lf.php" style="text-decoration:none;color:black;">
                            Nothing for you
                          </a>
                        </div>
                      </div>
                    <?php } ?>

                    <?php  if($role == 'Student' && $user_collected > 0 ) { ?>
                      <div class="card">
                  		  <div class="cardContainer">
                          <a href="manage_lf.php" style="text-decoration:none;color:black;">
                            Please collect
                            <span class="badge pull pull-right"><?php echo $user_collected; ?></span>
                          </a>
                  		  </div>
                  		</div>
                    <?php } ?>
                    <?php  if($role == 'Student' && $user_collected == 0 ) { ?>
                      <div class="card">
                  		  <div class="cardContainer">
                          <a href="manage_lf.php" style="text-decoration:none;color:black;">
                            Nothing for you
                          </a>
                  		  </div>
                  		</div>
                    <?php } ?>
                  </div>
                  <br>
                  <div class="panel-heading"><i class="glyphicon glyphicon-stats"></i> Report Stats</div>
                  <div class="panel-body">
                    <?php  if($role == 'Admin' OR $role == 'Student') { ?>
                      <div class="card">
                  		  <div class="cardContainer">
                          <a href="manage_lf.php" style="text-decoration:none;color:black;">
                            Collected
                            <span class="badge pull pull-right"><?php echo $collected; ?></span>
                          </a>
                  		  </div>
                  		</div>
                      <br>
                      <div class="card">
                  		  <div class="cardContainer">
                          <a href="manage_lf.php" style="text-decoration:none;color:black;">
                            Not Collected
                            <span class="badge pull pull-right"><?php echo $un_collected; ?></span>
                          </a>
                  		  </div>
                  		</div>
                      <br>
                      <div class="card">
                  		  <div class="cardContainer">
                          <a href="manage_lf.php" style="text-decoration:none;color:black;">
                            Total reported
                            <span class="badge pull pull-right"><?php echo $all_collected; ?></span>
                          </a>
                  		  </div>
                  		</div>
                    <?php } ?>
                  </div>
                </div>
            	</div>

            	<div class="col-md-8">
            		<div class="panel panel-default">
            			<div class="panel-heading"><i class="glyphicon glyphicon-blackboard"></i> Services</div>
            			<div class="panel-body">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">

                        <div class="item active">
                          <img src="assets/images/pic_lg.gif" alt="DL" style="width:100%;">
                          <div class="carousel-caption">
                          </div>
                        </div>

                        <div class="item">
                          <img src="assets/images/pic_dl.gif" alt="LG" style="width:100%;">
                          <div class="carousel-caption">
                          </div>
                        </div>

                        <div class="item">
                          <img src="assets/images/pic_id.gif" alt="ID" style="width:100%;">
                          <div class="carousel-caption">
                          </div>
                        </div>

                        <div class="item">
                          <img src="assets/images/pic_sc.gif" alt="Cert" style="width:100%;">
                          <div class="carousel-caption">
                          </div>
                        </div>

                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
            			</div>
            		</div>
              </div> <!--/row-->
            </div>
          </div>
        <footer>
          <p style="color: lightgrey" align="center"><i><b> Copyright <i class="glyphicon glyphicon-registration-mark"></i> | All Rights Reserved | Designed by Nkanyiso Consulting Pty Ltd</b></i></p>
        </footer>
      </div>
    </body>
</html>
<script src="asset/jquery/jquery-1.12.4.min.js"></script>
<script src="asset/jquery/numericInput.js"></script>
<script type="text/javascript" src="js_crud_script/page_Loader.js"></script>
