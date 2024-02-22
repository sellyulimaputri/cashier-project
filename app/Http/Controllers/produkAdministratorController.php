<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class produkAdministratorController extends Controller
{
    public function dashboardProduk(Request $req)
    {
        // if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'administrator') {
        //     return redirect('403')->with('error', 'login terlebih dahulu');
        // }
        // $user_id = $req->session()->get('user_id');
        $pageTitle = 'Produk';
        $produk = produk::where('IsDelete',0)->paginate(100);
        return view('administrator.produk.index', compact('pageTitle'), ['produk' => $produk]);
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
        $pageTitle = 'Produk';
        return view('administrator.produk.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = new produk();
        $data->namaProduk = $request->nama_produk;
        $data->hargaProduk = $request->harga_produk;
        $data->stokProduk = $request->stok_produk;
        $data->save();
    
        return redirect('/dashboard-produk-administrator')->with('pesan', 'Data batik Berhasil Disimpan');
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
        
        $pageTitle = 'Produk';
        $produk = produk::where('idProduk', $id)->first();
        return view('administrator.produk.update', compact('pageTitle'), ['produk' => $produk]);
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
        
        $data = produk::where('idProduk', $id)->first();
        $data->IsDelete = 1;
        $data->save();

        return redirect('/dashboard-produk-administrator')->with('success', 'Produk berhasil dihapus');
    }
}