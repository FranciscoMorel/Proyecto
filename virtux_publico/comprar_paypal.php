<?php 

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;


require __DIR__ . '/bootstrap.php';

$precio_item = $_POST['total'];


$payer = new Payer();
$payer->setPaymentMethod('paypal');

$details = new Details();
$details->setShipping('0.00')
		->setTax('0.00')
		->setSubtotal($precio_item);

$amount = new Amount();
$amount->setCurrency('MXN')
		->setTotal($precio_item)
		->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
			->setDescription("compra desde VIRTUX");

$payment = new Payment();
$payment->setIntent('sale')
		->setPayer($payer)
		->setTransactions( [$transaction] );

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl('http://localhost/virtux_publico/mensajes/finalizar_compra.php?aprobado=true')
			->setCancelUrl('http://localhost/virtux_publico/mensajes/cancelado.php');

$payment->setRedirectUrls($redirectUrls);

try{

	$payment->create($apiContext);

	//var_dump($payment);

}catch(PayPal\Exception\PayPalConnectionException $ex){
	header("Location:mensajes/error.php");
}

foreach ($payment->getLinks() as $link) {
	if ($link->getRel() == 'approval_url') {
		$redirectUrl = $link->getHref();
	}
}

header("Location:".$redirectUrl);


 ?>