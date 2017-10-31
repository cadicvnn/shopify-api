<?php

namespace Secomapp\Resources;


use Secomapp\BaseResource;
use Secomapp\Contracts\ChargeContract;

class ApplicationCharge extends BaseResource implements ChargeContract
{
    public function get($id)
    {
        return $this->client->get("application_charges/{$id}.json", 'application_charges');
    }

    public function activate($id)
    {
        return $this->client->post("application_charges/{$id}/activate.json", 'application_charges', [
            'application_charges' => $id
        ]);
    }

    public function create($plan)
    {
        return $this->client->post('application_charges.json', 'application_charges', [
            'application_charges' => $plan
        ]);
    }

    public function activeStatus($status)
    {
        return in_array($status, ['accepted', 'active']);
    }
}