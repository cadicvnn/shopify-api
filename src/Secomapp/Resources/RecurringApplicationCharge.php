<?php

namespace Secomapp\Resources;


use Secomapp\BaseResource;
use Secomapp\Contracts\ChargeContract;

class RecurringApplicationCharge extends BaseResource implements ChargeContract
{
    public function get($id)
    {
        return $this->client->get("recurring_application_charges/{$id}.json", 'recurring_application_charge');
    }

    public function activate($id)
    {
        return $this->client->post("recurring_application_charges/{$id}/activate.json", 'recurring_application_charge', [
            'recurring_application_charge' => $id
        ]);
    }

    public function create($plan)
    {
        return $this->client->post('recurring_application_charges.json', 'recurring_application_charge', [
            'recurring_application_charge' => $plan
        ]);
    }

    public function activeStatus($status)
    {
        return in_array($status, ['accepted', 'active']);
    }
}