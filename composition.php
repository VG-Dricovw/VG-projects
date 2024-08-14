<?php

class Subscription
{
    protected Gateway $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function create()
    {

    }

    public function cancel()
    {
        $this->gateway->findCustomer();
        
    }

    public function invoice()
    {

    }

    public function swamp($newPlan)
    {

    }
}

interface Gateway {
    public function findCustomer($id);
    public function findSubscription($id);
}


class StripeGateway implements Gateway
{
    public function findCustomer($id)
    {
    }

    public function findSubscription($id)
    {
    }

}

new Subscription(new StripeGateway);