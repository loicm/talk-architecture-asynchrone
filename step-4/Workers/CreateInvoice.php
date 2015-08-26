<?php

$message = Queue::get('createinvoice_queue');

$order = $message['order'];

$invoice = new Invoice($order);
$invoice_repository = new InvoiceRepository();

if (true === $invoice_repository->save($invoice)) {
    Queue::delete($message);

    Queue::push('invoicepdf_queue', ['invoice' => $invoice, 'order' => $order]);
}