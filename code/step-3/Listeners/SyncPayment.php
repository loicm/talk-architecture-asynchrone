<?php

class SyncPaymentListener extends Listener
{
    public function fire($params)
    {
        $order = $params['order'];

        $syncAPI = new SyncAPI();
        $syncAPI->syncOrder($order);
    }
}