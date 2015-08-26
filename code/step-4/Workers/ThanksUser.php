<?php

$message = Queue::get('thanksuser_queue');

$order = $message['order'];

$email = new Email('confirmation');
$email->to = $order->email;
$email->subject = 'Merci de votre commande !';
if (true === $email->send()) {
    Queue::delete($message);
}