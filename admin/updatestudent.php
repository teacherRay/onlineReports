<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php include('../header.php') ?>
<?php include('admin.header.php') ?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3  jumbotron ">
			<div  style="text-align: center;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" >
				Choose Classroom: <select name="classroom" class="btn btn-info" style="margin-right: 30px;">					<option>Select</option>
									<option>101i</option>
									<option>102i</option>
									<option>103i</option>
									<option>104i</option>
									<option>105i</option>
								</select>
				<input type="submit" name="search" value="SEARCH" class="btn btn-success">
			</form>
			</div>
		</div>
	</div>

<?php
    echo  ErrorMessage();
    echo  SuccessMessage();
 ?>
<table class="table table-bordered table-striped table-responsive">
	<h2 class="text-center">Update Student's Information</h2>
	<tr class="text-center">
		<th>Student ID.</th>
		<th>Full Name</th>
		<th>Classroom</th>
		<th>Classtime</th>
		<th>Behaviour</th>
		<th>Comprehension</th>
	</tr>
<?php 
	include('../dbcon.php');
	if (isset($_POST['search'])) {

		$classroom = $_POST['classroom'];

		$sql = "SELECT * FROM `student` WHERE `classroom` = '$classroom'";

		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			while ($DataRows = mysqli_fetch_assoc($result)) {
				$Id = $DataRows['id'];
				$Studentid = $DataRows['studentid'];
				$Name = $DataRows['name'];
				$Classroom= $DataRows['classroom'];
                $Classtime= $DataRows['classtime'];
                $Behaviour= $DataRows['behaviour'];
                $Comprehension= $DataRows['comprehension'];
                // $Participation= $DataRows['participation'];
                // $Conversation= $DataRows['conversation'];
                // $Homework= $DataRows['homework'];
				// $ProfilePic = $DataRows['image'];
				?>

				<tr class="text-center">
                    <td><?php echo $Studentid;?></td>
                    <td><?php echo $Name; ?></td>
                    <td><?php echo $Classroom;?></td>
                    <td><?php echo $Classtime;?></td>
                    <td><?php echo $Behaviour;?></td>
                    <td><?php echo $Comprehension;?></td>
                    <!-- <td><?php echo $Participation;?></td>
                    <td><?php echo $Conversation;?></td>
                    <td><?php echo $Homework;?></td> -->
                </tr>

					
					<td><a href="UpdateRecord.php?Update=<?php echo $Id; ?>" class="btn btn-warning">UPDATE</a></td>
				</tr>
				<?php
				
			}
			
		} else {
			echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
		}
	}

 ?>
	

</table>
</div>
<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2><?php echo @$_GET['updated']; ?></h2>
			</div>
		</div>
	</div>	



<?php include('../footer.php');?>