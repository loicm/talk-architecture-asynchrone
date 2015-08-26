<?php
/**
 * Step 4
 *
 * With Job Queue and Workers
 */

class OrderController extends Controller
{
    public function thankyou()
    {
        $response = $this->getResponse('html');

        $order = new Order();
        $order->lastname = $this->post('lastname');
        $order->firstname = $this->post('firstname');
        $order->email = $this->post('email');

        $repository = new OrderRepository();
        $repository->save($order);

        Queue::push('thanksuser_queue', ['order' => $order]);
        Queue::push('createinvoice_queue', ['order' => $order]);
        Queue::push('syncapi_queue', ['order' => $order]);

        $response->template = 'thankyou';

        return $response;
    }
}