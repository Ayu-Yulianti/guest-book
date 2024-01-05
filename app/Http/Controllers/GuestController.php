<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Auth;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function index()
    {
        $guests = Guest::all();
        if (Auth::check()) {
            return view('guest.index', compact('guests'));
        } else {
            return view('welcome', compact('guests'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'pesan' => 'required',
        ]);

        $guest = new Guest();
        $guest->nama = $request->nama;
        $guest->email = $request->email;
        $guest->no_telepon = $request->no_telepon;
        $guest->pesan = $request->pesan;
        $guest->save();
        return redirect('/')
            ->with('success', 'Data berhasil dibuat!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guest $guest)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();
        return redirect()->route('guest.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
