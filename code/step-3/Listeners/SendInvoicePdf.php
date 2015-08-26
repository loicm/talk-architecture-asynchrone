<?php

class SendInvoicePdfListener extends Listener
{
    public function fire($params)
    {
        $order = $params['order'];
        $invoice_pdf = $params['invoice_pdf'];

        $email = new Email('invoice');
        $email->to = $order->email;
        $email->subject = 'Voici votre facture pour votre commande N°'.$order->invoice_number;
        $email->addAttachment($invoice_pdf);
        $email->send();
    }
}