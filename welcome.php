<?php
include('emaildatabase.php');
if($_POST['act'] == 'sendEmail')
{
$email=$_POST['email'];
if ($email == "")

{
$status = array('status' => 0, 'message' => 'Enter valid email');
echo json_encode($status);
}

else
{

$query = mysql_query("INSERT into `gs_visitor`(`id`,`email`,`date`) values('','$email',CURDATE())");
if($query != 0)
 {

$status = array('status' => 1, 'message' => 'Thanks For contacting us!');
echo json_encode($status); 

 }

}


}

 



?>
