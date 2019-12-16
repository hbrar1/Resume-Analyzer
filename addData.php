<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();
$candidateemail=$_SESSION['email'];
	$degreename=$_SESSION['degreename'];
	$dateofadmission=$_SESSION['dateofadmission'];
	$dateofpassing=$_SESSION['dateofpassing'];
	$percentate=$_SESSION['percentate'];
	$division=$_SESSION['division'];
	$specialization=$_SESSION['specialization'];
	
$sql="INSERT INTO `candidateeducation`(`candidateemail`, `degreename`, `dateofadmission`, `dateofpassing`, `percentate`, `division`, `specialization`) VALUES ('$candidateemail','$degreename','$dateofadmission','$dateofpassing',' $percentate','$division','$specialization')";
 echo $sql;

if (!mysql_query($sql)) {
  echo "eror education";
}
else
{
}

	$candidateCertificate=$_SESSION['candidateCertificate'];
	$certificationdate=$_SESSION['certificationdate'];
	$certificationtitle=$_SESSION['certificationtitle'];
	$remarks=$_SESSION['remarks'];
 $sql="INSERT INTO `candidatecertification`( `candidateCertificate`,`candidateemail`, `certificationtitle`, `certificationdate`, `remarks`) VALUES ('$candidateCertificate','$candidateemail','$certificationtitle','$certificationdate',' $remarks')";
echo $sql;
if (!mysql_query($sql)) {
  echo "eror certificate";
}
else
{
}


	$candidateExprnce=$_SESSION['candidateExprnce'];
	$Employer=$_SESSION['Employer'];
	$emplocation=$_SESSION['emplocation'];
	$dos=$_SESSION['dos'];
	$Dsg=$_SESSION['Dsg'];
	$doe=$_SESSION['doe'];
 $sql="INSERT INTO `candidateexperience`( `candidateExprnce`,`candidateemail`, `employer`, `employerlocation`, `datestart`, `dateend`, `designation`) VALUES ('$candidateExprnce','$candidateemail','$Employer','$emplocation','$dos','$doe','$Dsg')";

if (!mysql_query($sql)) {
  echo "eror experiece";
}
else
{	
	
}
 
 $candidiateAch=$_SESSION['candidiateAch'];
	$achievementtitle=$_SESSION['achievementtitle'];
	$achivemnetdate=$_SESSION['achivemnetdate'];
	$canremarks=$_SESSION['canremarks'];
	
 
 
 
 $sql="INSERT INTO `candidateachievement`( `candidiateAch`, `candidateemail`,`achievementtitle`, `achivemnetdate`, `canremarks`) VALUES ('$candidiateAch','$candidateemail','$achievementtitle','$achivemnetdate','$canremarks')";
  echo $sql;
if (!mysql_query($sql)) {
  echo "eror achievementtitle";
}
else
{	
}
	
	
	$skilltitle=$_SESSION['skilltitle'];
	$level=$_SESSION['level'];
	$experience=$_SESSION['experience'];

 
$sql ="INSERT INTO `candidateskill`(`candidateemail`, `skilltitle`, `level`, `experience`) VALUES ('$candidateemail','$$skilltitle','$level','$experience')";
 
 echo $sql;
if (!mysql_query($sql)) {
  echo "eror skills";
}
else
{	
}






unset($_SESSION['Reg']); 

header('Location:candidate_panel.php');
?>