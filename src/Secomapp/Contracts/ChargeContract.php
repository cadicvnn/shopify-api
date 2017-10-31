<?php
namespace Secomapp\Contracts;


interface ChargeContract
{
    public function get($id);

    public function activate($id);

    public function create($plan);

    public function activeStatus($status);
}