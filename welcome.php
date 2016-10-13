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
  require('class.phpmailer.php');
  $mail = new PHPMailer();
  $to="anirudh@darkhorsesports.in";
  $from="info@darkhorsesports.in";
  $from_name="darkhorsesports";
  $subject="EmailContact from GetSporty ";
  $body="You have received an email contact from $email ";
  global $error;
  $mail = new PHPMailer();  // create a new object
  $mail->IsSMTP(); // enable SMTP
  $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true;  // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
  $mail->Host = 'smtp.darkhorsesports.in';
  $mail->Port = 465; 
  $mail->Username = "info@darkhorsesports.in"; 
  $mail->Password = "2016Darkhorse";            
  $mail->SetFrom($from, $from_name);
  $mail->Subject = $subject;
  $mail->Body = $body;
  $mail->AddAddress($to);
        if(!$mail->Send()) 
        {
        $error = 'Mail error: '.$mail->ErrorInfo; 
        return false;
        } 
        else 
        {
        $to=$email;
        
        $from="info@darkhorsesports.in";
        $from_name="darkhorsesports";
        $subject="Hi";
        $message="Thanks for showing interest in us. We'll intimate you once our App is Live"; 
        $mail->SetFrom($from, $from_name);
        $mail->Subject =$subject;
        $mail->Body = $message;
        
       // $mail->AddAddress($to);

        $mail->Send();
      }
}
}
?>
