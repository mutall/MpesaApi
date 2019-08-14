<?php

/**
 * These will be a collection of classes each representing a particular api
 * They will all extend the request class which handles sending of requests
 * The only difference is the post body which we will set by overriding 
 * the generateBody() abract method in the parent
 */
require "Mpesa.php";
/** 
 * Use this API to transact between an M-Pesa short code to a phone number registered on M-Pesa.
 * https://developer.safaricom.co.ke/b2c/apis/post/paymentrequest
 */

class B2C extends Mpesa
{
    public $result;
    public function __construct()
    {
        parent::__construct();
        $this->result = $this->execute(B2C_URL);
    }

    protected function generateBody()
    {
        return array(
            'InitiatorName' => INITIATOR_NAME,
            'SecurityCredential' => SECURITY_CREDENTIAL,
            'CommandID' => 'SalaryPayment',
            'Amount' => '3000',
            'PartyA' => PARTYA,
            'PartyB' => MSISDN,
            'Remarks' => 'Payment for april',
            'QueueTimeOutURL' => TIMEOUT_URL,
            'ResultURL' => B2C_RESULT_URL
        );
    }
}
/**
 * This API enables Business to Business (B2B) transactions between a business and another business. 
 * Use of this API requires a valid and verified B2B M-Pesa short code for the business initiating the transaction
 *  and the both businesses involved in the transaction.
 */
class B2B extends Mpesa
{
    public $result;
    public function __construct()
    {
        parent::__construct();
        $this->result = $this->execute(B2B_URL);
    }

    protected function generateBody()
    {
        return array(
            //Fill in the request parameters with valid values
            'Initiator' => INITIATOR_NAME,
            'SecurityCredential' => SECURITY_CREDENTIAL,
            'CommandID' => 'MerchantToMerchantTransfer',
            'SenderIdentifierType' => '4', //Type of organization sending the transaction.
            'RecieverIdentifierType' => '4', //Type of organization receiving the funds being transacted.
            'Amount' => '50000',
            'PartyA' => PARTYA,
            'PartyB' => PARTYB,
            // 'AccountReference' => ' ', //Account Reference mandatory for “BusinessPaybill” CommandID.
            'Remarks' => 'Payment for job done on december', //Comments that are sent along with the transaction.
            'QueueTimeOutURL' => TIMEOUT_URL,
            'ResultURL' => B2B_RESULT_URL
        );
    }
}
/**
 * Transaction Status API checks the status of a B2B, B2C and C2B APIs transactions.
 * https://developer.safaricom.co.ke/docs#transaction-status
 */
class TranactionStatus extends Mpesa
{
    public $result;
    public function __construct()
    {
        parent::__construct();
        $this->result = $this->execute(TRANSACTION_QUERY_URL);
    }

    protected function generateBody()
    {
        return array(
            'Initiator' => INITIATOR_NAME,
            'SecurityCredential' => SECURITY_CREDENTIAL,
            'CommandID' => 'TransactionStatusQuery',
            'TransactionID' => '4', //organization receiving the funds
            'PartyA' => PARTYA,
            'IdentifierType' => '1',
            'ResultURL' => TRANSACTION_STATUS_RESULT_URL,
            'QueueTimeOutURL' => TIMEOUT_URL,
            'Remarks' => 'Transaction for the month August', //comments sent along with the transaction
            // 'Occasion' => ' ' //optional
        );
    }
}

/**
 * The Account Balance API requests for the account balance of a shortcode.
 * https://developer.safaricom.co.ke/docs#account-balance-api
 */

class AccountBalance extends Mpesa
{
    public $result;
    public function __construct()
    {
        parent::__construct();
        $this->result = $this->execute(ACCOUNT_BALANCE_URL);
    }

    protected function generateBody()
    {
        return array(
            'Initiator' => INITIATOR_NAME,
            'SecurityCredential' => SECURITY_CREDENTIAL,
            'CommandID' => 'AccountBalance',
            'PartyA' => PARTYA,
            'IdentifierType' => '4',
            'Remarks' => 'Account balance as at July',
            'QueueTimeOutURL' => TIMEOUT_URL,
            'ResultURL' => ACCOUNT_BALANCE_RESULT_URL
        );
    }
}

/**
 * This API enables Paybill and Buy Goods merchants to integrate to M-Pesa and receive real time payments notifications.
 * The C2B Register URL API registers the 3rd party’s confirmation and validation URLs to M-Pesa ; 
 * which then maps these URLs to the 3rd party shortcode. Whenever M-Pesa receives a transaction on the shortcode, 
 * M-Pesa triggers a validation request against the validation URL and the 3rd party system responds to M-Pesa with a 
 * validation response (either a success or an error code). The response expected is the success code the 3rd party
 */
class C2Bregister extends Mpesa
{
    public $result;
    public function __construct()
    {
        parent::__construct();
        $this->result = $this->execute(C2B_REGISTER_URL);
    }
    protected function generateBody()
    {
        return array(
            'ShortCode' => PARTYA,
            'ResponseType' => ' ',
            'ConfirmationURL' => CONFIRMATION_URL,
            'ValidationURL' => VALIDATION_URL
        );
    }
}

class C2Bsimulate extends Mpesa
{
    public $result;
    public function __construct()
    {
        parent::__construct();
        $this->result = $this->execute(C2B_SIMULATE_URL);
    }
    protected function generateBody()
    {
        return array(
            //Fill in the request parameters with valid values
            'ShortCode' => ' ',
            'CommandID' => 'CustomerPayBillOnline',
            'Amount' => ' ',
            'Msisdn' => ' ',
            'BillRefNumber' => '00000'
        );
    }
}


new AccountBalance();
// var_dump($x->result);