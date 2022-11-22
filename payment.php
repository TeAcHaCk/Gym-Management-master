<!DOCTYPE html>
<?php include("func.php");
$sql = "select contact from doctorapp";
$result = mysqli_query($con,$sql,);

?>
<html>
<head>
	<title>Members details</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron" style="background: url('images/2.jpg') no-repeat;background-size: cover;height: 300px;"></div>	

 <div class="container">
<div class="card">
     <div class="card-body" style="background-color:#3498DB;color:#ffffff;">
         <div class="row">
             <div class="col-md-1">
    <a href="admin-panel.php" class="btn btn-light ">Go Back</a>
             </div>
             <div class="col-md-3"><h3>Payment Details</h3></div>
             <div class="col-md-8">
         <form class="form-group" action="patient_search.php" method="post">
          <div class="row">
              
                 </form></div></div></div>
     <div class="card-body" style="background-color:#3498DB;color:#ffffff;">
         <div class="card-body">
    <table class="table table-hover">
        <thead>
     <tr>
            <th>Payment ID </th>
            <th>Amount</th>
            <th>Payment Type</th>
            <th>Customer ID</th>
           <!-- <th>Customer Name</th>-->
         
        </tr>   
        </thead>
        
        <tbody>
          <?php get_payment(); ?>
        </tbody>
        <th>Total Amount</th><td><?php get_total_amount()?></td>
    </table>
    <div class="card-body" style="background-color:#3498DB;color:FFFFFF;">
    <form class="form-group" action="func.php" method="post">
    <label>Delete Payment</label>
    <input type="text" name="Payment_id" class="form-control"><br>
    <input type="submit" class="btn btn-primary" name="delete_payment" value="Delete">
        </form>
    <br><br>
    <br><br>
                <h3>Make new Payment</h3>
                </div> 
                <div class="card-body"></div>
                <form class="form-group" action="func.php" method="post">
                <label>Payment ID</label>
<input type="text" name="Payment_id" class="form-control"><br>
 
                    <label>Amount</label>
                    <select class="form-control" name="Amount"><br>
            <option value="800">800</option>
            <option value="1000">1000</option>
            <option value="1500">1500</option>
                    </select>
        <br>
                   <label>Customer ID</label>
                    <select class="form-control" name="customer_id">

<?php while($row2 = mysqli_fetch_array($result)):;?>

<option value="<?php echo $row2[0];?>"><?php echo $row2[0];?></option>

<?php endwhile;?>

</select>
<br>
                    <label>Payment Type</label>
        <select class="form-control" name="payment_type">

            <option value="Cash">Cash</option>
            <option value="UPI">UPI</option>
            <option value="IMPS">IMPS</option>
            <option value="Net Banking">Net Banking</option>
        </select>
        <br>
<input type="submit" class="btn btn-primary" name="pay_submit" value="PAY">
     </div>
    </div>
    </div>
    
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </div>
    </body>
</html>