<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;

class pelangganAdministratorController extends Controller
{
    public function dashboardPelanggan(Request $req)
    {
        // if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'administrator') {
        //     return redirect('403')->with('error', 'login terlebih dahulu');
        // }
        // $user_id = $req->session()->get('user_id');
        
        $pageTitle = 'Pelanggan';
        $pelanggan = pelanggan::where('IsDelete',0)->paginate(100);
        return view('administrator.pelanggan.index', compact('pageTitle'), ['pelanggan' => $pelanggan]);
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
        $pageTitle = 'Pelanggan';
        return view('administrator.pelanggan.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = new pelanggan();
        $data->namaPelanggan = $request->nama_pelanggan;
        $data->alamatPelanggan = $request->alamat_pelanggan;
        $data->teleponPelanggan = $request->telepon_pelanggan;
        $data->save();
    
        return redirect('/dashboard-pelanggan-administrator')->with('pesan', 'Data batik Berhasil Disimpan');
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
        $pageTitle = 'Pelanggan';
        $pelanggan = pelanggan::where('idPelanggan', $id)->first();
        return view('administrator.pelanggan.update', compact('pageTitle'), ['pelanggan' => $pelanggan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        // $this->validate($request, [
        //     'namaPelanggan' => 'required',
        //     'alamatPelanggan' => 'required',
        //     'teleponPelanggan' => 'required'
        // ]);
        
        $data = pelanggan::where('idPelanggan', $id)->first();
        $data->namaPelanggan = $request->nama_pelanggan;
        $data->alamatPelanggan = $request->alamat_pelanggan;
        $data->teleponPelanggan = $request->telepon_pelanggan;
        $data->save();

        return redirect('/dashboard-pelanggan-administrator')->with('pesan', 'Data Pelanggan Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = pelanggan::where('idPelanggan', $id)->first();
        $data->IsDelete = 1;
        $data->save();

        return redirect('/dashboard-pelanggan-administrator')->with('success', 'Produk berhasil dihapus');
    }
}