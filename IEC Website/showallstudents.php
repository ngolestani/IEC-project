<?php
 include ('adminheader.html');
 ?>
 <div id="main">
 <?php
$sn="localhost";
$un="root";
$pass="";
$dn="iec";
//create new connection by using new mysqli()
//$conn= new mysqli("localhost","root","","animal_kingdom");
$myconnection=new mysqli($sn,$un,$pass,$dn);

//if(!$myconnection)
if ($myconnection ->connect_error)
{
    die("could not connect with server". $myconnection->connect_error);
}
//select * from animals where id = $_GET['2']

$q="select * from students";
//run the query using query function()
$res=$myconnection->query($q);
$recnumber = 0;
while($rec=mysqli_fetch_assoc($res))
{
    echo "Next";
	echo "<br/>";
    //echo "<div class='img_div_thumbs'>";
    echo "First Name: ";
    echo $rec['sFname'];
	echo "<br/>";
	echo "Surname: ";
    echo $rec['sSurname'];
    echo "<br/>";
	echo "Nationality: ";
	echo $rec['sNationality'];
	echo "<br/>";
	echo "Country of Residence: ";
    echo $rec['sCountryOFResidence'];
	echo "<br/>";
	echo "<br/>";
    
    
}
//$nr=mysqli_num_rows($res);
//echo "total records " . $nr;
//echo "<br/>";
   
    
    ?>
	</div>
<div id="main">
    <?php
    
    ?>
</div>
<?php
    include ('footer.html');
?>