<html>
<body>
<?php
include '/home/ahmed.elsayed/public_html/configuration/config.php';
$uploadOk   = 1;

$Student_Id = $_POST['StudentID'];
if (!ctype_digit($Student_Id)) {
    exit("<h2>Your id should be in numbers only</h2><br>");
}
if (strlen($Student_Id) != 4) {
    exit("<h2>Your id should be 4 characters long</h2><br>");
}
$Student_Name = trim($_POST['StudentName']);
if (!preg_match('/^[a-zA-Z\s]{1,}$/', $Student_Name)) {
    exit("<h2>Your Name should be english letters</h2><br>");
}
if (strlen($Student_Name) > 60) {
    exit("<h2>Your name shouldn't be more than 60 characters long</h2><br>");
}
$file_name   = basename($_FILES["fileToUpload"]["name"]);
if($_POST['sheet_number']=='3'){
$target_dir  = $sheet3_folder . $Student_Id . "/";
}else if($_POST['sheet_number']=='4'){
$target_dir  = $sheet4_folder . $Student_Id . "/";
}else if($_POST['sheet_number']=='5'){
$target_dir  = $sheet5_folder . $Student_Id . "/";
}
$target_file = $target_dir . $file_name;
$pdfFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if ($pdfFileType != "pdf") {
    exit("<h2>Sorry, PDF files are allowed.</h2><br>");
}
if (file_exists($target_file)) {
    exit("<h2>Sorry, file already exists. Change your file name</h2><br>");
}
if (!file_exists($target_dir)) {
    mkdir($target_dir);
	chmod($target_dir,0777);
}
if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
        if ($conn->connect_error) {
		   
            //die("<h2>Error While submission...Check your connection</h2><br>");
			die($conn->connect_error);
        }
		if($_POST['sheet_number']=='3'){
			$sql = "INSERT INTO Students (Student_Id ,Name ,Sheet3_Delivery ,Sheet4_Delivery  ,Sheet5_Delivery ,File_Name)
					VALUES ($Student_Id, '$Student_Name', 5,0,0,'$file_name')";
		}else if($_POST['sheet_number']=='4'){
			$sql = "INSERT INTO Students (Student_Id ,Name ,Sheet3_Delivery ,Sheet4_Delivery  ,Sheet5_Delivery ,File_Name)
					VALUES ($Student_Id, '$Student_Name', 0,5,0,'$file_name')";
		}else if($_POST['sheet_number']=='5'){
			$sql = "INSERT INTO Students (Student_Id ,Name ,Sheet3_Delivery ,Sheet4_Delivery  ,Sheet5_Delivery ,File_Name)
					VALUES ($Student_Id, '$Student_Name', 0,0,1,'$file_name')";
		}
        if ($conn->query($sql) === TRUE) {
            echo "<h2>Successful Submit ...</h2>";
        }
        $conn->close();
    } else {
        echo ("<h2>Error While submission...Check your connection</h2><br>");
    }
}
?>
</body>
</html>
