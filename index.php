<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css?20150427">
<?php
include '/home/ahmed.elsayed/public_html/configuration/config.php';
?>
</head>

<body>
<div class="helper_tools" >
<h2>Helper Sites</h2>
<ul>
<li><a href="http://www.integral-calculator.com/" target="_blank">Online Integration Calculator</a></li>
<li><a href="http://www.derivative-calculator.net/" target="_blank">Online Derivative Calculator</a></li>
<li><a href="http://www.wolframalpha.com/widgets/view.jsp?id=f9476968629e1163bd4a3ba839d60925" target="_blank">Online Taylor Series Calculator</a></li>
</ul>
</div>
<form action="submit_sheets/upload.php" method="post" enctype="multipart/form-data">
<div>
<h1><?php echo $header ?></h1>
<label>
<span>StudentID </span><input class="block" type="text" name="StudentID" id ="StudentID"  required>
</label>
<br>
<label>
<span>StudentName </span><input class="block" type="text" name="StudentName" id ="StudentName" required>
</label>
<br>
<label>
<span>fileToUpload</span><input class="block" type="file" name="fileToUpload" id="fileToUpload">
<input class="buttonClass" type="submit" value="Submit" name="submit" />
</label>

</div>
</form>
</body>
</html>
