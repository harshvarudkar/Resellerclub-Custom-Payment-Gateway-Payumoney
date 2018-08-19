 <?php
	session_start();
	require("functions.php");	//file which has required functions
?>			
<html>
<head><title>Payment Page </title>
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<script language="JavaScript">
        function successClicked()
        {
            document.paymentpage.submit();
        }
        function failClicked()
        {
            document.paymentpage.status.value = "N";
            document.paymentpage.submit();
        }
        function pendingClicked()
        {
            document.paymentpage.status.value = "P";
            document.paymentpage.submit();
        }
</script>
</head>
<body bgcolor="white">
<center>
<?php
		session_start();
		$key = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"; //replace ur 32 bit secure key , Get your secure key from your Reseller Control panel
		
		//This filter removes data that is potentially harmful for your application. It is used to strip tags and remove or encode unwanted characters.
		$_GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
		
		//Below are the  parameters which will be passed from foundation as http GET request
		$paymentTypeId = $_GET["paymenttypeid"];  //payment type id
		$transId = $_GET["transid"];			   //This refers to a unique transaction ID which we generate for each transaction
		$userId = $_GET["userid"];               //userid of the user who is trying to make the payment
		$userType = $_GET["usertype"];  		   //This refers to the type of user perofrming this transaction. The possible values are "Customer" or "Reseller"
		$transactionType = $_GET["transactiontype"];  //Type of transaction (ResellerAddFund/CustomerAddFund/ResellerPayment/CustomerPayment)

		$invoiceIds = $_GET["invoiceids"];		   //comma separated Invoice Ids, This will have a value only if the transactiontype is "ResellerPayment" or "CustomerPayment"
		$debitNoteIds = $_GET["debitnoteids"];	   //comma separated DebitNotes Ids, This will have a value only if the transactiontype is "ResellerPayment" or "CustomerPayment"

		$description = $_GET["description"];
		
		$sellingCurrencyAmount = $_GET["sellingcurrencyamount"]; //This refers to the amount of transaction in your Selling Currency
        $accountingCurrencyAmount = $_GET["accountingcurrencyamount"]; //This refers to the amount of transaction in your Accounting Currency

		$redirectUrl = $_GET["redirecturl"];  //This is the URL on our server, to which you need to send the user once you have finished charging him

						
		$checksum = $_GET["checksum"];	 //checksum for validation

		 //echo "File paymentpage.php<br>";
         echo "Secure Connection Verified..............";

		if(verifyChecksum($paymentTypeId, $transId, $userId, $userType, $transactionType, $invoiceIds, $debitNoteIds, $description, $sellingCurrencyAmount, $accountingCurrencyAmount, $key, $checksum))
		{
			//YOUR CODE GOES HERE
//$purpose = $userId;
//$price = $sellingCurrencyAmount;
/*$name = $userType;
$phone = $phone;
$email = $emailAddr;
$redirect_url=$redirectUrl;*/

			

		/** 
		* since all these data has to be passed back to foundation after making the payment you need to save these data
		*	
		* You can make a database entry with all the required details which has been passed from foundation.  
		*
		*							OR
		*	
		* keep the data to the session which will be available in postpayment.php as we have done here.
		*
		* It is recommended that you make database entry.
		**/

			
			
			
			/*$_SESSION['userType']=$userType;
			$_SESSION['price']=$price;
			$_SESSION['userId']=$userId;
			$_SESSION['redirecturl']=$redirectUrl;
			$_SESSION['transid']=$transId;
			$_SESSION['accountingCurencyAmount']=$accountingCurrencyAmount;
			$_SESSION['sellingCurrencyAmount']=$sellingCurrencyAmount;*/

			
         /* echo "Verified<br>";
            echo "List of Variables Received as follows<br>";
            echo "Paymenttypeid : ".$paymentTypeId."<br>";
            echo "transid : ".$transId."<br>";
            echo "userid : ".$userId."<br>";
            echo "usertype : ".$userType."<br>";
            echo "transactiontype : ".$transactionType."<br>";
            echo "invoiceids : ".$invoiceIds."<br>";
            echo "debitnoteids : ".$debitNoteIds."<br>";
            echo "description : ".$description."<br>";
            echo "sellingcurrencyamount : ".$sellingCurrencyAmount."<br>";
            echo "accountingcurrencyamount : ".$accountingCurrencyAmount."<br>";
            echo "redirecturl : ".$redirectUrl."<br>";
            echo "checksum : ".$checksum."<br><br>";*/
?>

<form method="post" action="form_process.php">
<table>

	<tr><td>Email</td><td><input type="text" name="email" placeholder="Enter Email" value="<?php echo $emailAddr;?>" /></td></tr>
	<tr><td>Contact No.</td><td><input type="text" name="phone" placeholder="Enter Contact No." value="<?php echo $telNo;?>" /></td></tr>
	<tr><td><br/></td><td><br/><input type="submit" /></td></tr>
	<tr><td></td><td><input type="hidden" name="txnid" value="<?php echo $transId;?>" /></td></tr>
	<tr><td></td><td><input type="hidden" name="amount" value="<?php echo $sellingCurrencyAmount;?>" /></td></tr>
	<tr><td></td><td><input type="hidden" name="udf1" value="<?php echo $accountingCurrencyAmount;?>" /></td></tr>
	<tr><td></td><td><input type="hidden" name="udf2" value="<?php echo $redirectUrl;?>" /></td></tr>
	<tr><td></td><td><input type="hidden" name="firstname" value="<?php echo $userId;?>" /></td></tr>
	
	<tr><td></td><td><input type="hidden" name="productinfo" value="<?php echo $userType;?>" /></td></tr>
	<tr><td></td><td><input type="hidden" name="surl" value="https://www.varudkar.com/payu/success.php" size="64" /></td></tr>
	<tr><td></td><td><input type="hidden" name="furl" value="https://www.varudkar.com/payu/fail.php" size="64" /></td></tr>
	
	
</table>
	<!--<input type="hidden" name="userType" value="" /><br /><br />
	<input type="hidden" name="sellingcurrencyamount" /><br /><br />
	<input type="hidden" name="accountingcurrencyamount" /><br /><br />
	<input type="hidden" name="userId"  /><br /><br />
	<input type="hidden" name="redirecturl" /><br />-->
	
    
    <!--<input type="button" name="btnSuccess" onClick="successClicked();" value="Continue Test of a Successful Transaction"><br>-->
    <!--<input type="button" name="btnPending" onClick="pendingClicked();" value="Continue Test of a Pending Transaction"><br>
    <input type="button" name="btnFailed" onClick="failClicked();" value="Continue Test of a Failed Transaction"><br>-->
</form>

<?php

		}
		else
		{
			/**This message will be dispayed in any of the following case
			*
			* 1. You are not using a valid 32 bit secure key from your Reseller Control panel
			* 2. The data passed from foundation has been tampered.
			*
			* In both these cases the customer has to be shown error message and shound not
			* be allowed to proceed  and do the payment.
			*
			**/

			echo "Checksum mismatch !";			

		}
?>
<a href="https://www.vrhostingindia.com/wallet_integration.aspx" target="_blank"><u><b>Powered by VRHostingindia Payment Gateway Services</b></u></a>
</center>
</body>
</html>
