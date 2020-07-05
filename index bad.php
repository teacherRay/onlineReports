<!-- Ray Bates 5 July 2020 -->
<?php
//include header part of html
 include('header.php')
  ?>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 jumotron">
                            <h2 style="text-align: center;">
                                The Home of Engish Online Report Card System
                                <span style="float: right;"><a href="login.php" class="btn btn-info btn-lg">Admin Login</a></span>
                            </h2>
                    </div>
                </div>
            </div>

        <!--     <div class="student-info text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 jumbotron">
                            <h2>Select a Classroom and Classtime</h2>
                            <form action="index.php" method="post">
                <!-- <input type="text" name="classtime" placeholder="Enter Am or Pm" style="width: 140px;height: 35px;"><span> AND <span> -->

              <!--    <select name="classroom" class="btn btn-info" >
                                    <option>SELECT CLASSROOM</option>
                                    <option>101i</option>
                                    <option>102i</option>
                                    <option>103i</option>
                                    <option>104i</option>
                                    <option>105i</option>
                                </select>
                <input type="text" name="classtime" placeholder="Am or Pm" style="width: 70px;height: 35px;">                                
                  <input type="submit" name="show" value="SHOW INFO" class="btn btn-success text-center" style="margin-left: 30px;" >  
                            </form>
                        </div>
                    </div>
                </div>
            </div> --> -->

<table class="table table-striped table-bordered table-responsive text-center">
    <tr >
        <th class="text-center">Student ID.</th>
        <th class="text-center">Full Name</th>
        <th class="text-center">Classroom</th>
        <th class="text-center">Classtime</th>
        <th class="text-center">Behaviour</th>
        <th class="text-center">Comprehension</th>
        <th class="text-center">Participation</th>
        <th class="text-center">Conversation</th>
        <th class="text-center">Homework</th>
    </tr>
<?php 
    include('dbcon.php');
    if (isset($_POST['show'])) {

        $Classroom = $_POST['classroom'];
        $Classtime = $_POST['classtime'];
        
        $sql = "SELECT * FROM `student` WHERE `classroom` = '104i' AND `classtime`='am'";

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
                $Participation= $DataRows['participation'];
                $Conversation= $DataRows['conversation'];
                $Homework= $DataRows['homework'];

                $Classroom = $_POST['classroom'];
                $Classtime = $_POST['classtime'];
               // $Comprehension = $_POST['comprehension'];

                ?>
                <tr>
                    <td><?php echo $Studentid;?></td>
                    <td><?php echo $Name; ?></td>
                    <td><?php echo $Classroom;?></td>
                    <td><?php echo $Classtime;?>
                  
                    <td><?php echo $Behaviour;?>
                    <select  name="behaviour" id="behaviour">
                        <option value="0"></option>
                        <option value="4">A</option>
                        <option value="3">B</option>
                        <option value="2">C</option>
                        <option value="1">NI</option>
                    </select></td>
<!-- 
                    <td><?php echo $Comprehension;?>
                    <select  name="compscore" id="compscore">
                        <option value="0"></option>
                        <option value="4">A</option>
                        <option value="3">B</option>
                        <option value="2">C</option>
                        <option value="1">NI</option>
                    </select></td>

                    <td><?php echo $Participation;?>
                    <select  name="partscore" id="partscore">
                        <option value="0"></option>
                        <option value="4">A</option>
                        <option value="3">B</option>
                        <option value="2">C</option>
                        <option value="1">NI</option>
                    </select></td>

                    <td><?php echo $Conversation;?>
                    <select  name="convscore" id="convscore">
                        <option value="0"></option>
                        <option value="4">A</option>
                        <option value="3">B</option>
                        <option value="2">C</option>
                        <option value="1">NI</option>
                    </select></td>

                    <td><?php echo $Homework;?>
                    <select  name="hwkscore" id="hwkscore">
                        <option value="0"></option>
                        <option value="4">A</option>
                        <option value="3">B</option>
                        <option value="2">C</option>
                        <option value="1">NI</option>
                    </select></td>
                    <td><button type="button">Submit</button></td>
                </tr> -->
                <?php
                
            }
            
        } else {
            echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
        }
    }

 ?>
    

    <?php 
//This php code block is for editing the data that we got after clicking on update button
if (isset($_POST)) {
    //$id = $_GET['update_id'];
    include ('dbcon.php');

    $name = $_POST['name'];
    $Studentid = $_POST['studentid'];
    /* $Classroom = $_POST['classroom'];
    $Classtime = $_POST['classtime'];
    $Behaviour = $_POST['behaviour']; */

}

	 if (isset($_POST['submit'])) {
		if (!empty($_POST['studentid']) && !empty($_POST['name'])) {
		
			include ('../dbcon.php');
			$id = $_GET['update_id'];
			$Studentid=$_POST['studentid'];
			$name=$_POST['name'];
			$classroom=$_POST['classroom'];
			$classtime=$_POST['classtime'];
			$behaviour=$_POST['behaviour']; 

			$sql = "UPDATE student SET studentid = '$Studentid', name = '$name', classtime='$classtime', behaviour = '$behaviour', classroom = '$classroom' WHERE id = '$id'";

			$Execute = mysqli_query($conn,$sql);

			if ($Execute) {
				 $_SESSION['SuccessMessage'] = " Data Updated Successfully";
                //Redirect_to("updatestudent.php");
			}
