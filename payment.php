<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
	// Redirect to login page
	header('Location: login.php');
	exit;
}

// Set PayPal API credentials
$paypal_api_username = 'my_api_username';
$paypal_api_password = 'my_api_password';
$paypal_api_signature = 'my_api_signature';

// Set PayPal API endpoint
$paypal_api_endpoint = 'https://api-3t.paypal.com/nvp';

// Set PayPal API version
$paypal_api_version = '204.0';

// Set PayPal payment details
$paypal_payment_amount = '10.00';
$paypal_payment_currency = 'USD';
$paypal_payment_description = 'Membership Payment';

// Set PayPal return URLs
$paypal_return_url = 'http://mydatingwebsite.com/payment-success.php';
$paypal_cancel_url = 'http://mydatingwebsite.com/payment-cancel.php';

// Build PayPal API request
$paypal_api_request = array(
	'USER' => $paypal_api_username,
	'PWD' => $paypal_api_password,
	'SIGNATURE' => $paypal_api_signature,
	'METHOD' => 'SetExpressCheckout',
	'VERSION' => $paypal_api_version,
	'PAYMENTREQUEST_0_AMT' => $paypal_payment_amount,
	'PAYMENTREQUEST_0_CURRENCYCODE' => $paypal_payment_currency,
	'PAYMENTREQUEST_0_DESC' => $paypal_payment_description,
	'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
	'RETURNURL' => $paypal_return_url,
	'CANCELURL' => $paypal_cancel_url
);

// Send PayPal API request
$paypal_api_response = file_get_contents($paypal_api_endpoint . '?' . http_build_query($paypal_api_request));

// Parse PayPal API response
$paypal_api_response_array = array();
parse_str($paypal_api_response, $paypal_api_response_array);

// Check if PayPal API request was successful
if ($paypal_api_response_array['ACK'] == 'Success') {
// Redirect to PayPal payment page
header('Location: https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $paypal_api_response_array['TOKEN']);
exit;
} else {
// Display error message
$error = 'Payment failed. Please try again later.';
}
?>
<!DOCTYPE html> <html> <head> <title>Membership Payment</title> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" href="style.css"> </head> <body> <header> <h1>Welcome to My Dating Website</h1> <nav> <ul> <li><a href="#">Home</a></li> <li><a href="#">About Us</a></li> <li><a href="#">Contact Us</a></li> <li><a href="#">Sign Up</a></li> <li><a href="#">Log In</a></li> </ul> </nav> </header> <main> <section> <h2>Membership Payment</h2> <p>Please click the button below to proceed with the payment.</p> <form method="post"> <button type="submit" name="submit">Pay with PayPal</button> </form> <?php if (isset($error)) { ?> <p><?php echo $error; ?></p> <?php } ?> </section> </main> <footer> <p>&copy; 2023 My Dating Website. All rights reserved.</p> </footer> </body> </html>
