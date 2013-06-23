<?php
// alphabet of normal characters
$alpha  = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890., !@#$%^&*()-_=+?/\|<>{}[]";
// cipher, which characters are matched with this
$cipher = "ZYXWVUTSRQPONMLKJIHGFEDCBA1234567890., !@#$%^&*()-_=+?/\|<>{}[]";

// array of sentences to encrypt
$msgArr = array(
  "I love computers.",
	"I am from Hawaii.",
	"I dance hula.",
	"But I do not surf.",
	"I practice judo."
);

//Display messages
foreach($msgArr as $val) echo "$val<br/>";
echo "<br/>";
//Display messages encrypted
foreach($msgArr as $val) echo encrypt($val, $alpha, $cipher)."<br/>";

?>
<br/>

<form action="simple-encryption.php" method="post">
<strong>Enter Message:</strong>
	<input type="text" name="message"/>
	<input type="submit" name="submit" value="Encrypt" />
</form>

<?php
if( isset($_POST["message"])) {
	$msg = $_POST["message"];
	echo "<strong>Entered message:</strong> ".$msg."<br/>";
	echo "<strong>Encrypted message:</strong> ".encrypt($msg, $alpha, $cipher)."<br/>";
}

function decrypt( $str, $alpha, $cipher) {
	$str = strtoupper( $str);
	$msg = "";
	for( $i=0; $i<strlen($str); $i++) {
		$char = substr($str, $i, 1);
		$msg .= substr($cipher, strpos($alpha, $char), 1 );
	}
	return $msg;
}
function encrypt( $str, $alpha, $cipher) {
	$str = strtoupper( $str);
	$msg = "";
	for( $i=0; $i<strlen($str); $i++) {
		$char = substr($str, $i, 1);
		$msg .= substr($alpha, strpos($cipher, $char), 1 );
	}
	return $msg;
}
