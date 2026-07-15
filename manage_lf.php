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
              <li class="active">
                <?php if ($role == 'Student') { ?>
                  <a href="manage_lf.php"><i class="glyphicon glyphicon-folder-open"></i> View_L&F</a>
                <?php } ?>
              </li>
              <li class="active">
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

      <?php if ($role == 'Admin') { ?>
        <ol class="breadcrumb">
          <li><a href="home.php">Home</a></li>
          <li class="active">Manage L&F</li>
        </ol>
      <?php } ?>
      <?php if ($role == 'Student') { ?>
        <ol class="breadcrumb">
          <li><a href="home.php">Home</a></li>
          <li class="active">View L&F</li>
        </ol>
      <?php } ?>
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <?php if ($role == 'Admin') { ?>
  				<div class="page-heading pull-left"> <i class="glyphicon glyphicon-edit"></i> Manage L&F</div>

          <div class="pull-right" style="width: 220px">
            <div class="input-group input-group-sm">
              <input type="text" class="form-control" placeholder="Search L&F ..." id="searchInput">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button" id="clearBtn" style="display:none;">
                  <i class="glyphicon glyphicon-remove"></i>
                </button>
                <button class="btn btn-default" type="button">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </span>
            </div>
          </div>

          <?php } ?>
          <?php if ($role == 'Student') { ?>
  				<div class="page-heading pull-left"> <i class="glyphicon glyphicon-eye-open"></i> View L&F</div>

          <div class="pull-right" style="width: 220px">
            <div class="input-group input-group-sm">
              <input type="text" class="form-control" placeholder="Search L&F ..." id="searchInput">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button" id="clearBtn" style="display:none;">
                  <i class="glyphicon glyphicon-remove"></i>
                </button>
                <button class="btn btn-default" type="button">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </span>
            </div>
          </div>

          <?php } ?>
  			</div> <!-- /panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            <table id="lftable" class="table table-bordred table-striped table-hover">
              <thead>
                <tr>
                  <th><strong>No.</strong></th>
                  <th><strong>Student No.</strong></th>
                  <th><strong>Surname</strong></th>
                  <th><strong>Fullnames</strong></th>
                  <th><strong>Type of Document</strong></th>
                  <th><strong>Venue for Collecting</strong></th>
                  <th><strong>Date Reported</strong></th>
                  <th><strong>Status</strong></th>
                  <?php if ($role == 'Admin') { ?>
                  <th>Reported By</th>
                  <th>Collect</th>
                  <th>Delete</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                  $count=1;
                  $result = mysqli_query($connect,"SELECT * FROM `lost_found`ORDER BY `date_reported` DESC ");
                  while($row = mysqli_fetch_array($result))
                    {
                        $status = '';
                        if($row['collecting_status'] == 'Collected') {
                          $status = '<span class="label label-success">Claimed</span>';
                        } else {
                          $status = '<span class="label label-default">Reported</span>';
                        }
                ?>
                  <tr>

                    <td><?php echo $count; ?></td>
                    <td><?php echo $row["student_no"]; ?></td>
                    <td><?php echo $row["surname"]; ?></td>
                    <td><?php echo $row["fullnames"]; ?></td>
                    <td><?php echo $row["type_of_doc"]; ?></td>
                    <td><?php echo $row["location"]; ?></td>
                    <td><?php echo $row["date_reported"]; ?></td>
                    <td><?php echo $status; ?></td>
                    <?php if ($role == 'Admin') { ?>
                    <td><?php echo $row["reported_by"]; ?></td>

                    <?php if ($row['collecting_status'] == 'Collected') { ?>
                      <td>
                        <a class="update_uncollect" data-lf-id="<?php echo $row["doc_id"]; ?>" href="javascript:void(0)">
                          <button class="btn btn-default btn-xs" title="Undo Collecting"><span class="glyphicon glyphicon-remove"></span></button>
                        </a>
                      </td>
                      <?php }
                      else 
                      { ?>
                      <td>
                        <a class="update_collect" data-lf-id="<?php echo $row["doc_id"]; ?>" href="javascript:void(0)">
                          <button class="btn btn-success btn-xs" title="Do Collecting"><span class="glyphicon glyphicon-ok"></span></button>
                        </a>
                      </td>
                      <?php } ?>

                    <td>
                      <a class="delete_collect" data-lf-id="<?php echo $row["doc_id"]; ?>" href="javascript:void(0)">
                        <button class="btn btn-danger btn-xs" title="Permanently Delete Record"><span class="glyphicon glyphicon-trash"></span></button>
                      </a>
                    </td>
                    <?php } ?>
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
<script type="text/javascript" src="js_crud_script/do_undo_delete_Lost_and_Found.js"></script>


<script type="text/javascript" src="js_crud_script/page_Loader.js"></script>

<script> 
  $(document).ready(function(){
   
var table = $('#lftable').DataTable({
        "pageLength": 7,
        "ordering": false,
        "pagingType": "full",
        "searching": true,
        "dom": 'rtrip',
        "language": {"zeroRecords": "Currently we have no found items for you"}
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
