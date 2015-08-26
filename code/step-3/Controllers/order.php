<?php
/**
 * Step 3
 *
 * With listeners
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

        Event::notify('NewOrder', ['order' => $order]);

        $response->template = 'thankyou';

        return $response;
    }
}