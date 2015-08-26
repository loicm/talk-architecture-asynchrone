<?php

class OrderRepository extends Repository
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function save(Order $order)
    {
        // Code to save an order in DB
        $order->created_dt = datet('Y-m-d H:i:s');
        
        $order = $this->db->save($order);
        $order->invoice_number = $this->generateInvoiceNumber();
        
        return $order;
    }

    public function generateInvoiceNumber()
    {
        // Code here

        return $invoice_number;
    }
}