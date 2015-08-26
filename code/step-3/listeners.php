<?php

$listeners = [
    'NewOrder' => [
        'ThanksUser',
        'CreateInvoice',
        'SyncPayment',
    ],
    'NewInvoice' => [
        'CreateInvoicePdf',
    ],
    'NewInvoicePdf' => [
        'SendInvoicePdf'
    ]
];