<?php

namespace App\Http\Controllers;

use App\Car;
use App\Client;
use App\RentHistory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RentHistoryController extends Controller
{
    /**
     * Display a rent history
     *
     * @return View
     */
    public function index(): View
    {
        $rentHistoryObj = new RentHistory();
        $rentHistory = $rentHistoryObj->getRentHistory();
        return view('rentHistory.index', compact('rentHistory'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new rental data
     *
     * @return View
     */
    public function create(): View
    {
        $clientsObj = new Client();
        $clients = $clientsObj->getClientsForDropdown();

        $carsObj = new Car();
        $cars = $carsObj->getCarsForDropdown();

        return view('rentHistory.create', compact('clients', 'cars'));
    }

    /**
     * Store a newly created rental data in storage.
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(
            [
                'client_id' => 'required',
                'car_id' => 'required',
                'rentDate' => 'required|date'
            ]
        );
        try {
            RentHistory::create($request->all());
            return redirect()->route('rentHistory.index')
                ->with('success', 'Rental data added successfully');
        } catch (QueryException $exception) {
            return redirect()->route('rentHistory.index');
        }
    }

    /**
     * Show the form for editing the specified rental data
     *
     * @param  int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $clientsObj = new Client();
        $clients = $clientsObj->getClientsForDropdown();

        $carsObj = new Car();
        $cars = $carsObj->getCarsForDropdown();

        $rentHistory = RentHistory::find($id);
        return view(
            'rentHistory.edit',
            compact('rentHistory', 'clients', 'cars')
        );
    }

    /**
     * * Update the specified rental data in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        request()->validate(
            [
                'client_id' => 'required',
                'car_id' => 'required',
                'rentDate' => 'required|date'
            ]
        );
        try {
            RentHistory::find($id)->update($request->all());
            return redirect()->route('rentHistory.index')
                ->with('success', 'Rental data updated successfully');
        } catch (QueryException $exception) {
            return redirect()->route('rentHistory.index');
        }
    }
}
