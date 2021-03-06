<?php
// This script and data application were generated by AppGini 5.70
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/students.php");
	include("$currDir/students_dml.php");



	// hook: students_header
	$headerCode='';
	if(function_exists('students_header')){
		$args=array();
		$headerCode=students_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}
	
              

?>

	<html>
	<body>
	
	<br>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Resident</button>
<br>
<br>
<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Search by Resident Details" class="form-control" />
				</div>
			</div>
			<div id="result"></div>
		<div style="clear:both"></div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Resident Information</h4>
      </div>
      <div class="modal-body">
  <form action="students_view.php" method="POST">
    <div class="form-group">
      <label for="name">First Name:</label>
      <input type="name" class="form-control" id="fname" placeholder="Enter firstname" name="firstname" required>
    </div>
	    <div class="form-group">
      <label for="name">Middle Name:</label>
      <input type="name" class="form-control" id="mname" placeholder="Enter middlename" name="middlename" required>
    </div>
    <div class="form-group">
      <label for="name">Last Name:</label>
      <input type="name" class="form-control" id="lname" placeholder="Enter lastname" name="lastname" required>
    </div>
    <div class="form-group">
      <label for="mobile">Mobile:</label>
      <input type="mobile" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" required>
    </div>
        <div class="form-group">
      <label for="address">Address:</label>
      <input type="address" class="form-control" id="address" placeholder="Enter address" name="address" required>
    </div>
	
	<div class="form-group">
      <label for="name">Age:</label>
      <input type="name" class="form-control" id="age" placeholder="Age" name="age">
    </div>

	<div class="form-group">
      <label for="name">Date of Birth:</label>
      <input type="name" class="form-control" id="dob" placeholder="Date of Birth" name="dob">
    </div>
	
	<div class="form-group">
      <label for="name">Civil Status:</label>
      <input type="name" class="form-control" id="civil" placeholder="Civil Status" name="civil" required>
    </div>

        <div class="form-group">
      <label for="address">Gender</label>
      <input type="address" class="form-control" id="gender" placeholder="Gender" name="gender" required>
    </div>
	
	<div class="form-group">
      <label for="name">Citizenship:</label>
      <input type="name" class="form-control" id="citizenship" placeholder="Enter citizenship" name="citizenship">
    </div>
	
		<div class="form-group">
      <label for="name">Place of Birth</label>
      <input type="name" class="form-control" id="placeofbirth" placeholder="Enter place of birth" name="placeofbirth">
    </div>
	
		<div class="form-group">
      <label for="name">Occupation:</label>
      <input type="name" class="form-control" id="occupation" placeholder="Enter occupation" name="occupation">
    </div>

    <button type="submit" class="btn btn-default" id="submit" name="submit">Submit</button>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
	</div>
	</div>
	
	 <link href="js/bootstrap.min.css" rel="stylesheet">




      <div class="container" style="margin-top:35px">
        <div class="form-group">
            <select name="state" id="maxRows" class="form-control" style="width:150px;">
                <option value="5000">Show All</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="75">75</option>
                <option value="100">100</option>
            </select>
        </div>

        <?php
                include ('connection.php');
                $show = mysqli_query($conn,"SELECT * FROM tbl_residents");        
                
        if(mysqli_num_rows($show)>0){
		
		echo "<form method='POST' action='students_view.php'>";
        echo "<table id='mytable' class='table table-bordered table-striped'>";
        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Firstname</th>";
						echo "<th>Middlename</th>";
                        echo "<th>Lastname</th>";
                        echo "<th>Mobile</th>";
						echo "<th>Address</th>";
						echo "<th>Age</th>";
						echo "<th>Date of Birth</th>";
						echo "<th>Civil Status</th>";
						echo "<th>Gender</th>";
						echo "<th>Citizenship</th>";
						echo "<th>Place of Birth</th>";
						echo "<th>Occupation</th>";
						echo "<th>Actions</th>";
                        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
                        while($row=mysqli_fetch_array($show)){
                            echo "<tr>";
                            echo "<td>".$row[1]."</td>";
                            echo "<td>".$row[2]."</td>";
                            echo "<td>".$row[3]."</td>";
                            echo "<td>".$row[4]."</td>";
							echo "<td>".$row[5]."</td>";
                            echo "<td>".$row[6]."</td>";
							echo "<td>".$row[7]."</td>";
							echo "<td>".$row[8]."</td>";
							echo "<td>".$row[9]."</td>";
							echo "<td>".$row[10]."</td>";
							echo "<td>".$row[11]."</td>";
							echo "<td>".$row[12]."</td>";
							$userid = $row[0];
							echo "<td><input type='submit' value='Print Certificate' name='btnprintcertificate".$userid."'>&nbsp<input type='submit' value='Print Cedula' name='btnprintcedula".$userid."'>&nbsp<input type='submit' value='Delete' name='btndelete".$userid."'></td>";
							echo "</tr>";
						}
          echo "</tbody>";
		  	echo '</form>';
        echo "</table>";

						
    }


                else{
                    echo "No records found";
                }
	
	
	
if(isset($_POST['btndelete'.$userid])){

               include 'connection.php';

                $qry = "DELETE FROM tbl_residents where resident_id = '$userid'";  
                mysqli_query($conn, $qry)   or die (mysqli_error($conn));
			echo "<script type='text/javascript'>
            alert('Item deleted!');
            window.location='students_view.php';
            </script>";

                 }	

if(isset($_POST['btnprintcedula'.$userid])){

               include 'connection.php';

			    $selectdata = mysqli_query($conn, "SELECT * FROM tbl_residents where resident_id = '$userid'");

                $row = mysqli_fetch_array($selectdata);
				
				$id = $row['resident_id'];
				$firstname = $row['resident_fname'];
				$middlename = $row['resident_mname'];
				$lastname = $row['resident_lname'];
				$mobile = $row['resident_mobile'];
				$address = $row['resident_address'];
				$age = $row['resident_age'];
				$dob = $row['resident_dob'];
				$civilstatus = $row['resident_civil'];
				$gender = $row['resident_gender'];
				$citizenship = $row['resident_citizenship'];
				$placeofbirth = $row['resident_pob'];
				$occupation = $row['resident_occupation'];			   
			   
				$query = "INSERT INTO tbl_cedula(resident_id,resident_fname,resident_mname,resident_lname,resident_mobile,resident_address,resident_age,resident_dob,resident_civil,resident_gender,resident_citizenship,resident_pob,resident_occupation)
VALUES ('$id','$firstname','$middlename','$lastname','$mobile','$address','$age','$dob','$civilstatus','$gender','$citizenship','$placeofbirth','$occupation');";
                mysqli_query($conn, $query) or die (mysqli_error($conn));
			   
				$selectcedula = mysqli_query($conn, "SELECT * FROM tbl_cedula where resident_id = '$userid' ORDER BY cedula_id DESC");
				$roww = mysqli_fetch_array($selectcedula);
				$cedula_id = $roww['cedula_id'];
				
		echo "<html>
				<body>
				<div id='printModal' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
  
      <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Print Preview</h4>
      </div>
      <div class='modal-body'>
    
<table class='table table-bordered'>
  <thead>
    <tr>
      <th>Cedula No.</th>
      <th>Full Name</th>
      <th>Mobile</th>
	  <th>".$roww['resident_mobile']."</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>".$cedula_id."</th>
      <td>".$row['resident_fname']." ".$row['resident_mname']." ".$row['resident_lname']."</td>
	  <td>Age</td><td>".$row['resident_age']."</td>
    </tr>
	<tr>
	<th scope='row'>Address</th>
      <td>".$row['resident_address']."</td>
	  <td scope='row'>Civil Status</td><td>".$row['resident_civil']."</td>
	</tr>
	<th>Citizenship</th>
	<td>".$row['resident_citizenship']."</td>
	<th>Date of Birth</th>
	<td>".$row['resident_dob']."</td>
	<tr>
	<th>Place of Birth</th>
	<td>".$row['resident_pob']."</td>
	<th>Occupation</th>
	<td>".$row['resident_occupation']."</td>
	</tr>
	</tbody>
	</table>

	</div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Print</button>
      </div>
    </div>
	</div>
	</div>
	</body>
	</html>
	<script>$('#printModal').modal('show')</script>";				
        }


if(isset($_POST['btnprintcertificate'.$userid])){

               include 'connection.php';

			    $selectdata = mysqli_query($conn, "SELECT * FROM tbl_residents where resident_id = '$userid'");

                $row = mysqli_fetch_array($selectdata);
				
		echo "<html>
				<body>
				<div id='clearanceModal' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
  
      <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Print Preview</h4>
      </div>
      <div class='modal-body'>
	  <center><p>Certificate of Clearance</p></center>
	  <br><p>To whom it may concern,</p>

<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThis is to confirm that <u>".$row['resident_fname']." ".$row['resident_mname']." ".$row['resident_lname']."</u> has bonafide age and a resident of Brgy. Del Pilar and has no record of any violations in our barangay.</p>

<br>
<p>Sincerely,</p>
<p>Brgy. Chairman</p>
<p>Del Pilar</p>
	</div>
	      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Print</button>
      </div>
    </div>
    </div>
	</div>
	</body>
	</html>
	<script>$('#clearanceModal').modal('show')</script>";				
        }		
				 
				 
if(isset($_POST["submit"])){
global $conn;
$firstname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$lastname = $_POST["lastname"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$age = $_POST["age"];
$dob = $_POST["dob"];
$civilstatus = $_POST["civil"];
$gender = $_POST["gender"];
$citizenship = $_POST["citizenship"];
$placeofbirth = $_POST["placeofbirth"];
$occupation = $_POST["occupation"];

$query = "INSERT INTO tbl_residents(resident_fname,resident_mname,resident_lname,resident_mobile,resident_address,resident_age,resident_dob,resident_civil,resident_gender,resident_citizenship,resident_pob,resident_occupation,remarks)
VALUES ('$firstname','$middlename','$lastname','$mobile','$address','$age','$dob','$civilstatus','$gender','$citizenship','$placeofbirth','$occupation',0);";
    
mysqli_query($conn, $query) or die (mysqli_error($conn));
mysqli_close($conn);

     echo "<script type='text/javascript'>
            alert('Added successfully!');
            window.location='students_view.php';
            </script>";

}
   
  
  
	
	?>
	
	<div class='pagination-container' >
            <nav>
                <ul class="pagination"></ul>
            </nav>
        </div>
	</body>
	</html>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        var table = '#mytable';
        $('#maxRows').on('change',function(){
		  	$('.pagination').html('');
		  	var trnum = 0 ;	
		  	var maxRows = parseInt($(this).val());
		  	var totalRows = $(table+' tbody tr').length;
			 $(table+' tr:gt(0)').each(function(){	
			 	trnum++;				
			 	if (trnum > maxRows ){		
			 		$(this).hide();		
			 	}if (trnum <= maxRows ){$(this).show();}
			 });										
			 if (totalRows > maxRows){						
			 	var pagenum = Math.ceil(totalRows/maxRows);	
			 	for (var i = 1; i <= pagenum ;){
			 	$('.pagination').append('<li data-page="'+i+'">\
								      <span>'+ i++ +'<span class="sr-only">(current)</span></span>\
								    </li>').show();
			 	}											
			} 												
			$('.pagination li:first-child').addClass('active');
			$('.pagination li').on('click',function(){	
				var pageNum = $(this).attr('data-page');
				var trIndex = 0 ;						
				$('.pagination li').removeClass('active');
				$(this).addClass('active');				 
				$(table+' tr:gt(0)').each(function(){	
				 	trIndex++;	
				 	if (trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
				 		$(this).hide();		
				 	}else {$(this).show();} 				
				}); 										
            });	
        });
    </script>
	
	<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>