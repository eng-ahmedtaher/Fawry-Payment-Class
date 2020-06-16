<?php

/*-------------------------------------------------------
*
*   Fawry Payment Class
*   Copyright © 2020 Ahmed Taher
*
*--------------------------------------------------------
*
*   Contact Github: https://github.com/eng-ahmedtaher
*
*   GNU General Public License, version 1:
*   http://www.gnu.org/licenses/old-licenses/gpl-1.0.html
*
---------------------------------------------------------
*/

class Fawry
{
	/*
	*	Initialize Charge Request Properties.
	*
	*	The language used by your customer. It should be 'ar-eg' or 'en-gb'.
	*/
	private static $language;

	/*
	*	Your identifier on our system Ex: 'SHKKRxuqZ5Y='.
	*/
	private static $merchantCode;

	/*
	*	A unique identifier for the orders on your system Ex: 'OR-123456789'.
	*/
	private static $merchantRefNumber;

	/*
	*	Customer Name Ex: 'Ahmed Taher'.
	*/
	private static $customerName;

	/*
	*	Customer Mobile Ex: '+20123456789'.
	*/
	private static $mobile;

	/*
	*	Customer Email Ex: 'ahmedtaherinfo0@gmail.com'.
	*/
	private static $email;

	/*
	*	Optional feature: The customer identifier id in your System Ex: '1253'.
	*/
	private static $customerProfileId;

	/*
	*	The order description which will be printed on POS receipt if the customer pay in Fawry channels Ex: 'Order Number 1 Description'.
	*/
	private static $description;

	/*
	*	The merchant needs to set a specific expiry number of hours for the unpaid placed orders Ex: '24'.
	*/
	private static $expiry;

	/*
	*	The Order Items	Product ID Ex: '152'.
	*/
	private static $productSKU;

	/*
	*	The Order Items Description Ex: 'PES2020 Game'.
	*/
	private static $orderDescription;

	/*
	*	The Order Items Price like Decimal Format Ex: '100.00'.
	*/
	private static $price;

	/*
	*	The Order Items Quantity Ex: '1'.
	*/
	private static $quantity;

	/*
	*	The Order Items Width Ex: '10inch'.
	*/
	private static $width;

	/*
	*	The Order Items Height Ex: '22inch'.
	*/
	private static $height;

	/*
	*	The Order Items Length Ex: '25inch'.
	*/
	private static $length;

	/*
	*	The Order Items Weight Ex: '1.25kg'.
	*/
	private static $weight;

	/*
	*	To avoid the request from being edited by the customer use the request signature hash the result using SHA-256.
	*	You will Hashed: 'merchantCode, merchantRefNumber, Customer profile id, OrderID, Quantity, Price, Expiry hours, Secure hash key'.
	*/
	private static $signature;

	/*
	*	Collect items that will be encrypted via SHA-256.
	*/
	private static $hash;

	/*
	*	Upon completion of the Request Success Payment, you will be redirect to this URL.
	*/
	private static $successURL;

	/*
	*	Upon completion of the Request Failer Payment, you will be redirect to this URL.
	*/
	private static $failURL;

	/*
	*	Your Secure Hash key of Your Account in Fawry.
	*/
	private static $secureHashkey;

	/*
	*	Render JS SandBox Environment
	*/
	public static function jsSandBox()
	{
		$script = '<script type="text/javascript" src="https://atfawry.fawrystaging.com/ECommercePlugin/scripts/FawryPay.js"></script>';

		return $script;
	}

	/*
	*	Render JS Live Environment
	*/
	public static function jsLive()
	{
		$script = '<script type="text/javascript" src="https://www.atfawry.com/ECommercePlugin/scripts/FawryPay.js"></script>';

		return $script;
	}

	/*
	*	Render Checkout Button
	*/
	public static function payment($language = 'ar-eg', $merchantCode, $merchantRefNumber, $customerName = null, $mobile, $email, $customerProfileId, $description, $expiry = 24, $productSKU, $orderDescription, $price, $quantity, $width = null, $height = null, $length = null, $weight = null, $successURL, $failURL, $secureHashkey)
	{
		
		self::$language = $language;
		self::$merchantCode = $merchantCode;
		self::$merchantRefNumber = $merchantRefNumber;
		self::$customerName = $customerName;
		self::$mobile = $mobile;
		self::$email = $email;
		self::$customerProfileId = $customerProfileId;
		self::$description = $description;
		self::$expiry = $expiry;
		self::$productSKU = $productSKU;
		self::$orderDescription = $orderDescription;
		self::$price = $price;
		self::$quantity = $quantity;
		self::$width = $width;
		self::$height = $height;
		self::$length = $length;
		self::$weight = $weight;
		self::$successURL = $successURL;
		self::$failURL = $failURL;
		self::$secureHashkey = $secureHashkey;

		self::$hash = self::$merchantCode . self::$merchantRefNumber . self::$customerProfileId . self::$productSKU . self::$quantity . self::$price . self::$expiry . self::$secureHashkey;

		self::$signature = hash('sha256', self::$hash);

		$input = '<input type="submit" onclick="FawryPay.checkout({';
		$input .= 	"'language':'".self::$language."', 'merchantCode':'".self::$merchantCode."', 'merchantRefNumber':'".self::$merchantRefNumber."', 'customer':{ 'name':'".self::$customerName."', 'mobile':'".self::$mobile."', 'email':'".self::$email."', 'customerProfileId':'".self::$customerProfileId."' }, 'order':{ 'description':'".self::$description."', 'expiry':'".self::$expiry."', 'orderItems':[{ 'productSKU':'".self::$productSKU."', 'description':'".self::$orderDescription."', 'price':'".self::$price."', 'quantity':'".self::$quantity."', 'width':'".self::$width."', 'height':'".self::$height."', 'length':'".self::$length."', 'weight':'".self::$weight."' }] }, 'signature':'".self::$signature."'},'".self::$successURL."', '".self::$failURL."')";
		$input .= '"; class="btn btn-info" value="Pay Now"/>';

		return $input;

	}


}