<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use Illuminate\Http\Request;

class petugasAdministratorController extends Controller
{
    
    public function dashboardPetugas(Request $req)
    {
        // if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'administrator') {
        //     return redirect('403')->with('error', 'login terlebih dahulu');
        // }
        // $user_id = $req->session()->get('user_id');
        $pageTitle = 'Petugas';
        $petugas = petugas::where('IsDelete',0)->paginate(100);
        return view('administrator.petugas.index', compact('pageTitle'), ['petugas' => $petugas]);
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
        $pageTitle = 'Petugas';
        return view('administrator.petugas.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = new petugas();
        $data->namaPetugas = $request->nama_petugas;
        $data->alamatPetugas = $request->alamat_petugas;
        $data->teleponPetugas = $request->telepon_petugas;
        $data->save();
    
        return redirect('/dashboard-petugas-administrator')->with('pesan', 'Data batik Berhasil Disimpan');
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
