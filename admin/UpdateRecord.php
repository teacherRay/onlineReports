<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php 

	include('../dbcon.php');
	$update_record= $_GET['Update'];
	$sql = "select * from student where id = '$update_record'";
	$result = mysqli_query($conn,$sql);

	while ($data_row = mysqli_fetch_assoc($result)) {
		$update_id = $data_row['id']; 
		$StudentID = $data_row['studentid'];
		$Name = $data_row['name'];
		$Classroom= $data_row['classroom'];
		$Classtime = $data_row['classtime'];
		$Pcontact = $data_row['pcontact'];
		

	}

 ?>

<?php include('../header.php') ?>

<?php include('admin.header.php') ?>

<div class="container jumbotron">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="text-center">UPDATE STUDENT DETAIL</h2>
			<form action="UpdateRecord.php?update_id=<?php echo $update_id;?>" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				      Student ID.:<input type="text" class="form-control" name="studentid" value="<?php echo 
				      $StudentID;?>" >
				  </div>
				  <div class="form-group">
				    
				    Full Name:<input type="text" class="form-control" name="fullname" value="<?php echo 
				    $Name;?>" placeholder="full name" required>
				  </div>

				  <div class="form-group">
				    Classroom:<input type="text" class="form-control" name="classroom" value="<?php echo $Classroom;?>" required>
				  </div>

				  <div class="form-group">
				    Classtime <input type="text" class="form-control" name="classtime" value="<?php echo $Classtime;?>"  required>
				  </div>

				  <div class="form-group"> 
				    Parent Phone No.:<input type="text" class="form-control" name="pphone" value="<?php echo $Pcontact;?>" required>
				  </div>

				  


				  <button type="submit" name="submit" class="btn btn-success btn-lg">UPDATE</button>
			</form>
		</div>
	</div>
</div>

<?php include('../footer.php') ?>


<?php 
//This php code block is for editing the data that we got after clicking on update button
	if (isset($_POST['submit'])) {
		if (!empty($_POST['studentid']) && !empty($_POST['fullname'])) {
		
			include ('../dbcon.php');
			$id = $_GET['update_id'];
			$studentid=$_POST['studentid'];
			$name=$_POST['fullname'];
			$classroom=$_POST['classroom'];
			$classtime=$_POST['classtime'];
			$pphone=$_POST['pphone'];

			$sql = "UPDATE student SET studentid = '$studentid', name = '$name', classtime='$classtime', pcontact = '$pphone', classroom = '$classroom' WHERE id = '$id'";

			$Execute = mysqli_query($conn,$sql);

			if ($Execute) {
				 $_SESSION['SuccessMessage'] = " Data Updated Successfully";
                Redirect_to("updatestudent.php");

			}


		}

	}

 ?>
