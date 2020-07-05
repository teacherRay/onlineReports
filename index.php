
<?php
//include header part of html
 include('header.php')
  ?>
            

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 jumbotron">
                            <h2 style="text-align: center;">
                                Welcome to the Home of Engine Online Report Card System
                                <span style="float: right;"><a href="login.php" class="btn btn-info btn-lg">Admin Login</a></span>
                            </h2>
                    </div>
                </div>
            </div>

            <div class="student-info text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 jumbotron">
                            <h2>Select a Classroom and Classtime</h2>
                            <form action="index.php" method="post">
                <!-- <input type="text" name="classtime" placeholder="Enter Am or Pm" style="width: 140px;height: 35px;"><span> AND <span> -->

                 <select name="classroom" class="btn btn-info" >
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
            </div>

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

       
        <!-- <th class="text-center">parent phone No.</th> -->
        <!-- <th class="text-center">Profile Pic</th> -->
    </tr>
<?php 
    include('dbcon.php');
    if (isset($_POST['show'])) {

        $Classroom = $_POST['classroom'];
        $Classtime = $_POST['classtime'];
        // $Studentid = $_POST['studentid'];

        // $sql = "SELECT * FROM `student` WHERE `classroom` = '$Classroom' OR `studentid`='$Studentid'";
        $sql = "SELECT * FROM `student` WHERE `classroom` = '$Classroom' AND `classtime`='$Classtime'";

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
                
                ?>
                <tr>
                    <td><?php echo $Studentid;?></td>
                    <td><?php echo $Name; ?></td>
                    <td><?php echo $Classroom;?></td>
                    <td><?php echo $Classtime;?></td>
                    <td><?php echo $Behaviour;?></td>
                    <td><?php echo $Comprehension;?></td>
                    <td><?php echo $Participation;?></td>
                    <td><?php echo $Conversation;?></td>
                    <td><?php echo $Homework;?></td>


                </tr>
                <?php
                
            }
            
        } else {
            echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
        }
    }

 ?>
    


<!--include header part of html-->
<?php include('footer.php') ?>

