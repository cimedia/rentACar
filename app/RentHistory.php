<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class RentHistory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rent_history';

    public $timestamps = false;
    protected $fillable = [
        'client_id',
        'car_id',
        'rentDate',
        'returnDate'
    ];

    /**
     * Method for getting rent history data joined with clients and cars
     *
     * @return LengthAwarePaginator
     */
    public function getRentHistory(): LengthAwarePaginator
    {
        return DB::table($this->table)
            ->select(
                DB::raw('rent_history.*, CONCAT(clients.name, \' \', clients.surname) as client, cars.name as car')
            )
            ->join('clients', 'clients.id', '=', 'rent_history.client_id')
            ->join('cars', 'cars.id', '=', 'rent_history.car_id')
            ->latest('rent_history.rentDate')
            ->paginate(5);
    }
}
