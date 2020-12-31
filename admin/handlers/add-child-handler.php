<?php
$connect = mysqli_connect("localhost", "root", "", "test");

$name = mysqli_real_escape_string($connect, $_POST["inputName"]);
$id = mysqli_real_escape_string($connect, $_POST["inputID"]);
$sex = $_POST["inputSex"];
$nic = mysqli_real_escape_string($connect, $_POST["inputNIC"]);
$tp = mysqli_real_escape_string($connect, $_POST["inputTP"]);
$email = mysqli_real_escape_string($connect, $_POST["inputEmail"]);
$residence = $_POST["inputResidence"];
$add1 = mysqli_real_escape_string($connect, $_POST["inputAddress1"]);
$add2 = mysqli_real_escape_string($connect, $_POST["inputAddress2"]);
$add3 = mysqli_real_escape_string($connect, $_POST["inputAddress3"]);
$job = mysqli_real_escape_string($connect, $_POST["inputJob"]);
$income = mysqli_real_escape_string($connect, $_POST["inputIncome"]);
$unmarried = mysqli_real_escape_string($connect, $_POST["inputUnmarriedChildren"]);
$unmarriedMale = mysqli_real_escape_string($connect, $_POST["inputUnmarriedMaleChildren"]);

$sqltest = "INSERT INTO test2(name,memID,sex,nic,tp,email,residence,add1,add2,add3,job,income,unmarried,unmarriedMale) VALUES('$name',$id,'$sex','$nic','$tp','$email','$residence','$add1','$add2','$add3','$job',$income,$unmarried,$unmarriedMale)";
mysqli_query($connect, $sqltest);

$number = count($_POST["inputChildName"]);
if($number >= 1)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["inputChildName"][$i] != ''))
		{
			$sql = "INSERT INTO test(name,new) VALUES('".mysqli_real_escape_string($connect, $_POST["inputChildName"][$i])."','".mysqli_real_escape_string($connect, $_POST["inputChildNIC"][$i])."')";
			mysqli_query($connect, $sql);
		}
	}
	echo "Data Inserted";
}
else
{
	echo "Please Enter Name";
}