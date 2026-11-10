<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.index', [
        'title' => 'Client',
        'clients' => Client::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create', ['title' => 'Client Create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi inputan dari form create client
        $validated = $request->validate([
        'name' => ['required', 'max:255'],
        'gender' => ['required'],
        'email' => ['required', 'unique:clients'],
        'number' => ['required', 'unique:clients'],
        'address' => ['required'],
    ],  
    [
        // Pesan error yang akan ditampilkan jika inputan tidak sesuai dengan validasi
        'name.required' => 'Nama Pelanggan harus diisi.',
        'name.max' => 'Nama Pelanggan tidak boleh lebih dari 255 karakter.',
        'gender.required' => 'Gender harus diisi.',
        'email.required' => 'Email harus diisi.',
        'email.unique' => 'Email sudah digunakan.',
        'number.required' => 'No. Pelanggan harus diisi.',
        'number.unique' => 'No. Pelanggan sudah digunakan.',
        'number.numeric' => 'No. Pelanggan harus berupa angka.',
        'address.required' => 'Alamat harus diisi.',
    ]);

    Client::create($validated);

    // Setelah berhasil menyimpan data, redirect ke halaman index client dengan pesan sukses
    return to_route('client.index')->with('success', 'Data Pelanggan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
