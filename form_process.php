<?php 
if(!isset($_POST['firstname'])){header("location: index.php");}
// Change the Merchant key here as provided by Payumoney
$MERCHANT_KEY = "xxxxxxx";

// Change the Merchant Salt as provided by Payumoney
$SALT = "xxxxxxx";


	$firstname =$_POST['firstname'];
	$email =$_POST['email'];
	$phone =$_POST['phone'];
	$productinfo =$_POST['productinfo'];
	$service_provider =$_POST['service_provider'];
	$amount =$_POST['amount'];
	$txnid =$_POST['txnid'];
	$productinfo =$_POST['productinfo'];
	$surl =$_POST['surl'];
	$furl =$_POST['furl'];
	$udf1 =$_POST['udf1'];
	$udf2 =$_POST['udf2'];
	//$ =$_POST[''];

	$hashseq=$MERCHANT_KEY.'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.$udf1.'|'.$udf2.'|||||||||'.$SALT;
	$hash =strtolower(hash("sha512", $hashseq)); 
	

?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<title>Payment Processing</title>
	<script>
    function submitForm() {
      var postForm = document.forms.postForm;
      postForm.submit();
    }
</script>
</head>
<center>
<body onload="submitForm();">

<div>
<h2>Payment Gateway</h2>
<table>
<tr><td>Transaction Id</td><td><strong><?php echo $_POST['txnid']; ?></strong></td><td>Amount: </td><td><strong>Rs. <?php echo $_POST['amount']; ?></strong></td>
</table>
<div>
<p>Please be patient. We are processing your payment options, This might take some time,<br /></p>
<br>
<p>please do not hit refresh or browser back button or close this window</p>
</div>
</div>
<a href="https://www.vrhostingindia.com/wallet_integration.aspx" target="_blank"><u><b>Powered by VRHostingindia Payment Gateway Services</b></u></a>
</center>
<div>
	<form name="postForm" action="https://secure.payu.in/_payment" method="POST" >
		<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
		<input type="hidden" name="hash" value="<?php echo $hash;  ?>"/>
		<input type="hidden" name="txnid" value="<?php echo $_POST['txnid'];  ?>" />
		<input type="hidden" name="amount" value="<?php echo $_POST['amount'];  ?>" />
		<input type="hidden" name="firstname" value="<?php echo $_POST['firstname'];  ?>" />
		<input type="hidden" name="email" value="<?php echo $_POST['email'];  ?>" />
		<input type="hidden" name="phone" value="<?php echo $_POST['phone'];  ?>" />
		<input type="hidden" name="productinfo" value="<?php echo $_POST['productinfo'];  ?>" />
		<input type="hidden" name="service_provider" value="payu_paisa" size="64" />
		<input type="hidden" name="surl" value="<?php echo $_POST['surl'];  ?>" />
		<input type="hidden" name="furl" value="<?php echo $_POST['furl'];  ?>" />
		<input type="hidden" name="udf1" value="<?php echo $_POST['udf1'];  ?>" />
		<input type="hidden" name="udf2" value="<?php echo $_POST['udf2'];  ?>" />
	</form>
</div>

</body>
</html>