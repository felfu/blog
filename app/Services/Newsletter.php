<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string  $email) {
        $this->client()->lists->addListMember(config('services.mailchimp.lists.subscriber'), [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    protected function client() {
        return (new ApiClient())->setConfig([
            'apiKey' =>  config('services.mailchimp.key'),
            'server' => 'us5'
        ]);
    }

}



