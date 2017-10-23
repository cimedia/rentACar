<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    /**
     * Method for getting cars for dropdown
     *
     * @return null|array
     */
    public function getCarsForDropdown(): ?array
    {
        $cars = $this->latest('name')->get();
        foreach ($cars as $car) {
            $result[$car->id] = $car->name;
        }
        return $result ?? null;
    }
}
