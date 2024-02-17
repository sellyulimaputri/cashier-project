<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\petugas;
use App\Models\pelanggan;
use App\Models\penjualan;
use Illuminate\Http\Request;

class petugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboardPetugas(Request $req)
    {
        // if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'administrator') {
        //     return redirect('403')->with('error', 'login terlebih dahulu');
        // }
        // $user_id = $req->session()->get('user_id');
        
        $pelanggan = pelanggan::where('IsDelete',0)->paginate(100);
        $penjualan = penjualan::where('IsDelete',0)->paginate(100);
        $produk = produk::where('IsDelete',0)->paginate(100);
        $petugas = petugas::where('IsDelete',0)->paginate(100);

        $data = [
            'produk' => $produk,
            'penjualan' => $penjualan,
            'petugas' => $petugas,
            'pelanggan' => $pelanggan,
        ];
        
        return view('petugas.index', $data);
    }
    
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}