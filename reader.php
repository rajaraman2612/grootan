<?php
$csv='C:\xampp\htdocs\grootan\uploads\details.csv';
$fh =fopen($csv,'r');
$read=(fgetcsv($fh));
$msg="";

foreach($read as $value){
$msg=$msg.$value." VARCHAR(50),";

}
$j=1;
//printf(hash('ripemd160','random'));

$msg=substr_replace($msg,"",-1);
//printf($msg);
$conn =new mysqli('localhost','root','','project');
if($conn->connect_error){
	die('CONNECTION FAILED: '.$conn->connect_error);
}
else{
	$stmt =$conn->prepare("create table random$j($msg)");
		$stmt->execute();
	//echo "uploaded sucessfully";
	$stmt->close();
	$conn->close();
	$j=$j+1;
}


$i=0;

while(list($firstname ,$lastname,$email)=fgetcsv($fh,1024,',')){
	//printf("<p>%s,%s,%s<p>",$firstname,$lastname,$email);
	//$firstname=$_POST['firstname'];
		//$lastname=$_POST['lastname'];
//		$email   =$_POST['email'];
if($i!=0){


		//DATABASE CONNECTION
		$conn =new mysqli('localhost','root','','project');
		if($conn->connect_error){
			die('CONNECTION FAILED: '.$conn->connect_error);
		}
		else{
			$stmt =$conn->prepare("insert into csv(firstname,lastname,email)values(?,?,?)");
			$stmt->bind_param("sss",$firstname,$lastname,$email);
			$stmt->execute();
			echo "uploaded sucessfully,<br>";
			$stmt->close();
			$conn->close();
		}
	}
	else{


	}
	$i=$i+1;


}



?>
