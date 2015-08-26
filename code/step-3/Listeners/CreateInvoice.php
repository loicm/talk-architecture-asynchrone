<?php

class CreatInvoiceListener extends Listener
{
    public function fire($params)
    {
        $order = $params['order'];

        $invoice = new Invoice($order);
        $invoice_repository = new InvoiceRepository();
        $invoice_repository->save($invoice);

        Event::notify('NewInvoice', [
            'invoice' => $invoice,
            'order' => $order
        ]);
    }
}