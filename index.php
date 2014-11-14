<?php

// error_reporting(0);

header('Content-Type: application/json');

// 295ea6b44fca31cc
	class api_logger {

		protected $connection;
		private $superAdminKey = "!*f*lT2fKV7*Pl!5*S2U3WH&Tdkayo2nBxgjCKM7LN^Jh##bfIJsrloMFyvgTJyt";
		private $isSuperAdmin = false;

		protected $apiKey;
		protected $plan;
		protected $service;

		protected $isPost;

		protected $response = array();

		protected $debug = false;

		public function __construct() {

			$this->isPost = $_SERVER['REQUEST_METHOD'] === 'POST';

			$this->debug = $this->checkParamExists('debug');

			$this->msgLog("a message");

			//$this->connection=mysqli_connect("127.0.0.1","root","","api_logger_class");
			// Check connection
			// if (mysqli_connect_errno()) {
			// 	$this->error("connection to database failed");
			// }

			// $this->connection->close();

			//$this->response();

		}
		protected function getdata($articleID=null){
			$servername = "localhost";
			$username = "uchman_db";
			$password = "lastdon";
			$dbname = "uchman_db";
			$sql="";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			if ($articleID==null)
				$sql = "SELECT article_id,article_title,article_text,article_imagename FROM articles";
			else	
				$sql = "SELECT article_id,article_title,article_text,article_imagename FROM articles where article_id=" . $articleID;
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			    //output data of each row
			    while($row = $result->fetch_assoc()) {
			    	$this->response[]=$row;
			        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			    }
			    //$this->response=$result->fetch_assoc();
			} else {
			    echo "0 results:" ;
			}
			$conn->close();			
		}

		protected function error($errorMsg) {
			echo '{"error": "'.$errorMsg.'"}';
			die();
		}

		protected function msgLog($msg,$key=null) {
			if ($this->debug === true) {
				if ($key===null) {
					$key=$this->getTimestamp();
				}

				$logMsg = array($key=>$msg);

				if (isset($this->response["debug"])) {
					array_push($this->response["debug"], $logMsg);
				}
				else {
					$this->response["debug"]=array($logMsg);
				}
			}
		}

		private function getParam($param) {
			if ($this->checkParamExists($param)) {
				return $this->isPost ? $_POST[$param] : $_GET[$param];
			}
			else {
				return false;
			}
		}

		private function checkParamExists($param) {
			return $this->isPost ? isset($_POST[$param]) : isset($_GET[$param]);
		}

		private function getTimestamp() {
			$now = new DateTime("now");
			$now->setTimezone(new DateTimezone("America/Chicago"));
			return $now->format("Y-m-d H:i:s");
		}

		public function addResponse($key,$value) {
			$this->response[$key] = $value;
		}

		public function response() {
			echo json_encode($this->response);
		}
	}

	$apiLogger = new api_logger();	
	if (!isset($_POST) && !isset($_GET)){
		$apiLogger->response();
	}else{
		$todo=$apiLogger->getParam("todo");
		if ($todo=="articles"){
			$apiLogger->getdata();
			$apiLogger->response();
		}elseif($todo=="article"){
			$articleID=$apiLogger->getParam("articleID");
			$apiLogger->getdata($articleID);
			$apiLogger->response();
		}
	}
	


?>

