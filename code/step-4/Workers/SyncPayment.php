<?php

$message = Queue::get('syncapi_queue');

$order = $message['order'];

$syncAPI = new SyncAPI();
if (true === $syncAPI->syncOrder($order)) {
    Queue::delete($message);
}