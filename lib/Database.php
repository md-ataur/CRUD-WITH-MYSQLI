<?php
class Database{
	private $dbhost  = DB_HOST;
	private $dbuser  = DB_USER;
	private $dbpass  = DB_PASS;
	private $dbname  = DB_NAME;

	public $link;
	public $error;

	public function __construct(){
		$this->connect();
	}

	/* Database connection */
	private function connect(){
		$this->link = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
		if($this->link == false){
			$this->error = "Your Database connection failed!".$this->link->connect_error;
			return false;
		} 	
	}


	/* Data select or read */
	public function read($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else{
			return false;
		}
	}

	/* Data inert into the database*/
	public function insert($data){
		$name 		= $data['name'];
		$username 	= $data['username'];
		$email 		= $data['email'];
		$skill		= $data['skill'];

		if ($name == "" || $username == "" || $email == "" || $skill == "")  {
			$this->error = "<p style='color:red;'> Field must not be empty !</p>";
		}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->error = "<p style='color:red;'> The email address is not valid !</p>";
		}else{
			$query = "INSERT INTO tbl_data(name, username, email, skill) VALUES ('$name', '$username', '$email', '$skill')";
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if($result){
				header("Location:index.php?msg=".urldecode("Data inserted Successfully"));
				exit();
			}else{
				$this->error = "<p style='color:red;'> Data not inserted !</p>";
			}
		}
	}

	/* Data update */
	public function update($id, $data){
		$name 		= $data['name'];
		$username 	= $data['username'];
		$email 		= $data['email'];
		$skill		= $data['skill'];

		if ($name == "" || $username == "" || $email == "" || $skill == "")  {
			$this->error = "<p style='color:red;'> Field must not be empty !</p>";
		}else{
			$query = "UPDATE tbl_data SET name = '$name', username = '$username', email = '$email', skill = '$skill' WHERE id = $id";
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if($result){
				header("Location:index.php");
			} else{
				return false;
			}
		} 
		
	}


	/* Data delete */
	public function delete($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__); 
		if($result){
			header("Location:index.php?msg=".urlencode("Successfully Data Deleted !"));
		} else{
			return false;
		}
	}




}

?>