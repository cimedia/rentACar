<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a clients listing
     *
     * @return View
     */
    public function index(): View
    {
        $clients = Client::latest('id')->paginate(5);
        return view('clients.index', compact('clients'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new client
     *
     * @return View
     */
    public function create(): View
    {
        return view('clients.create');
    }

    /**
     * Store a newly created clients in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
        ]);

        try {
            Client::create($request->all());
            return redirect()->route('clients.index')
                ->with('success', 'Client added successfully');
        } catch (QueryException $exception) {
            return redirect()->route('clients.index');
        }
    }

    /**
     * Show the form for editing the specified client
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified client in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
        ]);

        try {
            Client::find($id)->update($request->all());
            return redirect()->route('clients.index')
                ->with('success', 'Client updated successfully');
        } catch (QueryException $exception) {
            return redirect()->route('clients.index');
        }
    }
}
