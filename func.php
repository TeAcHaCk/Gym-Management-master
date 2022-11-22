<?php
$con=mysqli_connect("localhost","root","","loginsystem");
if(isset($_POST['login_submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from logintb where username='$username' and password='$password'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
        if ($username =='admin' && $password=='pass')
        {
        header("Location:admin-panel.php");
    }
}
	else
    {
        echo "<script>alert('error login')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    }
if(isset($_POST['pat_submit']))
{
  if(!empty($_POST['fname']&&['lname']&&['email']&&['contact']))
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $docapp=$_POST['docapp'];
    $query="insert into doctorapp(fname,lname,email,contact,docapp)values('$fname','$lname','$email','$contact','$docapp')";
     $result=mysqli_query($con,$query);
    if($result)
    {
      echo "<script>alert('Member added.')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
  }
  else{
          echo "<script>alert('Empty Field.')</script>";
          echo "<script>window.open('admin-panel.php','_self')</script>";
        }
    } 
    if(isset($_POST['tra_submit']))
    {
      if(!empty($_POST['Trainer_id']&&['Name']&&['phone']))
      {
        $Trainer_id=$_POST['Trainer_id'];
        $Name=$_POST['Name'];
        $phone=$_POST['phone'];
        $query="insert into Trainer(Trainer_id,Name,phone)values('$Trainer_id','$Name','$phone')";
         $result=mysqli_query($con,$query);
        if($result)
        {
          echo "<script>alert('Trainer added.')</script>";
            echo "<script>window.open('admin-panel.php','_self')</script>";
        }
        }
      else{
            echo "<script>alert('Empty Field.')</script>";
             echo "<script>window.open('trainer_add.php','_self')</script>";
          }
      }

        if(isset($_POST['pay_submit']))
        {
          if(!empty($_POST['Payment_id']&&['Amount']&&['customer_id']&&['payment_type'])){
            $Payment_id=$_POST['Payment_id'];
            $Amount=$_POST['Amount'];
            $customer_id=$_POST['customer_id'];
            $payment_type=$_POST['payment_type'];
            $query="insert into Payment(Payment_id,Amount,customer_id,payment_type)values('$Payment_id','$Amount','$customer_id','$payment_type')";
             $result=mysqli_query($con,$query);
            if($result)
            {
              echo "<script>alert('Payment sucessfull.')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
            }
            else{
              echo "<script>alert('Empty Field.')</script>";
              echo "<script>window.open('payment.php','_self')</script>";
            }
          }
        if(isset($_POST['delete_payment']))
        {
          if(!empty($_POST['Payment_id'])){
            $Payment_id=$_POST['Payment_id'];
            $query="delete from payment where Payment.Payment_id='$Payment_id'";
             $result=mysqli_query($con,$query);
            if($result)
            {
              echo "<script>alert('Payment Detail deleted.')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
          }
          else{
            echo "<script>alert('Empty Field.')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
          }
        }
        
            
        if(isset($_POST['delete_trainer']))
        {
          if(!empty($_POST['Trainer_id'])){
            $Trainer_id=$_POST['Trainer_id'];
            $query="delete from trainer where trainer.Trainer_id='$Trainer_id'";
             $result=mysqli_query($con,$query);
            if($result)
            {
              echo "<script>alert('Trainer Deleted.')</script>";
                echo "<script>window.open('trainer.php','_self')</script>";
            }
          }
          else
            {
              echo "<script>alert('Empty Field.')</script>";
                echo "<script>window.open('trainer.php','_self')</script>";
            }
          }
        if(isset($_POST['delete_members']))
        {
          if(!empty($_POST['email'])){
            $email=$_POST['email'];
            $query="delete from doctorapp where doctorapp.email='$email'";
             $result=mysqli_query($con,$query);
            if($result)
            {
              echo "<script>alert('Member Deleted.')</script>";
                echo "<script>window.open('trainer_details.php','_self')</script>";
            }
            }
            else{
              echo "<script>alert('Empty Field.')</script>";
              echo "<script>window.open('trainer_details.php','_self')</script>";
            }
          }
        if(isset($_POST['update_members']))
        {
          if(!empty($_POST['fname']&&['lname']&&['contact'])){
          $fname=$_POST['fname'];
          $lname=$_POST['lname'];
          $contact=$_POST['contact'];
          $query="CALL update_member('$contact','$fname','$lname')";
           $result=mysqli_query($con,$query);
          if($result)
             {
               echo "<script>alert('Member Update.')</script>";
               echo "<script>window.open('member_update.php','_self')</script>";
             }
          else{
            echo "<script>alert('Wrong input.')</script>";
               echo "<script>window.open('member_update.php','_self')</script>";
             }
        }
        else{
          echo "<script>alert('Empty Field.')</script>";
          echo "<script>window.open('member_update.php','_self')</script>";
        }
      }
 
        
 function get_patient_details(){
    global $con;
    $query="select * from doctorapp";
    $result=mysqli_query($con,$query);
    while ($row=mysqli_fetch_array($result)){
    $fname=$row ['fname'];
    $lname=$row['lname'];
    $email=$row['email'];
    $contact=$row['contact'];
    $docapp=$row['docapp'];
      echo "<tr>
          <td>$fname</td>
        <td>$lname</td>
            <td>$email</td>
            <td>$contact</td>
          <td>$docapp</td>
        </tr>";
    }
}
function get_package(){
    global $con;
    $query="select * from Package";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $Package_id=$row ['Package_id'];
        $Package_name=$row['Package_name'];
        $Amount=$row['Amount'];
        echo"<tr>
        <td>$Package_id</td>
        <td>$Package_name</td>
            <td>$Amount</td>
            
        </tr>";

    }
}
function get_trainer(){
    global $con;
    $query="select * from Trainer";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $Trainer_id=$row ['Trainer_id'];
        $Name=$row['Name'];
        $phone=$row['phone'];
        echo"<tr>
        <td>$Trainer_id</td>
        <td>$Name</td>
            <td>$phone</td>
            
        </tr>";

    }
}
function get_payment(){
    global $con;
    $query="select * from Payment";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $Payment_id=$row ['Payment_id'];
        $Amount=$row['Amount'];
        $payment_type=$row['payment_type'];
        $customer_id=$row['customer_id'];
        // $customer_name=$row['customer_name'];
        
        echo"<tr>
        <td>$Payment_id</td>
        <td>$Amount</td>
        <td>$payment_type</td>
        <td>$customer_id</td>
        </tr>";

    }
}

function get_payment_history(){
    global $con;
    $query="select * from payment_history";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $payment_id=$row ['payment_id'];
        $amount=$row['amount'];
        $payment_type=$row['payment_type'];
        $customer_id=$row['customer_id'];
        // $customer_name=$row['customer_name'];
        
        echo"<tr>
        <td>$payment_id</td>
        <td>$amount</td>
        <td>$payment_type</td>
        <td>$customer_id</td>
        </tr>";

    }
}
function get_payment_done(){
  global $con;
  $query="select d.fname,d.lname,d.contact,p.payment_id,p.amount,p.customer_id,p.payment_type from doctorapp as d join payment as p on d.contact=p.customer_id";
  $result=mysqli_query($con,$query);
  while($row=mysqli_fetch_array($result)){
      $fname=$row['fname'];
      $lname=$row['lname'];
      $contact=$row['contact'];
      $payment_id=$row ['payment_id'];
      $amount=$row['amount'];
      $customer_id=$row['customer_id'];
      $payment_type=$row['payment_type'];
      // $customer_name=$row['customer_name'];
      
      echo"<tr>
      <td>$fname</td>
      <td>$lname</td>
      <td>$contact</td>
      <td>$payment_id</td>
      <td>$amount</td>
      <td>$customer_id</td>
      <td>$payment_type</td>
      </tr>";

  }
}

?>



