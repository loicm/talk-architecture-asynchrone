<?php

$message = Queue::get('invoicepdf_queue');

$invoice = $message['invoice'];

$invoice_pdf = new InvoicePdf($invoice);
$invoice_pdf_file = $invoice_pdf->toPdf();

if (file_exits($invoice_pdf_file)) {
    Queue::delete($message);

    Queue::push('sendinvoice_queue',
        [
            'invoice' => $invoice,
            'invoice_pdf' => $invoice_pdf_file,
            'order' => $message['order']
        ]
    );
}