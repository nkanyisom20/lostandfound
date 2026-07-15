<?php
include 'include_lf/auth.php';
include 'include_lf/connect.php';

$student_no = $_SESSION['student_no'];
$role = $_SESSION['role'];
$surname = $_SESSION['surname'];
$fullnames = $_SESSION['fullnames'];

$message = "";

if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
    $message = '<p id="autoCloseAlert"><strong>Success!</strong> Document added successfully.</p>';
}

// AUTO GENERATE document ID
$document_no = "DOC_TY" . rand(1000,9999);

if(isset($_POST['btn_save_document'])) {

    $document_no  = mysqli_real_escape_string($connect, $_POST['document_no']);
    $document_name    = mysqli_real_escape_string($connect, $_POST['document_name']);
    $document_status  = mysqli_real_escape_string($connect, $_POST['document_status']);

    // CHECK IF document EXISTS
    $check = mysqli_query($connect,"SELECT * FROM doc_type WHERE document_name = '$document_name'");

    if(mysqli_num_rows($check) > 0) {

        $message = '
        <div class="alert alert-warning">
            <strong>Warning!</strong> document already exists.
        </div>';

    } else {
        $insert = mysqli_query($connect," INSERT INTO doc_type (document_no, document_name, document_status) VALUES('$document_no','$document_name','$document_status')");

        if($insert)
        {
             header("Location: add_doc_type.php?msg=success");
             exit();

            // GENERATE NEW document ID
            $document_no = "DOC_TY" . rand(1000,9999);
        }
        else
        {
            $message = '
            <div class="alert alert-danger">
                <strong>Error!</strong> Failed to save document.
            </div>';
        }
    }
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
                          <li class="active"><a href="add_doc_type.php"> <i class="glyphicon glyphicon-file"></i> Add Doc Type</a></li>
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
              <li class="active">Document</li>
          </ol>

          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="page-heading pull-left"><i class="glyphicon glyphicon-file"></i>Add Document</div>

              <div class="pull-right" style="width: 220px">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Doc Type ..." id="searchInput">
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
            </div>
            
            <div class="panel-body">
              <div class="table-responsive col-md-8">
                  <table id="doc_type_table" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Document ID</th>
                        <th>Document Name</th>
                        <th>Status</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count = 1;
                            $select = mysqli_query($connect,"SELECT * FROM doc_type ORDER BY document_name ASC");

                            if(mysqli_num_rows($select) > 0){
                                while($row = mysqli_fetch_assoc($select))
                                {
                                    $status = '';
                                    if($row['document_status'] == '1') {
                                        $status = '<span class="label label-success">Active</span>';
                                    } else {
                                        $status = '<span class="label label-default">Inactive</span>';
                                    }
                        ?>

                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td>
                                <?php echo $row['document_no']; ?>
                            </td>
                            <td>
                                <?php echo $row['document_name']; ?>
                            </td>

                            <td>
                                <?php echo $status; ?>
                            </td>
                            <td>
                                <div class="btn-group"role="group"aria-label="...">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle"data-toggle="dropdown"
                                              aria-haspopup="true"aria-expanded="True">Actions<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php if ($row['document_status'] == '1') { ?>
                                                <li>
                                                    <a class="document_inactive" data-document-no="<?php echo $row["document_no"]; ?>" href="javascript:void(0)">
                                                    <button class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-remove"></span>Deactivate</button>
                                                    </a>
                                                </li>
                                            <?php }
                                            else 
                                            { ?>
                                                <li>
                                                    <a class="document_active" data-document-no="<?php echo $row["document_no"]; ?>" href="javascript:void(0)">
                                                    <button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span>Activate</button>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                                <li>
                                                    <a class="document_view_edit"
                                                        data-doc-id="<?php echo $row['document_id']; ?>"
                                                        data-doc-no="<?php echo htmlspecialchars($row['document_no']); ?>"
                                                        data-doc-name="<?php echo htmlspecialchars($row['document_name']); ?>"
                                                        data-doc-status="<?php echo htmlspecialchars($row['document_status']); ?>"
                                                        href="javascript:void(0)">
                                                        <button class="btn btn-primary btn-xs">
                                                            <span class="glyphicon glyphicon-pencil"></span>View/Edit
                                                        </button>
                                                    </a>
                                                </li>
                                            </td>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a class="delete_document" data-document-no="<?php echo $row["document_no"]; ?>" href="javascript:void(0)">
                                    <button class="btn btn-danger btn-xs" title="Permanently Delete Record"><span class="glyphicon glyphicon-trash"></span></button>
                                </a>
                            </td>

                        </tr>

                        <?php
                            }
                        }
                        else
                        {
                        ?>

                        <tr>
                            <td colspan="5" align="center">
                                No documents found
                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                  </table>
              </div>
              <!-- Add document Form -->
              <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading"><i class="glyphicon glyphicon-file"></i> Add Doc Type</div>
                    <div class="panel-body">
                      <form method="POST">
                        <small><div><?php echo $message; ?></div></small>

                        <div class="form-group">
                          <label for="Document ID" class=" control-label">Document ID</label>
                          <div class="input-group">
                            <span class="input-group-addon"id="basic-addon1"><img src="vendor/icons/filetype-key.svg" alt="" width="20" height="20"></i></span>
                            <input type="text" name="document_no" class="form-control" value="<?php echo $document_no; ?>" aria-describedby="basic-addon1" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="Document Name" class=" control-label">Document Name</label>
                          <div class="input-group">
                            <span class="input-group-addon"id="basic-addon2"><img src="vendor/icons/filetype-doc.svg" alt="" width="20" height="20"></i></span>
                            <input type="text" name="document_name" class="form-control" placeholder="Enter Document Name" aria-describedby="basic-addon2" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="Document Name" class=" control-label">Document Status</label>
                          <div class="input-group">
                            <span class="input-group-addon"id="basic-addon3"><img src="vendor/icons/option.svg" alt="" width="20" height="20"></i></span>
                            <select name="document_status" class="form-control" aria-describedby="basic-addon3" required>
                              <option value="">-- Select --</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                          </div>
                        </div>

                        <button type="submit" name="btn_save_document" class="btn btn-success"> <i class="glyphicon glyphicon-ok"></i>
                            Submit
                        </button>
                        <button type="reset" class="btn btn-default"><i class="glyphicon glyphicon-erase"></i>
                            Reset
                        </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- View / Edit Modal -->
            <div class="modal fade" id="documentModal" tabindex="-1">
              <div class="modal-dialog" >
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><span class="glyphicon glyphicon-pencil"></span>View / Edit Document Type</h4>
                    </div>
                    <div class="modal-body">
                      <form id="documentForm">

                          <input type="hidden" name="document_id" id="doc_id">

                          <div class="form-group col-md-12">
                            <label for="Document ID" class=" control-label">Document ID</label>
                            <div class="input-group">
                              <span class="input-group-addon"id="basic-addon1"><img src="vendor/icons/filetype-key.svg" alt="" width="20" height="20"></i></span>
                              <input type="text" name="document_no" class="form-control" id="doc_no" value="<?php echo $document_no; ?>" aria-describedby="basic-addon1" readonly>
                            </div>
                          </div>

                          <div class="form-group col-md-8">
                            <label for="Document Name" class=" control-label">Document Name</label>
                            <div class="input-group">
                              <span class="input-group-addon"id="basic-addon2"><img src="vendor/icons/filetype-doc.svg" alt="" width="20" height="20"></i></span>
                              <input type="text" name="document_name" class="form-control" id="doc_name" placeholder="Enter Document Name" aria-describedby="basic-addon2" required>
                            </div>
                          </div>


                          <div class="form-group col-md-4">
                            <label for="Document Name" class=" control-label">Status</label>
                            <div class="input-group">
                              <span class="input-group-addon"id="basic-addon3"><img src="vendor/icons/option.svg" alt="" width="20" height="20"></i></span>
                              <select name="document_status" class="form-control" id="doc_status" aria-describedby="basic-addon3" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="row" style="margin: top 1%;">
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok"></span>Update
                              </button>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <hr>
                          </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">
                              <span class="glyphicon glyphicon-remove"></span>Close
                          </button>
                    </div>
                  </div>
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

<script type="text/javascript" src="js_crud_script/activate_deactivate_viewedit_delete_Doc_Type.js"></script>
<script type="text/javascript" src="js_crud_script/page_Loader.js"></script>

<script> 
  $(document).ready(function(){
    var table = $('#doc_type_table').DataTable({
        "pageLength": 7,
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
    if($("#autoCloseAlert").length) {
        setTimeout(function() {
            $("#autoCloseAlert").fadeOut(5000, function(){
                $(this).remove();
            });
        }),50000
    }
  });
</script>
