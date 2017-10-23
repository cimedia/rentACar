<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname'
    ];

    /**
     * Method for getting clients for dropdown
     *
     * @return null|array
     */
    public function getClientsForDropdown(): ?array
    {
        $clients = $this->latest('surname')->get();
        foreach ($clients as $client) {
            $result[$client->id] = $client->name . ' ' . $client->surname;
        }
        return $result ?? null;
    }
}
