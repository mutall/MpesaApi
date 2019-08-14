<?php
//these will define all constants used in the application. i.e urls for sending the requests
// urls  
define("ACCESS_TOKEN_URL", "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials");
define("B2C_URL", "https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest");
define("B2B_URL", "https://sandbox.safaricom.co.ke/mpesa/b2b/v1/paymentrequest");
define("C2B_REGISTER_URL", "https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl");
define("C2B_SIMULATE_URL", "https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate");
define("ACCOUNT_BALANCE_URL", "https://sandbox.safaricom.co.ke/mpesa/accountbalance/v1/query");
define("TRANSACTION_QUERY_URL", "https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query");
define("REVERSAL_URL", "https://sandbox.safaricom.co.ke/mpesa/reversal/v1/request");


define("B2B_RESULT_URL", "http://mutall.co.ke/MpesaApi/b2b_result.php");
define("B2C_RESULT_URL", "http://mutall.co.ke/MpesaApi/b2c_result.php");
define("TRANSACTION_STATUS_RESULT_URL", "http://mutall.co.ke/MpesaApi/transaction_status_result.php");
define("ACCOUNT_BALANCE_RESULT_URL", "http://mutall.co.ke/MpesaApi/account_balance_result.php");

define("TIMEOUT_URL", "http://mutall.co.ke/MpesaApi/timeout.php");

// credentials
define("CONSUMER_KEY", "2IbOcf11rCnUQmOH5IEjJFNNYZZrUI7Q");
define("CONSUMER_SECRET", "j9AgYBsCaCQHAmHr");

// Test credentials 
// please note that the test credentials expire after 3days 

// The username of the M-Pesa B2C account API operator
define("INITIATOR_NAME", "apitest511");

/**
 * SECURITY_CREDENTIAL
 * This is the value obtained after encrypting the API initiator password. 
 * The process for encrypting the initiator password had been described in the daraja documentation
 */
define("SECURITY_CREDENTIAL", "bo69mt6VX6NI3/3ZslZGQ8OAlt9IxLNJP26eek4XsTXG+b8fDqwSyRMF/licL8qPodxgZvU6qOGDXYUK9YPZkrWdEICF4hy/W76w40ZzZ2BKQMxS/oyctEgtBkown1mCCmw+Xoloh4muWwrkpWlyMAuPcjXDdTLzG1OKpx2eVJbg38VqZuYyaRBss+G95f/dPHkRm1W6S65ONfHmNyfYU/Gk5baWIyp/aJSVSv2SpbH9ItIuRxIrhln+K0aTRhK6K5Gb15pNbirqsTPoEPMfCbpkB/P9iobUZ9/3q0MfvDigjGixEB7IPSDGrXCerllEovJipEtkltfEc+4xB7+org==");
/**
 * PARTYA
 * This is the shortcode from which the money is to be sent.
 */
define("PARTYA", "601511");

/**
 * PARTYB
 * This is the customer mobile number  to receive the amount
 */
define("PARTYB", "601511");
/**
 * MSISDN (phone number) sending the transaction, start with country code without the plus(+) sign.
 */
define("MSISDN", "254708374149");

/**
 * COMMAND_ID
 *  This is a unique command that specifies B2C transaction type.
 *  SalaryPayment: This supports sending money to both registere and unregistered M-Pesa customers.
 *  BusinessPayment: This is a normal business to customer payment,  supports only M-Pesa registered customers.
 *  PromotionPayment: This is a promotional payment to customers. The M-Pesa notification message is a congratulatory message. Supports only M-Pesa registered customers.
 */
