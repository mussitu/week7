<?php
	//MySQL connection credentials
	$server = "sql2.njit.edu";
	$user   = "mt444";
	$pass   = "ug1Ts82iV";
	$db     = "mt444";
	try{
		$db = new PDO('mysql:host=' . $server . ';dbname=' . $db, $user, $pass);
		if($db){
			echo "Connected successfully<br/>";
			$rowCount = 0;
			$tableDisplay = "<table>
						<tr>
							<th>Id</th>
							<th>Email</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Phone</th>
							<th>Birthday</th>
							<th>Gender</th>
							<th>Password</th>
						</tr>";
			foreach($db->query('select * from accounts where id<6;') as $row){
				$rowCount++;
				$id = $row['id'];
				$email = $row['email'];
				$fname = $row['fname'];
				$lname = $row['lname'];
				$phone = $row['phone'];
				$birthday = $row['birthday'];
				$gender = $row['gender'];
				$password = $row['password'];
				$tableDisplay .= "<tr>
							<td>" . $id . "</td>
							<td>" . $email . "</td>
							<td>" . $fname . "</td>
							<td>" . $lname . "</td>
							<td>" . $phone . "</td>
							<td>" . $birthday . "</td>
							<td>" . $gender . "</td>
							<td>" . $password . "</td>
						 </tr>";
			}
			$tableDisplay .= "</table>";
			echo "Number of records:" . $rowCount . "<br/>";
			echo $tableDisplay;
		}
	}catch(PDOException $e){
		echo "PDO Exception:" . $e->getMessage() . "<br/>";
		die();
	}
?>
