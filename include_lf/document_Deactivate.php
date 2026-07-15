<?php
  include 'auth.php';
  include 'connect.php';

  $student_no = $_SESSION['student_no'];
  $role = $_SESSION['role'];

	if($_REQUEST['doc_no']) {
		$sql = "UPDATE doc_type SET document_status = '0' WHERE document_no='".$_REQUEST['doc_no']."'";
		$resultset = mysqli_query($connect, $sql) or die("database error:". mysqli_error($connect));
		if($resultset) {
			echo "Record Deactivated";
		}
	}
?>
