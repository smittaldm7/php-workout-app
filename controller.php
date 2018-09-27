<?php
session_start();
class controller
{
	public function getCombination()
	{
		
		$servername = "localhost";
		$username = "root";
		$password = "";

		try 
		{
			$conn = new PDO("mysql:host=$servername;dbname=test2", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		   // echo "Connected successfully"; 
			$stmt = $conn->prepare("select * from combination where id NOT IN (select combination_id from user_combination_completed where user_id=:id);"); 
			$stmt->bindParam(":id", $_SESSION["user"]["id"]);
			$stmt->execute();
			$remaining_combinations = $stmt->fetchAll();
			if($remaining_combinations==null)
			{
				$stmt = $conn->prepare("delete from user_combination_completed where user_id=:id");
				$stmt->bindParam(":id", $_SESSION["user"]["id"]);
				$stmt->execute();
				$stmt = $conn->prepare("select * from combination where id NOT IN (select combination_id from user_combination_completed where user_id=:id);"); 
				$stmt->bindParam(":id", $_SESSION["user"]["id"]);
				$stmt->execute();
				$remaining_combinations = $stmt->fetchAll();
				
			}
			else
			{
			}
			$selected_combination_id = rand(0,sizeof($remaining_combinations)-1);
			//echo $selected_combination_id ;
			//echo "<pre>";
			//print_r($remaining_combinations[$selected_combination_id]);
			
			//echo "id of combination generated".$remaining_combinations[$selected_combination_id]["id"]."\n";
			
			
			
			$stmt2 = $conn->prepare("select c.id, a1.area as area1text,a2.area as area2text,a3.area as area3text 
										from combination c 
										left join area a1 ON c.area1 = a1.id 
										left join area a2 ON c.area2 = a2.id 
										left join area a3 ON c.area3 = a3.id
										 where c.id =:id; 				
									"); 
			$stmt2->execute([':id' => $remaining_combinations[$selected_combination_id]["id"]]);
			$selected_combination = $stmt2->fetch();
			//echo "<pre>";
			//print_r($selected_combination);
			return array("id"=>$remaining_combinations[$selected_combination_id]["id"], "selected_combination"=>$selected_combination);
			
			}
		catch(PDOException $e)
			{
			echo "Connection failed: " . $e->getMessage();
			}
	}	
	
	public function combinationFinished()
	{
	$servername = "localhost";
	$username = "root";
	$password = "";

	try 
		{
		$conn = new PDO("mysql:host=$servername;dbname=test2", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   // echo "Connected successfully"; 
		$stmt = $conn->prepare("insert into user_combination_completed (user_id, combination_id) values (:id,:combination_id)"); 
		$stmt->bindParam(":id", $_SESSION["user"]["id"]);
		$stmt->bindParam(":combination_id", $_GET["combination_finished_id"]);
		$stmt->execute();;
		
		
		
		
		
		
		}
	catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
	}
	
	
	public function register()
	{
	$servername = "localhost";
	$username = "root";
	$password = "";

	try 
		{
		$conn = new PDO("mysql:host=$servername;dbname=test2", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   // echo "Connected successfully"; 
		$stmt = $conn->prepare("select * from user where email = :email"); 
		$stmt->bindParam( ":email", $_POST["email"]);
		$stmt->execute();
		$user = $stmt->fetch();
		
		//echo "<pre>";print_r($user);
		//echo $user["name"];
		
		
		$success=false;
		if ($user==null)
		{
			$stmt = $conn->prepare("insert into user (name, email, password) values (:name, :email, :password)"); 
			//$stmt = $conn->prepare("insert into user (name, email, password) values ('dd', 'dd', 'dd')"); 
			$stmt->bindParam( ":name", $name);
			$stmt->bindParam( ":email", $email);
			$stmt->bindParam( ":password", $password );
			
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = md5($_POST["password"]);
			
			$success = $stmt->execute();
			//echo $success;exit;
			
		}
		
		return $success;
		
		
		
		
		
		
		
		
		}
	catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
	}
	
	
	public function login()
	{
	$servername = "localhost";
	$username = "root";
	$password = "";

	try 
		{
		$conn = new PDO("mysql:host=$servername;dbname=test2", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   // echo "Connected successfully"; 
		$stmt = $conn->prepare("select * from user where email = :email"); 
		$stmt->bindParam( ":email", $_POST["email"]);
		$stmt->execute();
		$user = $stmt->fetch();
		$_SESSION["user"] = $user;
		return $user;
		
		
		
		
		
		
		
		
		}
	catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
	}
	
	
}
?>