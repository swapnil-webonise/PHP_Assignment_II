<!--
	Program is for demonstration of serverside validation using PHP
-->
<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Serverside Validation Using PHP</title>
</head>
<style>
	.error
	{
		color:red;
	}
	.notification
	{
		color:red;
	}
	body
	{
		background-color:#F2F1F0;
	}
</style>
<?php
	if(isset($_POST['submit']))
	{
		echo '<b>Form Details</b> : <br />';

		if(!isset($_POST["txtFname"]) || trim($_POST["txtFname"])=="")
			echo "<br />First Name:<span class='error'> Please enter first name</span>";
		elseif(preg_match("/[^a-zA-Z]/",trim($_POST["txtFname"])))
			echo "<br />First Name:<span class='error'> Please enter valid first name</span>";		
		else
			echo "<br />First Name: ".$_POST["txtFname"];


		if(!isset($_POST["txtLname"]) || trim($_POST["txtLname"])=="")
			echo "<br />Last Name:<span class='error'> Please enter last name</span>";
		elseif(preg_match("/[^a-zA-Z]/",trim($_POST["txtLname"])))
			echo "<br />Last Name:<span class='error'> Please enter valid last name</span>";		
		else
			echo "<br />Last Name: ".$_POST["txtLname"];


		if(!isset($_POST["txtPassword"]) || trim($_POST["txtPassword"])=="")
			echo "<br />Password:<span class='error'> Please enter password</span>";
		else if(strlen(trim($_POST["txtPassword"]))<6 || strlen(trim($_POST["txtPassword"]))>10)
			echo "<br />Password:<span class='error'> Password length should be 6 to 10</span>";
		else if(!preg_match('/\d/',trim($_POST["txtPassword"])))
			echo "<br />Password:<span class='error'> Password should have atleast one digit</span>";
		else if(!preg_match('/[A-Z]/',trim($_POST["txtPassword"])))
			echo "<br />Password:<span class='error'> Password should have atleast one capital letter</span>";
		else if(!preg_match('/[a-z]/',trim($_POST["txtPassword"])))
			echo "<br />Password:<span class='error'> Password should have atleast one small letter</span>";
		else if(!preg_match('/[0-9]/',trim($_POST["txtPassword"])))
			echo "<br />Password:<span class='error'> Password should have atleast one number</span>";
		else if(!preg_match('/[\$\_\-\!\?]/',trim($_POST["txtPassword"])))
			echo "<br />Password:<span class='error'> Password should have atleast one special symbol</span>";
		else
			echo "<br />Password: ".$_POST["txtPassword"];


		if(!isset($_POST["txtAddrs"]) || trim($_POST["txtAddrs"])=="")
			echo "<br />Address:<span class='error'> Please enter address</span>";
		elseif(preg_match("/[^a-zA-Z0-9\s\-\'\.\,\:]/",trim($_POST["txtAddrs"])))
			echo "<br />Address:<span class='error'> Please enter valid address</span>";
		else
			echo "<br />Address: ".$_POST["txtAddrs"]; 


		if(!isset($_POST["txtEmailId"]) || trim($_POST["txtEmailId"])=="")
			echo "<br />Email Id:<span class='error'> Please enter EmailId</span>";
		else if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/',trim($_POST["txtEmailId"])))
			echo "<br />Email Id:<span class='error'> Please enter valid EmailId</span>";
		else
			echo "<br />Email Id: ".$_POST["txtEmailId"];


		if(!isset($_POST["comboCountry"]) || trim($_POST["comboCountry"])=="Select")
			echo "<br />Country:<span class='error'> Please select country</span>";
		else 
			echo "<br />Country: ".$_POST["comboCountry"];


		if(!isset($_POST["txtZipCode"]) || trim($_POST["txtZipCode"])=="")
			echo "<br />Zip code:<span class='error'> Please enter zip code</span>";
		elseif(preg_match("/[^0-9]/",trim($_POST["txtZipCode"])) || strlen(trim($_POST["txtZipCode"]))!=6)
			echo "<br />Zip code:<span class='error'> Please enter valid zip code</span>";
		else
			echo "<br />Zip code: ".$_POST["txtZipCode"];


		if(!isset($_POST["gender"]) || trim($_POST["gender"])=="")
			echo "<br />Gender:<span class='error'> Please select gender</span>";
		else
			echo "<br />Gender: ".$_POST["gender"];

		$h=$_POST['chkHobbies'];
		$n = count($h);
		echo "<br />Hobbies: ";		
		for($i=0; $i < $n; $i++)
		{
			echo $h[$i];
			if($i==$n-1)
				echo ".";
			else
				echo ",";
		}

		$urlChkHobbies='';
		for($i=0; $i < $n; $i++)
		{
			$urlChkHobbies.='&chkHobbies[]='.$h[$i];
		}

        foreach ($_POST as $key => &$value) {
			$value = urlencode($value);			
        }   

		$url='http://'.$_SERVER['SERVER_NAME'].'/Serverside_validation/serverside_validation.php?txtFname='.$_POST["txtFname"].'&txtLname='.$_POST["txtLname"].'&txtPassword='.$_POST["txtPassword"].'&txtAddrs='.$_POST["txtAddrs"].'&txtEmailId='.$_POST["txtEmailId"].'&comboCountry='.$_POST["comboCountry"].'&txtZipCode='.$_POST["txtZipCode"].'&gender='.$_POST["gender"].$urlChkHobbies;

		echo '<br /><br />For form details corrections:<a href="'.$url.'" title="Edit Form Details">Edit</a>';
	}
	else 
	{
		$abc=$_GET['chkHobbies'];

		foreach ($_GET as $key => &$val) {
			$val = urldecode($val);			
    	}   
		$countries=array("India","United kingdom","United State");
		$hobbies=array("Playing game","Internet Surfing","Reading","Watching Movies");

		include 'view.php';
	}
?>
</html>
