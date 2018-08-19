<!DOCTYPE html>
<html>
<head>
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
</head>
<body>
<center>
	<div>
		<h2>Payment Success</h2>
	</div>

	<div>
		<?php 
		session_start();
			if(isset($_POST['status'])){
				if($_POST['status']=="success"){
					/*echo "<p>Payment Done Successfully.<br>Details Are Below.</p>";
					echo "<p>Txn Id: ".$_POST['txnid']."</p>";
					echo "<p>Name: ".$_POST['firstname']."</p>";
					echo "<p>Email: ".$_POST['email']."</p>";
					echo "<p>Amount: ".$_POST['amount']."</p>";
					echo "<p>Phone No: ".$_POST['phone']."</p>";
					echo "<p>Product Info: ".$_POST['productinfo']."</p>";
					echo "<p>encryptedPaymentId: ".$_POST['encryptedPaymentId']."</p>";
					echo "<p>1: ".$_POST['udf1']."</p>";
					echo "<p>2: ".$_POST['udf2']."</p>";*/
					
				}
			}
			$redirectUrl = $_POST['udf2'];
			$transId=$_POST['txnid'];
			$status="Y";
			$_SESSION['status']= $status;
			$sellingCurrencyAmount=$_POST['amount'];
			$accountingCurrencyAmount=$_POST['udf1'];
			?>
			
			<form action="postpayment.php" method="POST" >
			
			<input type="submit" value="Click here to Continue"><BR>
			<input type="hidden" name="transId" value="<?php echo $transId;?>">
		    <!--<input type="hidden" name="status" value="<?php echo $status;?>">-->
			<input type="hidden" name="redirectUrl" value="<?php echo $redirectUrl;?>">
		    <input type="hidden" name="sellingCurrencyAmount" value="<?php echo $sellingCurrencyAmount;?>">
			<input type="hidden" name="accountingCurrencyAmount" value="<?php echo $accountingCurrencyAmount;?>">
						<!--<input type="submit"/> -->
			
			</form>
			
			
	</div>
	<br/><br/>
	<a href="https://www.vrhostingindia.com/wallet_integration.aspx" target="_blank"><u><b>Powered by VRHostingindia Payment Gateway Services</b></u></a>
	</center>
</body>
</html>