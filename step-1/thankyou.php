<?php
/**
 * Step 1
 *
 * Contexte :
 * Panier rempli, on est sur la page de paiement
 *
 * On saisie ses numéros de CB et on valide la commande.
 * La page demandée va donc: 
 * 
 * - enregister la commande en DB
 * - envoyer un email de confirmation
 * - créer la facture en DB
 * - générer la facture en pdf
 * - envoyer la facture pdf par email au client
 * - synchroniser la commande sur une DB externe via une API
 * - Afficher la page de confirmation/remerciements (ENFIN !)
 */


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$cart = $_SESSION['cart'];

// Save order in DB
$sql = 'INSERT INTO orders (customer_lastname, customer_firstname, customer_email, order_total, created_at) VALUES (%s, %s, %s, %s, NOW())';
mysql_query(sprintf($sql, $lastname, $firstname, $email, $cart['total']));

// TODO
// Get last id
// update order to save invoice number
$id = '';

// Send confirmation email
$email_tpl = file_get_contents(__DIR__.'/templates/emails/confirmation.tpl');
$email_tpl = str_replace(
    [
        '{lastname}',
        '{firstname}',
        '{order_total}',
    ],
    [
        $lastname,
        $fistname,
        $email
    ],
    $email_tpl
);
mail($email, 'Merci de votre commande !', $email_tpl);

// Generate invoice in DB
// 
// TODO check mysql_* functions
$result = mysql_query('SELECT * FROM orders WHERE id = '.$id);
$order = mysql_fetch_array($result);

// Generate invoice in DB
$invoice_tpl = file_get_contents(__DIR__.'/templates/invoice.tpl');
$invoice_tpl = str_replace(
    [
        '{lastname}',
        '{firstname}',
        '{order_total}',
    ],
    [
        $lastname,
        $fistname,
        $email
    ],
    $invoice_tpl
);
file_put_contents(
    __DIR__.'/invoices/'.date('Y').'/'.date('m').'/'.$invoice_number.'.html',
    $invoice_tpl
);
exec('html2pdf '.__DIR__.'/invoices/'.date('Y').'/'.date('m').'/'.$invoice_number.'.html '.__DIR__.'/invoices/'.date('Y').'/'.date('m').'/'.$invoice_number.'.pdf');
unlink(__DIR__.'/invoices/'.date('Y').'/'.date('m').'/'.$invoice_number.'.html');

// Send invoice pdf by email
mail(
    $email,
    'Votre facture',
    'Voici votre facture pour votre commande N°'.$invoice_number,
    [
        // TODO check header for attachments
    ]
);

// Sync order to the API
file_get_contents('http://api.mydomain.com/orders/create?lastname='.$lastname.'&firstname='.$firstname.'&email='.$email.'&=total='.$cart['total'].'&invoice_number='.$invoice_number.'&create_date='.date('Y-m-d H:i:s'));

// Display confirmation page
header('Content-Type: text/html');

$response_tpl = file_get_contents(__DIR__.'/templates/pages/thank_you.tpl');
$response_tpl = str_replace(
    [
        '{lastname}',
        '{firstname}',
        '{order_total}',
    ],
    [
        $lastname,
        $fistname,
        $email
    ],
    $response_tpl
);

echo $response_tpl;