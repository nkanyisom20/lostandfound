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
              <li class="active">
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
              <li class="active">
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
		  <li class="active">Messages</li>
		</ol>

    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <?php if ($role == 'Admin') { ?>
          <div class="page-heading pull-left"> <i class="glyphicon glyphicon-envelope"></i> Messages</div>

            <div class="pull-right" style="width: 220px">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Search Msg..." id="searchInput">
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
          <?php if ($role == 'Student') { ?>
          <div class="page-heading pull-left"> <i class="glyphicon glyphicon-envelope"></i> Messages</div>

            <div class="pull-right" style="width: 220px">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Search Msg..." id="searchInput">
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
          <div class="col-md-5">
            <div class="col-sm-12">
              <!-- <img src="assets/images/report.WEBP" class="responsive_pics" alt="Isithome"> -->
              <img src="assets/images/img1.jpg" class="responsive_pics" alt="Isithome">
            </div>
          </div>
          <div class="col-md-7">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover" id="lftable">
                <colgroup>
                  <col width="2%">
                  <col width="20%">
                  <col width="24%">
                  <col width="14%">
                  <col width="20%">
                  <col width="16%">
                  <col width="2%">
                  <col width="2%">
                </colgroup> 
                <thead>
                  <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Topic</strong></th>
                    <th><strong>Messages</strong></th>
                    <th><strong>Date</strong></th>
                    <th><strong>Admin_Reply</strong></th>
                    <th><strong>Date</strong></th>
                    <?php if ($role == 'Admin') { ?>
                    <th>Reply</th>
                    <?php } ?>
                    <?php if ($role == 'Student') { ?>
                    <th>Read</th>
                    <?php } ?>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      
                      $count=1;
                      if ($role == 'Admin') {
                      
                      $result = mysqli_query($connect,"SELECT * FROM `comments` ORDER BY `comment_at` DESC");
                      while($row = mysqli_fetch_array($result))
                        {   
                      ?>

                        <tr>

                          <td><?php echo $count; ?></td>
                          <td><?php echo substr($row["salute"], 0, 10); ?></td>
                          <td><?php echo substr($row["comment"], 0, 10)."..."; ?></td>
                          <td><?php echo date('M d', strtotime($row["comment_at"])); ?></td>
                          <td><?php echo $row["admin_reply"]? substr($row["admin_reply"], 0, 10).'...' :'<i> No reply yet </i>'; ?></td>
						              <td><?php echo !empty($row["replied_at"]) ? date('M d', strtotime($row["replied_at"])) : '<i>----</i>'; ?></td>
                          <?php if ($role == 'Admin') { ?>
                            <td>
                              <a class="reply_message" 
                              data-msg-id="<?php echo $row["comment_id"]; ?>"
                              data-topic="<?php echo htmlspecialchars($row["salute"], ENT_QUOTES); ?>"
                              data-full-comment="<?php echo htmlspecialchars($row["comment"], ENT_QUOTES); ?>"
                              data-admin-reply="<?php echo htmlspecialchars($row["admin_reply"], ENT_QUOTES); ?>" 
                              href="javascript:void(0)">
                              <button class="btn btn-primary btn-xs" title="Reply/Edit">
                                <span class="glyphicon glyphicon-eye-open"></span>
                              </button>
                              </a>
                            </td>
                          <?php } ?>
                          <?php if ($role == 'Student') { ?>
                            <td>
                              <a class="reply_message" 
                              data-msg-id="<?php echo $row["comment_id"]; ?>"
                              data-topic="<?php echo htmlspecialchars($row["salute"],ENT_QUOTES); ?>"
                              data-full-comment="<?php echo htmlspecialchars($row["comment"], ENT_QUOTES); ?>"
                              data-admin-reply="<?php echo htmlspecialchars($row["admin_reply"], ENT_QUOTES); ?>" 
                              href="javascript:void(0)">
                              <button class="btn btn-primary btn-xs" title="Read Admin Reply">
                                <span class="glyphicon glyphicon-eye-open"></span>
                              </button>
                              </a>
                            </td>
                          <?php } ?>

                            <td>
                              <a class="delete_message" data-msg-id="<?php echo $row["comment_id"]; ?>" href="javascript:void(0)">
                                <button class="btn btn-danger btn-xs" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
                              </a>
                            </td>
                        </tr>
                      <?php
                          $count++;
                        }
                      }
                      if ($role =='Student'){

                        $result = mysqli_query($connect,"SELECT * FROM `comments`WHERE student_no = '$student_no' ORDER BY `comment_at` DESC");
                        while($row = mysqli_fetch_array($result))
                          {   
                        ?>
  
                          <tr>
  
                            <td><?php echo $count; ?></td>
                            <td><?php echo substr($row["salute"], 0, 10); ?></td>
                            <td><?php echo substr($row["comment"], 0, 10)."..."; ?></td>
                            <td><?php echo date('M d', strtotime($row["comment_at"])); ?></td>
                            <td><?php echo $row["admin_reply"]? substr($row["admin_reply"], 0, 10).'...' :'<i> No reply yet </i>'; ?></td>
                            <td><?php echo !empty($row["replied_at"]) ? date('M d', strtotime($row["replied_at"])) : '<i>----</i>'; ?></td>
  
                            <?php if ($role == 'Admin') { ?>
                              <td>
                                <a class="reply_message"
                                   data-msg-id="<?php echo $row['comment_id']; ?>"
                                   data-topic="<?php echo htmlspecialchars($row["salute"],ENT_QUOTES); ?>"
                                   data-full-comment="<?php echo htmlspecialchars($row['comment'], ENT_QUOTES); ?>"
                                   data-admin-reply="<?php echo htmlspecialchars($row['admin_reply'], ENT_QUOTES); ?>"
                                   href="javascript:void(0)">
                                    <button class="btn btn-primary btn-xs">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                </a>
                              </td>
                            <?php } ?>
                            <?php if ($role == 'Student') { ?>
                              <td>
                               <a class="reply_message"
                                   data-msg-id="<?php echo $row['comment_id']; ?>"
                                   data-topic="<?php echo htmlspecialchars($row["salute"],ENT_QUOTES); ?>"
                                   data-full-comment="<?php echo htmlspecialchars($row['comment'], ENT_QUOTES); ?>"
                                   data-admin-reply="<?php echo htmlspecialchars($row['admin_reply'], ENT_QUOTES); ?>"
                                   href="javascript:void(0)">
                                    <button class="btn btn-primary btn-xs">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                </a>
                              </td>
                            <?php } ?>
  
                              <td>
                                <a class="delete_message" data-msg-id="<?php echo $row["comment_id"]; ?>" href="javascript:void(0)">
                                  <button class="btn btn-danger btn-xs" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
                                </a>
                              </td>
                          </tr>
                        <?php
                            $count++;
                          }
                      }
                    ?>
                </tbody>
              </table>
            </div>
            <br>
          </div>
        </div>

        <!-- Modal Reply to Message -->
        <div class="modal fade" id="replyModal" tabindex="-1">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reply to Message</h4>
              </div>
              <div class="modal-body">
                <form id="reply_Form">
                    <input type="hidden" name="comment_id" id="reply_message_id">
                    
                    <div class="form-group">
                      <label for="Topic" class=" control-label">Topic</label>
                      <div class="input-group">
                        <span class="input-group-addon"id="basic-addon1"><img src="vendor/icons/pencil.svg" alt="" width="20" height="20"></i></span>
                        <p id="original_Topic" class="form-control" style="background-color:#eee; margin:0; height:auto; min-height:34px;"  aria-describedby="basic-addon1" ></p>
                      </div>
                    </div>

                

                    <label for="User Message">User Message</label>
                    <div class="input-group">
                      <span class="input-group-addon"id="basic-addon2"><img src="vendor/icons/chat-right-text.svg" alt="" width="20" height="20"></span>
                      <textarea name="user_message" id="user_message" class="form-control" rows="4" cols="68" placeholder="Hi can you assist me with...." aria-describedby="basic-addon2" readonly></textarea>
                    </div>

                    <?php if($role == 'Admin'){ ?>

                    <label for="Message">Admin Reply</label>
                    <div class="input-group">
                      <span class="input-group-addon"id="basic-addon3"><img src="vendor/icons/chat-right-text.svg" alt="" width="20" height="20"></span>
                      <textarea name="admin_reply" id="admin_reply" class="form-control" rows="4" cols="68" placeholder="Hi can you assist me with...." aria-describedby="basic-addon3" required></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="glyphicon glyphicon-send"></i> Send Reply
                        </button>
                    </div>
                    <?php } ?>

                    <?php if($role == 'Student'){ ?>
                        <label for="Message">Admin Reply</label>
                        <div class="input-group">
                          <span class="input-group-addon"id="basic-addon2"><img src="vendor/icons/chat-right-text.svg" alt="" width="20" height="20"></span>
                          <textarea name="admin_reply" id="admin_reply" class="form-control" rows="4" cols="68" placeholder="Hi can you assist me with...." aria-describedby="basic-addon2" readonly></textarea>
                        </div>
                    <?php } ?>
				          </form>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="glyphicon glyphicon-remove-sign"></i> Close
                  </button>
                </div>
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
<script type="text/javascript" src="js_crud_script/delete_reply_Messages.js"></script>

<script type="text/javascript" src="js_crud_script/page_Loader.js"></script>

<script src="asset/jquery/numericInput.js"></script>

<script> 
  $(document).ready(function(){
    var table = $('#lftable').DataTable({
        "pageLength": 6,
        "ordering": false,
        "searching": true,
        "pagingType": "simple",
        "dom": 'rtip',
        "language": {"zeroRecords": "Currently we have no message for you"}
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
  	
      
      $(document).on('click', '.reply_message', function () {

        $('#reply_message_id').val($(this).data('msg-id'));

        $('#user_message').text(
            $(this).data('full-comment')
        );

        $('#admin_reply').val(
            $(this).data('admin-reply')
        );

        $('#admin_reply_text').text(
            $(this).data('admin-reply')
        );

        $('#replyModal').modal('show');
    });
  });
</script>