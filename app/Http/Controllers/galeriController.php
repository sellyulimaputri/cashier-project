<?php

namespace App\Http\Controllers;
use App\Models\galeri;
use Illuminate\Http\Request;

class galeriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboardGaleri(Request $req)
    {
        // if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'administrator') {
        //     return redirect('403')->with('error', 'login terlebih dahulu');
        // }
        // $user_id = $req->session()->get('user_id');
        $pageTitle = 'Galeri';
        $galeri = galeri::where('IsDelete',0)->paginate(100);
        return view('petugas.galeri.index', compact('pageTitle'), ['galeri' => $galeri]);
    }
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $pageTitle = 'Galeri';
        return view('petugas.galeri.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);
        galeri::create([
            'foto'=>$nama_file,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
        ]);
        return redirect('/dashboard-galeri')->with('pesan', 'Data Berhasil Disimpan');
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
        
        $pageTitle = 'Galeri';
        $galeri = galeri::where('idGaleri', $id)->first();
        return view('petugas.galeri.update', compact('pageTitle'), ['galeri' => $galeri]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $galeri = Galeri::where('idGaleri', $id)->first();
        
        // Check if a new photo is uploaded
        if ($request->hasFile('foto')) {
            // Delete the old photo
            $fileToDelete = 'images/' . $galeri->foto;
            if (file_exists($fileToDelete)) {
                unlink($fileToDelete);
            }

            // Upload and save the new photo
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'images';
            $file->move($tujuan_upload, $nama_file);

            // Update the galeri with the new photo
            $galeri->update([
                'foto' => $nama_file,
            ]);
        }

        // Update other fields even if there is no new photo
        $galeri->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/dashboard-galeri')->with('pesan', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galeri=galeri::where('idGaleri',$id)->first();
        // File::delete('images/'.$galeri->foto);
        $fileToDelete = 'images/' . $galeri->foto;

        // Check if the file exists before attempting to delete
        if (file_exists($fileToDelete)) {
            // Attempt to delete the file
            if (unlink($fileToDelete)) {
                // File deleted successfully
                echo 'File deleted successfully.';
            } else {
                // Unable to delete the file
                echo 'Unable to delete the file.';
            }
        } else {
            // File does not exist
            echo 'File does not exist.';
        }
        galeri::where('idGaleri',$id)->delete();
        
        return redirect('/dashboard-galeri')->with('success', 'Produk berhasil dihapus');
    }
}