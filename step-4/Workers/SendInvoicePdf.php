<?php

$message = Queue::get('sendinvoice_queue');

$order = $message['order'];
$invoice_pdf = $message['invoice_pdf'];

$email = new Email('invoice');
$email->to = $order->email;
$email->subject = 'Voici votre facture pour votre commande N°'.$order->invoice_number;
$email->addAttachment($invoice_pdf);
if (true === $email->send()) {
    Queue::delete($message);
}