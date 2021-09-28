<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;
use MailchimpMarketing\ApiException;

class Newsletter
{
    public function subscribe(string  $email) {
        $this->client()->lists->addListMember(config('services.mailchimp.lists.subscriber'), [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    public function all() {
        try {
            return collect($this->client()->lists->getListMembersInfo($this->getListID())->members)->map(function ($member) {
                return ([
                    'email' => $member->email_address,
                    'time' => $member->timestamp_opt,
                    'status' => $member->status
                ]);
            });
        } catch (ApiException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy($memberMail)
    {
        try {
            return $this->client()->lists->deleteListMember($this->getListID(), hash('md5', $memberMail));
        } catch (ApiException $e) {
            echo $e->getMessage();
        }
    }

    protected function client() {
        return (new ApiClient())->setConfig([
            'apiKey' =>  config('services.mailchimp.key'),
            'server' => 'us5'
        ]);
    }

    protected function getListID()
    {
        try {
            return $this->client()->lists->getAllLists()->lists[0]->id;
        } catch (ApiException $e) {
            echo $e->getMessage();
        }
    }


}



