
<?php
//include header part of html
 include('header.php')
  ?>
            

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 jumbotron">
                            <h2 style="text-align: center;">
                                WELCOME TO STUDENT MANAGEMENT SYSTEM
                                <span style="float: right;"><a href="login.php" class="btn btn-info btn-lg">Admin Login</a></span>
                            </h2>
                    </div>
                </div>
            </div>

            <div class="student-info text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 jumbotron">
                            <h2>Student's information</h2>
                            <form action="index.php" method="post">
                <input type="text" name="roll" placeholder="Enter Roll Number" style="width: 240px;height: 35px;"><span>OR/AND<span>
                 <select name="classroom" class="btn btn-info" >
                                    <option>SELECT STANDARD</option>
                                    <option>101i</option>
                                    <option>102i</option>
                                    <option>103i</option>
                                    <option>104i</option>
                                    <option>105i</option>
                                </select>
                  <input type="submit" name="show" value="SHOW INFO" class="btn btn-success text-center" style="margin-left: 30px;" >  
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<table class="table table-striped table-bordered table-responsive text-center">
    <tr >
        <th class="text-center">StudentID.</th>
        <th class="text-center">Full Name</th>
        <th class="text-center">Classroom</th>
        <th class="text-center">Classtime</th>
        <th class="text-center">Behaviour</th>
        <th class="text-center">Profile Pic</th>
    </tr>
<?php 
    include('dbcon.php');
    if (isset($_POST['show'])) {

        $Classroom = $_POST['classroom'];
       
        $sql = "SELECT * FROM `student` WHERE classroom ='104i'";

        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $Id = $DataRows['id'];
                $Studentid = $DataRows['studentid'];
                $Name = $DataRows['name'];
                $Classroom = $DataRows['classroom'];
                $Classtime = $DataRows['classtime'];
                $Behaviour = $DataRows['behaviour'];
                $ProfilePic = $DataRows['image'];
                ?>
                <tr>
                    <td><?php echo $Studentid;?></td>
                    <td><?php echo $Name; ?></td>
                    <td><?php echo $Classroom;?></td>
                    <td><?php echo $Classtime; ?></td>
                    <td><?php echo $Behaviour; ?></td>
                    <td><img src="databaseimg/<?php echo $ProfilePic;?>" alt="img"></td>
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

