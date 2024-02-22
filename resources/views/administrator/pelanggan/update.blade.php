@extends('partials.navbarAdministrator')
@section('section')
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="container">
        <div class="card mb-4 w-50">
            <div class="card-body">
                <h6>Edit Pelanggan</h6>
                <form class="row g-3" action="{{ route('pelanggan.update', ['id' => $pelanggan->idPelanggan]) }}"
                    method="post">
                    @csrf
                    @method('put')
                    {{-- <div class="col-md-6">
                        <label for="inputState" class="form-label">Kategori Batik</label>
                        <select id="inputState" class="form-select" name="kategori_batik" required>
                            <option selected>Batik Tulis</option>
                            <option>Batik Printing</option>
                            <option>Batik Cap</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Stok Batik</label>
                        <input type="text" class="form-control" id="inputPassword4" name="stok_batik" required>
                    </div> --}}
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="inputAddress" value="{{ $pelanggan->namaPelanggan }}"
                            name="nama_pelanggan" required>
                    </div>
                    <div class="col-12">
                        <label for="formFile" class="form-label">Alamat Pelanggan</label>
                        <input class="form-control" type="text" name="alamat_pelanggan"
                            value="{{ $pelanggan->alamatPelanggan }}">
                        {{-- <input class="form-control" type="file" name="foto"> --}}
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Telepon Pelanggan</label>
                        <input type="text" class="form-control" name="telepon_pelanggan" id="inputAddress2"
                            value="{{ $pelanggan->teleponPelanggan }}">
                    </div>
                    {{-- <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">State</label>
                        <select id="inputState" class="form-select">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div> --}}
                    <div class="col-12">
                        <button type="submit" class="btn bg-gradient-primary">Edit Pelanggan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Set variabel $action -->
    <?php $action = 'update'; ?>
@endsection
