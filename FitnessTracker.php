<?php
require 'dbconfig/config.php'; 
 ?>
// this is a fitness tracker database with web interface, users can add their cardio or resistance work out to the database
// users can display workouts in a table with attributes like distance, MPH, heart rate, etc. based on querying exercise name (near the bottom of page)
// this works on my local pc with Xampp and phpMyAdmin, it is ready to upload to hosted site

<!DOCTYPE html>
<html>
<head>
<title>Fitness Tracker Page</title>
<link rel=“stylesheet” href=“css/style.css”>
</head>
<body style=“background-color:#272727”>
	<div id="main-wrapper">
		<center><h2>Insert User</h2></center>

		<div id="inner_container">
			<form action="index.php" method="post">

				<!--Below is where a user or admin can enter new users and create user in database-->
				<!--I'll soon add different pages for admins and users-->
				
				<input type="number" placeholder="Enter User ID" name="userid">-->
				<center><label><b>First Name</b></label>
				<input type="text" placeholder="Enter First Name" name="fname">
				<label><b>Last Name</b></label>
				<input type="text" placeholder="Enter Last Name" name="lname">
				<label><b>Email</b></label>
				<input type="text" placeholder="Enter Email" name="email">
				<label><b>Password</b></label>
				<input id="password" type="text" placeholder="Enter Password" name="password">
				</center>
				<center>
					<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
				</center>
				
				<!--below the user or admin can update password--> 
				
				<center><h2>Update Password</h2>
				<label><b>User ID</b></label>    
				<input type="number" placeholder="Enter User ID" name="userid_pword">
				<label><b>Password</b></label>
				<input type="text" placeholder="Enter Password" name="password_update">
				</center>
				<center>
					<button id="btn_update_pword" name="update_btn_pword" type="submit">Update</button>
				</center>
				
				<!--below the user can be deleted by using User ID-->
				
				<center><h2>Delete User</h2>
				<label><b>User ID</b></label>
				<input type="number" placeholder="Enter User ID" name="userid_delete">
				</center>
				<center>
				<button id="btn_delete_user" name="delete_btn_user" type="submit">Delete</button>
				</center>
				
				<!--below updates user email-->
				
				<center><h2>Update Email</h2>
				<label><b>User ID</b></label>    
				<input type="number" placeholder="Enter User ID" name="userid_email">
				<label><b>Email</b></label>
				<input type="text" placeholder="Enter Email" name="email_update">
				</center>
				<center>
					<button id="btn_update_email" name="update_btn_email" type="submit">Update</button>
				</center>
				
				<!--below the user can add cardio exercises with attributes like distance, mph, max heart rate, etc.-->
				
				<center><h2>Insert Cardio Exercise</h2>
				<label><b>User ID</b></label>    
				<input type="number" placeholder="Enter User ID" name="userid_cardio">
				<label><b>Exercise Name</b></label>
				<input type="text" placeholder="Enter Exercise Name" name="cardio_name">
				<label><b>Distance</b></label>
				<input type="float" placeholder="Enter Distance" name="cardio_distance">
				<label><b>Miles Per Hour</b></label>
				<input type="float" placeholder="Enter MPH" name="cardio_MPH">
				<label><b>Max Heart BPM</b></label>
				<input type="number" placeholder="Enter Max Heart BPM" name="cardio_maxbpm">
				</center>
				<center>
					<button id="btn_insert_cardio" name="insert_btn_cardio" type="submit">Insert</button>
				</center>
				
				<!--below the user can add resistance exercises with attributes-->
				
				<center><h2>Insert Resistance Exercise</h2>
				<label><b>User ID</b></label>    
				<input type="number" placeholder="Enter User ID" name="userid_resist">
				<label><b>Exercise Name</b></label>
				<input type="text" placeholder="Enter Exercise Name" name="resist_name">
				<center/>
				<center>
				<label><b>Set 1 Resistance</b></label>
				<input type="float" placeholder="Enter Resistance" name="set1_resist">
				<label><b>Set 1 Reps</b></label>
				<input type="number" placeholder="Enter Reps" name="set1_reps">
				<label><b>Set 2 Resistance</b></label>
				<input type="float" placeholder="Enter Resistance" name="set2_resist">
				<label><b>Set 2 Reps</b></label>
				<input type="number" placeholder="Enter Reps" name="set2_reps">
				<label><b>Set 3 Resistance</b></label>
				<input type="float" placeholder="Enter Resistance" name="set3_resist">
				<label><b>Set 3 Reps</b></label>
				<input type="number" placeholder="Enter Reps" name="set3_reps">
				</center>
				<center>
					<button id="btn_insert_resist" name="insert_btn_resist" type="submit">Insert</button>
				</center>
				
				<!-- below the user can enter 'exercise name' and output all cardio exercises for that user in a table with attributes-->
					
				<center><h2>Show User Cardio Exercises</h2>
				<label><b>User ID</b></label>    
				<input type="number" placeholder="Enter User ID" name="spec_user_cardio">
				<label><b>Exercise Name</b></label>
				<input type="text" placeholder="Enter Exercise Name" name="spec_cardio_name">
				<label><b>Date Range From</b></label>    
				<input type="date" placeholder="YYYY-MM-DD" name="start_cardio_date">
				<label><b>To</b></label>    
				<input type="date" placeholder="YYYY-MM-DD" name="end_cardio_date">
				<center/>
				<center>
					<button id="btn_cardio_user" name="user_btn_cardio_spec" type="submit">Get</button>
				</center>
				
			</form>
			<?php
      // all php functions are below
      // this is insert new user button php
			if(isset($_POST['insert_btn'])){
				
				@$fname=$_POST['fname'];
				@$lname=$_POST['lname'];
				@$email=$_POST['email'];
				@$password=$_POST['password'];
				
				if($fname=="" || $lname=="" || $email=="" || $password=="")
				{
					echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
				}
				else{
					$query = "insert into user (fname, lname, email, password) values('$fname', '$lname', '$email', '$password')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Values Not inserted")</script>';
				}
				}
			}
			?>
		//this is update email php
			<?php
			if(isset($_POST['update_btn'])){
				@$userid=$_POST['userid'];
				@$email=$_POST['email'];
				if($userid=="" || $email=="")
				{
					echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
				}
				else{
					$query = "update user SET email='$email' where userid = '$userid'";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Values updated successfully")</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Values Not updated")</script>';
				}
				}
			}
			?>
		//this is update password php			
			<?php
			if(isset($_POST['update_btn_pword'])){
				@$userid_pword=$_POST['userid_pword'];
				@$password_update=$_POST['password_update'];
				if($userid_pword=="" || $password_update=="")
				{
					echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
				}
				else{
					$query = "update user SET password='$password_update' where userid = '$userid_pword'";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Values updated successfully")</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Values Not updated")</script>';
				}
				}
			}
			?>
					
      		// this allows user to add their cardio workout to the database
			if(isset($_POST['insert_btn_cardio'])){
				
				@$userid_cardio=$_POST['userid_cardio'];
				@$cardio_name=$_POST['cardio_name'];
				@$cardio_distance=$_POST['cardio_distance'];
				@$cardio_MPH=$_POST['cardio_MPH'];
				@$cardio_maxbpm=$_POST['cardio_maxbpm'];
				
				if($userid_cardio=="" || $cardio_name=="" || $cardio_distance=="")
				{
					echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
				}
				else if($cardio_MPH=="" && $cardio_maxbpm=="")
				{
					$query = "insert into cardio_exercise (userid, exercisename, distance) values('$userid_cardio', '$cardio_name', '$cardio_distance')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
					}
				}
				else if($cardio_MPH=="")
				{
					$query = "insert into cardio_exercise (userid, exercisename, distance, maxHeartBPM) values('$userid_cardio', '$cardio_name', '$cardio_distance', '$maxheartBPM')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
					}
				}
				else if($cardio_maxbpm=="")
				{
					$query = "insert into cardio_exercise (userid, exercisename, distance, MPH) values('$userid_cardio', '$cardio_name', '$cardio_distance', '$cardio_MPH')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
					}
				}
				else{
					$query = "insert into cardio_exercise (userid, exercisename, distance, mph,maxheartbpm) values('$userid_cardio', '$cardio_name', '$cardio_distance', '$cardio_MPH', '$cardio_maxbpm')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Values Not inserted")</script>';
				}
				}
			}
			?>
			
		//this adds resistance exercise with attributes
			<?php
			if(isset($_POST['insert_btn_resist'])){
				
				@$userid_resist=$_POST['userid_resist'];
				@$resist_name=$_POST['resist_name'];
				@$set1_resist=$_POST['set1_resist'];
				@$set1_reps=$_POST['set1_reps'];
				@$set2_resist=$_POST['set2_resist'];
			    @$set2_reps=$_POST['set2_reps'];
				@$set3_resist=$_POST['set3_resist'];
			    @$set3_reps=$_POST['set3_reps'];
				
				if($userid_resist=="" || $resist_name=="" || $set1_resist=="" || $set1_reps=="")
				{
					echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
				}
				else if($set3_resist=="" && $set3_reps=="")
				{
					$query = "insert into resist_exercise (userid, exercisename, set1_resist, set1_reps, set2_resist, set2_reps) values('$userid_resist', '$resist_name', '$set1_resist', '$set1_reps', '$set2_resist', '$set2_reps')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
					}
				}
				else if($set2_resist=="" && $set2_reps=="" && $set3_resist=="" && $set3_reps=="")
				{
					$query = "insert into cardio_exercise (userid, exercisename, set1_resist, set1_reps) values('$userid_resist', '$resist_name', '$set1_resist', '$set1_reps')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
					}
				}

				else{
					$query = "insert into resist_exercise (userid, exercisename, set1_resist, set1_reps, set2_resist, set2_reps, set3_resist, set3_reps) values('$userid_resist', '$resist_name', '$set1_resist', '$set1_reps', '$set2_resist', '$set2_reps', '$set3_resist', '$set3_reps')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Values Not inserted")</script>';
				}
				}
			}
			?>
		
		//this shows user cardio workouts in a table with attributes based on exercise name
			<?php
			if(isset($_POST['user_btn_cardio_spec'])){
				
				@$spec_user_cardio=$_POST['spec_user_cardio'];
				@$spec_cardio_name=$_POST['spec_cardio_name'];
				@$start_cardio_date=$_POST['start_cardio_date'];
				@$end_cardio_date=$_POST['end_cardio_date'];
				
				if($spec_user_cardio=="" || $spec_cardio_name=="")
				{
					echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
				}
				else if ($start_cardio_date=="" || $end_cardio_date=="")
				{
				    $query = "select ExerciseName, distance, mph, datetime from cardio_exercise where userid='$spec_user_cardio' and exercisename='$spec_cardio_name'";
					$result=mysqli_query($con, $query);
					
					echo"<table border='1'>";
					echo"<tr><td>Exercise Name</td><td>Distance</td><td>MPH</td><td>Date/Time</td></tr>";
					while($row = mysqli_fetch_assoc($result)) {
						echo"<tr><td>{$row['ExerciseName']}</td><td>{$row['distance']}</td><td>{$row['mph']}</td><td>{$row['datetime']}</td></tr>";
				}
				echo"</table>";
			
				}
				else 
				{
				$query = "select ExerciseName, distance, mph, datetime from cardio_exercise where userid='$spec_user_cardio' and exercisename='$spec_cardio_name' and date(DateTime) BETWEEN '$start_cardio_date' and '$end_cardio_date'";
					$result=mysqli_query($con, $query);
					
					echo"<table border='1'>";
					echo"<tr><td>Exercise Name</td><td>Distance</td><td>MPH</td><td>Date/Time</td></tr>";
					while($row = mysqli_fetch_assoc($result)) {
						echo"<tr><td>{$row['ExerciseName']}</td><td>{$row['distance']}</td><td>{$row['mph']}</td><td>{$row['datetime']}</td></tr>";
				}
				echo"</table>";
				}
			}
			?>
			
      // this deletes user from database via user ID
			<?php
			if(isset($_POST['delete_btn_user'])){
				@$userid_delete=$_POST['userid_delete'];
				if($userid_delete=="")
				{
					echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
				}
				else{
					$query = "delete from user where userid='$userid_delete'";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Values updated successfully")</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Values Not updated")</script>';
				}
				}
			}
			?>
		</div>
	</div>
</body>
</html>
