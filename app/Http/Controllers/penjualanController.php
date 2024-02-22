<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\petugas;
use App\Models\pelanggan;
use App\Models\penjualan;
use Illuminate\Http\Request;

class penjualanController extends Controller
{
    public function dashboardPenjualan(Request $req)
    {
        // if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'administrator') {
        //     return redirect('403')->with('error', 'login terlebih dahulu');
        // }
        // $user_id = $req->session()->get('user_id');
        $pageTitle = 'Penjualan';
        $penjualan = penjualan::where('IsDelete',0)->paginate(100);
        return view('petugas.penjualan.index', compact('pageTitle'), ['penjualan' => $penjualan]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $pelanggan = pelanggan::where('IsDelete',0)->paginate(100);
        $produk = produk::where('IsDelete',0)->paginate(100);
        $petugas = petugas::where('IsDelete',0)->paginate(100);
        
        $data = [
            'produk' => $produk,
            'petugas' => $petugas,
            'pelanggan' => $pelanggan,
        ];
        
        
        $pageTitle = 'Penjualan';
        return view('petugas.penjualan.create', compact('pageTitle'), $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new penjualan();
        $data->tanggalPenjualan = $request->tanggal_penjualan;
        $data->totalHarga = $request->harga_produk;
        $data->idPelanggan = $request->id_pelanggan;
        $data->idProduk = $request->id_produk;
        $data->idPetugas = $request->id_petugas;
        $data->save();
        
    
        return redirect('/dashboard-penjualan')->with('pesan', 'Data batik Berhasil Disimpan');
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
