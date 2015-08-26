<?php
/**
 * Step 2
 */

class OrderController extends Controller
{
    public function thankyou()
    {
        $response = $this->getResponse('html');

        // Save order in DB
        $order = new Order();
        $order->lastname = $this->post('lastname');
        $order->firstname = $this->post('firstname');
        $order->email = $this->post('email');
        $repository = new OrderRepository();
        $repository->save($order);

        // Send confirmation email
        $email = new Email('confirmation');
        $email->to = $email;
        $email->subject = 'Merci de votre commande !';
        $email->send();

        // Create invoice in DB
        $invoice = new Invoice($order);
        $invoice_repository = new InvoiceRepository();
        $invoice_repository->save($invoice);

        // Generate invoice pdf
        $invoice_pdf = new InvoicePdf($invoice);
        $invoice_pdf_file = $invoice_pdf->toPdf();

        // Send invoice pdf by email
        $email = new Email('invoice');
        $email->to = $email;
        $email->subject = 'Voici votre facture pour votre commande N°'.$order->invoice_number;
        $email->addAttachment($invoice_pdf_file);
        $email->send();

        // Sync order with the API
        $syncAPI = new SyncAPI();
        $syncAPI->syncOrder($order);

        // Display the page
        $response->template = 'thankyou';

        return $response;
    }
}