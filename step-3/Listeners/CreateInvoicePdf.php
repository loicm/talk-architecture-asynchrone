<?php

class CreateIncoicePdfListener extends Listener
{
    public function fire($params)
    {
        $invoice = $params['invoice'];

        $invoice_pdf = new InvoicePdf($invoice);
        $invoice_pdf_file = $invoice_pdf->toPdf();

        Event::notify('NewInvoicePdf',
            [
                'invoice' => $invoice,
                'invoice_pdf' => $invoice_pdf,
                'order' => $params['order']
            ]
        );
    }
}