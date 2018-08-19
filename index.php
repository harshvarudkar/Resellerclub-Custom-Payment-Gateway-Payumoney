<!DOCTYPE html>
<?php
	session_start();
	require("functions.php");	//file which has required functions
?>	
<html>
<head>
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
<body>

	<div>
		<h2>Payumoney Payment Gateway</h2>
		<h3>Keep your payment details ready</h3>
	</div>
<center>
<!--
<?php
		session_start();
		$key = "xxxxxxxxxxxxxxxxxxxxxxxxxxx"; //replace ur 32 bit secure key , Get your secure key from your Reseller Control panel
		
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
         echo "Secure Connection Verification..............";

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

			
			
			
			$_SESSION['userType']=$userType;
			$_SESSION['price']=$price;
			$_SESSION['userId']=$userId;
			$_SESSION['redirecturl']=$redirectUrl;
			$_SESSION['transid']=$transId;
			$_SESSION['accountingCurencyAmount']=$accountingCurrencyAmount;
			$_SESSION['sellingCurrencyAmount']=$sellingCurrencyAmount;

			
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
?>-->
<div>
<table>
	<form name="postForm" action="form_process.php" method="POST" >
	<tr><td>txnid</td><td><input type="hidden" name="txnid" value="<?php echo $transId;?>" /></td></tr>
	<tr><td>amount</td><td><input type="hidden" name="amount" value="<?php echo $sellingCurrencyAmount;?>" /></td></tr>
	<tr><td>udf1</td><td><input type="hidden" name="udf1" value="<?php echo $accountingCurrencyAmount;?>" /></td></tr>
	<tr><td>udf2</td><td><input type="hidden" name="udf1" value="<?php echo $redirectUrl;?>" /></td></tr>
	<tr><td>firstname</td><td><input type="hidden" name="firstname" value="<?php echo $userId;?>" /></td></tr>
	<tr><td>email</td><td><input type="hidden" name="email" value="harsh.varudkar@hotmail.com" /></td></tr>
	<tr><td>phone</td><td><input type="hidden" name="phone" value="9429687664" /></td></tr>
	<tr><td>productinfo</td><td><input type="hidden" name="productinfo" value="<?php echo $userType;?>" /></td></tr>
	<tr><td>success url</td><td><input type="hidden" name="surl" value="https://www.varudkar.com/payu/success.php" size="64" /></td></tr>
	<tr><td>failure url</td><td><input type="hidden" name="furl" value="https://www.varudkar.com/payu/fail.php" size="64" /></td></tr>
	<tr><td><input type="Click Here to continue" /></td></tr>
	</form>
</table>
</div>


<br/><br/>

<a href="https://www.vrhostingindia.com/wallet_integration.aspx" target="_blank"><u><b>Powered by VRHostingindia Payment Gateway Services</b></u></a>

</body>
</html>