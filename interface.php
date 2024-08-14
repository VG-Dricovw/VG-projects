<?php


interface Newsletter
{
    public function subscribe($email);
}


class CampainMonitor implements Newsletter
{
    public function subscribe($email)
    {
        die("subscripe with CM");
    }
}

class Drip implements Newsletter
{
    public function subscribe($email)
    {
        die("subscripe with drip");

    }

}

class NewsLetterSubscriptionsController {

    public function store($newsletter) {
        $email = 'joe@example.com';

        $newsletter->subscribe(auth()->user()->email);
    }
}

$controller = new NewsLetterSubscriptionsController();

$controller->store(new CampainMonitor());