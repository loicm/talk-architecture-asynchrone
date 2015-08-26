<?php

class ThanksUserListener extends Listener
{
    public function fire($params)
    {
        $order = $params['order'];

        $email = new Email('confirmation');
        $email->to = $order->email;
        $email->subject = 'Merci de votre commande !';
        $email->send();
    }
}