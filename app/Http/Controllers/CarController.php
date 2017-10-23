<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CarController extends Controller
{
    /**
     * Display a cars listing
     *
     * @return View
     */
    public function index(): View
    {
        $cars = Car::latest('id')->paginate(5);
        return view('cars.index', compact('cars'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new car
     *
     * @return View
     */
    public function create(): View
    {
        return view('cars.create');
    }

    /**
     * Store a newly created cars in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
        ]);
        try {
            Car::create($request->all());
            return redirect()->route('cars.index')
                ->with('success', 'Car added successfully');
        } catch (QueryException $exception) {
            return redirect()->route('cars.index');
        }
    }

    /**
     * Show the form for editing the specified car
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        $car = Car::find($id);
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified car in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
        ]);

        try {
            Car::find($id)->update($request->all());
            return redirect()->route('cars.index')
                ->with('success', 'Car updated successfully');
        } catch (QueryException $exception) {
            return redirect()->route('cars.index');
        }
    }
}
