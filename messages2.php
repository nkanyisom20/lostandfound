
<?php
  include 'include_lf/auth.php';
  include 'include_lf/connect.php';

  $student_no = $_SESSION['student_no'];
  $role = $_SESSION['role'];
  $surname = $_SESSION['surname'];
  $fullnames = $_SESSION['fullnames'];
?>
<?php
if ($role == 'Student') {
    $receiver = 'Admin';
} else {
    $receiver = $_GET['student_no'] ?? '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Messages</title>
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
</head>
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
<nav class="navbar navbar-inverse" >
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
              <li class="active">
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
              <li>
                <?php if ($role == 'Admin') { ?>
                  <a href="messages2.php"><i class="glyphicon glyphicon-comment"></i> Messages2</a>
                <?php } ?>
              </li><li>
                <?php if ($role == 'Student') { ?>
                  <a href="messages2.php"><i class="glyphicon glyphicon-comment"></i> Messages2</a>
                <?php } ?>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" style="color: lightblue" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="badge badge-light"> <i class="glyphicon glyphicon-user"></i><?php echo " ". ucwords($surname.' '.$fullnames); ?> <span class="caret"></span></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="profile.php"><i class="glyphicon glyphicon-cog"></i> Profile</a></li>
                  <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div>
      </nav>
    <h3>Chat Messages</h3>

    <div id="chat-box"style="height:200px;overflow-y:auto; border:1px solid #ddd; padding:10px;">
    </div>

    <textarea id="message" class="form-control" placeholder="Type message"></textarea>

    <br>

    <button id="sendBtn" class="btn btn-primary">
        Send
    </button>

</div>

<script>

function loadMessages() {

    $.ajax({
        url: "include_lf/messages_Load.php",
        method: "GET",
        data: {
            receiver:'<?php echo $receiver; ?>'
        },
        success:function(data){
            $("#chat-box").html(data);
            $("#chat-box").scrollTop(
                $("#chat-box")[0].scrollHeight
            );
        }
    });
}

setInterval(loadMessages,2000);
loadMessages();

$("#sendBtn").click(function(){

    var msg = $("#message").val();

    $.ajax({
        url:"include_lf/messages_Send.php",
        method:"POST",
        data:{
            receiver:'<?php echo $receiver; ?>',
            message:msg
        },
        success:function(){
            $("#message").val('');
            loadMessages();
        }
    });

});

</script>

</body>
</html>
<script type="text/javascript" src="js_crud_script/page_Loader.js"></script>