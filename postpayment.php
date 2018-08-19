<?php 
	 session_start();
	 session_save_path("./"); //path on your server where you are storing session


	//file which has required functions
	require("functions.php");	
 ?>
<html>
<head><title>Post Payment</title>

<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" /></head>
<body bgcolor="white"><center>
<font size=4>

<?php
session_start();
		$key = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"; //replace ur 32 bit secure key , Get your secure key from your Reseller Control panel
	    

		$redirectUrl = $_POST['redirectUrl'];  // redirectUrl received from foundation
		$transId = $_POST['transId'];		 //Pass the same transid which was passsed to your Gateway URL at the beginning of the transaction.
		$sellingCurrencyAmount = $_POST['sellingCurrencyAmount'];
		$accountingCurrencyAmount = $_POST['accountingCurrencyAmount'];


		$status = $_SESSION["status"];	 // Transaction status received from your Payment Gateway
        //This can be either 'Y' or 'N'. A 'Y' signifies that the Transaction went through SUCCESSFULLY and that the amount has been collected.
        //An 'N' on the other hand, signifies that the Transaction FAILED.

		/**HERE YOU HAVE TO VERIFY THAT THE STATUS PASSED FROM YOUR PAYMENT GATEWAY IS VALID.
	    * And it has not been tampered with. The data has not been changed since it can * easily be done with HTTP request. 
		*
		**/
		
		srand((double)microtime()*1000000);
		$rkey = rand();


		$checksum =generateChecksum($transId,$sellingCurrencyAmount,$accountingCurrencyAmount,$status, $rkey,$key);

			echo "You'll now redirect to merchant page! <br>";
            /*echo "redirecturl: ".$redirectUrl."<br>";
            echo "List of Variables to send back<br>";
            echo "transid : ".$transId."<br>";         
            echo "accountingCurrencyAmount : ".$accountingCurrencyAmount."<br>";
			echo "rkey : ".$rkey."<br>";
			echo "sellingCurrencyAmount : ".$sellingCurrencyAmount."<br><br>";*/ 
			echo "status : ".$status."<br>"; 

?>
		<form name="f1" action="<?php echo $redirectUrl;?>">
		<input type="submit" value="Click here to Continue"><BR>
			<input type="hidden" name="transid" value="<?php echo $transId;?>">
		    <input type="hidden" name="status" value="<?php echo $status;?>">
			<input type="hidden" name="rkey" value="<?php echo $rkey;?>">
		    <input type="hidden" name="checksum" value="<?php echo $checksum;?>">
		    <input type="hidden" name="sellingamount" value="<?php echo $sellingCurrencyAmount;?>">
			<input type="hidden" name="accountingamount" value="<?php echo $accountingCurrencyAmount;?>">

			
		</form>
</font><br/><br/>
<a href="https://www.vrhostingindia.com/wallet_integration.aspx" target="_blank"><u><b>Powered by VRHostingindia Payment Gateway Services</b></u></a>
</center>
</body>
</html>