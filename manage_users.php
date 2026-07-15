<?php
  include 'include_lf/auth.php';
  include 'include_lf/connect.php';

  $student_no = $_SESSION['student_no'];
  $role       = $_SESSION['role'];
  $surname    = $_SESSION['surname'];
  $fullnames  = $_SESSION['fullnames'];
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
              <li class="active">
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
        <li class="active">Manage Users</li>
      </ol>

      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <?php if ($role == 'Admin') { ?>
            <div class="page-heading pull-left"> <i class="glyphicon glyphicon-edit"></i> Manage Users</div>

            <div class="pull-right" style="width: 220px">
              <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search User..." id="searchInput">
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="button" id="clearBtn" style="display: none;">
                          <i class="glyphicon glyphicon-remove"></i>
                      </button>
                      <button class="btn btn-default" type="button">
                          <i class="glyphicon glyphicon-search"></i>
                      </button>
                  </span>
              </div>
            </div>
            <div class="clearfix"></div>
  
          <?php } ?>
        </div> <!-- /panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            <table  class="table table-bordered table-striped table-hover" id="lftable">
              <colgroup>
                <col width="2%">
                <col width="5%">
                <col width="6%">
                <col width="8%">
                <col width="5%">
                <col width="15%">
                <col width="5%">
                <col width="3%">
                <col width="3%">
                <col width="36%">
                <col width="3%">
                <col width="3%">
                <col width="3%">
                <col width="3%">
              </colgroup>
              <thead>
                <tr>
                  <th><strong>No.</strong></th>
                  <th><strong>Stu No.</strong></th>
                  <th><strong>Surname</strong></th>
                  <th><strong>Fullnames</strong></th>
                  <th><strong>Gender</strong></th>
                  <th><strong>D..of Bir</strong></th>
                  <th><strong>Role</strong></th>
                  <th><strong>Approved</strong></th>
                  <th><strong>Removed</strong></th>
                  <th><strong>Date of Reg</strong></th>
                  
                  <th><strong>P.Reset</strong></th>
                  <th><strong>Approve</strong></th>
                  <th><strong>Remove</strong></th>
                  <th><strong>Delete</strong></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $count=1;
                  $result = mysqli_query($connect,"SELECT * FROM `student_reg` ORDER BY `date_registered` DESC");
                  while($row = mysqli_fetch_array($result))
                    {
                      $verified = '';
                      if($row['verified'] == 'Yes') {
                        $verified = '<span class="label label-success">Yes</span>';
                      } else {
                        $verified = '<span class="label label-default">No</span>';
                      }

                      $removed = '';
                      if($row['removed'] == 'Yes') {
                        $removed = '<span class="label label-warning">Yes</span>';
                      } else {
                        $removed = '<span class="label label-success">No</span>';
                      }

                ?>
                    <tr>
                      <td><strong><?php echo $count; ?></strong></td>
                      <td><?php echo $row["student_no"]; ?></td>
                      <td><?php echo $row["surname"]; ?></td>
                      <td><?php echo $row["fullnames"]; ?></td>
                      <td><?php echo $row["gender"]; ?></td>
                      <td><?php echo $row["date_of_birth"]; ?></td>
                      <td><?php echo $row["role"]; ?></td>
                      <td><?php echo $verified; ?></td>
                      <td><?php echo $removed; ?></td>
                      <td><?php echo $row["date_registered"]; ?></td>
                      <td>
                        <a class="reset_password" 
                        data-emp-id="<?php echo $row["stu_reg_id"]; ?>"
                        data-emp-surname="<?php echo $row["surname"]; ?>"
                        data-emp-username="<?php echo $row["student_no"]; ?>" href="javascript:void(0)">
                        <button class="btn btn-primary btn-xs" title="Reset User Password">
                          <span class="glyphicon glyphicon-edit"></span>
                        </button>
                        </a>
                      </td>
                      
                      <?php if ($row['verified'] == 'Yes') { ?>
                        <td>
                          <a class="reject_employee" data-emp-id="<?php echo $row["stu_reg_id"]; ?>" href="javascript:void(0)">
                            <button class="btn btn-warning btn-xs" title="Reject user"><span class="glyphicon glyphicon-remove"></span></button>
                          </a>
                        </td>
                        <?php }
                        else 
                        { ?>
                        <td>
                          <a class="approve_employee" data-emp-id="<?php echo $row["stu_reg_id"]; ?>" href="javascript:void(0)">
                            <button class="btn btn-success btn-xs" title="Approve user"><span class="glyphicon glyphicon-ok-sign"></span></button>
                          </a>
                        </td>
                      <?php } ?>

                      <?php if ($row['removed'] == 'Yes') { ?>
                        <td>
                          <a class="reinstate_employee" data-emp-id="<?php echo $row["stu_reg_id"]; ?>" href="javascript:void(0)">
                            <button class="btn btn-success btn-xs" title="Reinstate user"><span class="glyphicon glyphicon-floppy-saved"></span></button>
                          </a>
                        </td>
                        <?php }
                        else 
                        { ?>
                        <td>
                          <a class="remove_employee" data-emp-id="<?php echo $row["stu_reg_id"]; ?>" href="javascript:void(0)">
                            <button class="btn btn-warning btn-xs" title="Remove user"><span class="glyphicon glyphicon-floppy-remove"></span></button>
                          </a>
                        </td>
                      <?php } ?>
                      
                      <td>
                        <a class="delete_student_no" data-emp-id="<?php echo $row["stu_reg_id"]; ?>" href="javascript:void(0)">
                        <button class="btn btn-danger btn-xs" title="Permanently Delete"><span class="glyphicon glyphicon-trash"></span></button>
                  </a>
                      </td>
                    </tr>
                  <?php
                    $count++;
                    }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <footer>
        <p style="color: lightgrey" align="center"><i><b> Copyright <i class="glyphicon glyphicon-registration-mark"></i> | All Rights Reserved | Designed by Nkanyiso Consulting Pty Ltd</b></i></p>
      </footer>
    </div>
  </body>
</html>
<script type="text/javascript" src="js_crud_script/bootbox.min.js"></script>

<script type="text/javascript" src="js_crud_script/approve_remove_delete_Employees.js"></script>
<script type="text/javascript" src="js_crud_script/reset_Employee_Password.js"></script>

<script type="text/javascript" src="js_crud_script/page_Loader.js"></script>

<script src="assets/jquery/maxlength.js"></script>

<script> 
  $(document).ready(function(){
    var table = $('#lftable').DataTable({
        "pageLength": 9,
        "ordering": false,
        "pagingType": "full",
        "searching": true,
        "dom": 'rtrip',
        "language": {"zeroRecords": "No matching records found"}
    });

    $("#searchInput").on("keyup",function(){
        table.search(this.value).draw();
    });

    $("#clearBtn").on("click", function(){
        $("#searchInput").val('');
        table.search('').draw();
        $(this).hide();
    });

    $("#searchInput").on("input", function () {
        $("#clearBtn").toggle($(this).val().length > 0);   
    });
  });
</script>

