<?php

@$a1=$_POST['a1'];
@$a2=$_POST['a2'];
@$a3=$_POST['a3'];
@$a4=$_POST['a4'];
@$a5=$_POST['a5'];
@$a6=$_POST['a6'];
@$a7=$_POST['a7'];
@$a8=$_POST['a8'];
@$a9=$_POST['a9'];
@$a10=$_POST['a10'];
@$user=$_POST['user'];

//echo "a1=".$a1;



$a=$a1.",".$a2.",".$a3.",".$a4.",".$a5.",".$a6.",".$a7.",".$a8.",".$a9.",".$a10;
$ans=  explode(',', $a);

//echo $a;
include 'dbconnect.php';
//check
$sql=mysql_query("select * from test where sem=2");
$ch=  mysql_fetch_assoc($sql);
$check=  explode(',',$ch['check']);

//answers describe
$des=mysql_query("select * from test where sem=2");
$des2=  mysql_fetch_assoc($des);
$desc=  explode(',',$des2['ans']);

$diff=0;
$answered=0;
$temp="";

for($i=0;$i<10;$i++)
{   
    if(isset($ans[$i])&&!empty($ans[$i]))
        $answered++;
    if($ans[$i]==$check[$i])
        $diff++;
}
$sq= mysql_query("select question from test where sem=2");
$sq2= mysql_fetch_row($sq);
$ques=  explode(",", $sq2[0]);
$final="";
for($i=0;$i<10;$i)
{
   
          $j=$i+1;
          $final.=$ques[$i]."<br></br>".$desc[$i]."<br></br>";
        //  echo $j.".".$ques[$i]."<br></br>"."<input type=\"radio\" id=".$i." name=".$i." value=".$a." >".$a."<br></br>"."<input type=\"radio\" name=".$i." id=".$i." value=".$b." >".$b."<br></br>"."<input type=\"radio\" name=".$i." id=".$i." value=".$c." >".$c."<br></br>"."<input type=\"radio\" name=".$i." id=".$i." value=".$d." >".$d."<br></br>";
          $i=$i+1;          
}  
    
echo "No of questions answered-".$answered."<br></br>"."No of questions correct-".$diff."<br></br>.$final";


//echo $diff;


?>
