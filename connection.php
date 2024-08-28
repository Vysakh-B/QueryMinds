<?php
$host = "localhost";
$usr = "root";
$pass = "";
$db = "doubt";
$con = mysqli_connect($host,$usr,$pass,$db);
if(!$con)
{
echo "connection failed";
}
else
    //echo "connected succesfully";

?>