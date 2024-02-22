@extends('partials.navbar')
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
                <h6>Tambah Penjualan</h6>
                <form class="row g-3" id="jumlahh" action="/dashboard-penjualan" method="post">
                    @csrf
                    {{-- <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Stok Batik</label>
                        <input type="text" class="form-control" id="inputPassword4" name="stok_batik" required>
                    </div> --}}
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Tanggal Penjualan</label>
                        <input type="date" class="form-control" id="inputAddress" placeholder="12/01/2024"
                            name="tanggal_penjualan" required>
                    </div>
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Nama Petugas</label>
                        <select id="inputState" class="form-select" name="id_petugas" required>
                            @foreach ($petugas as $da)
                                @if ($da->IsDelete == 0)
                                    <option value="{{ $da->idPetugas }}">{{ $da->namaPetugas }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Nama Pelanggan</label>
                        <select id="inputState" class="form-select" name="id_pelanggan" required>
                            @foreach ($pelanggan as $da)
                                @if ($da->IsDelete == 0)
                                    <option value="{{ $da->idPelanggan }}">{{ $da->namaPelanggan }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Nama Produk</label>
                        <select id="inputState" class="form-select" name="id_produk" required>
                            @foreach ($produk as $da)
                                @if ($da->IsDelete == 0)
                                    <option value="{{ $da->idProduk }}">
                                        {{ $da->namaProduk }} - {{ $da->hargaProduk }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Harga Produk</label>
                        <input type="text" class="form-control" id="harga-produk" name="harga_produk" placeholder="">
                    </div>

                    {{-- <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="inputCity" name="harga_produk"
                                    placeholder="Harga Produk">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="inputCity" name="jumlah"
                                    placeholder="Jumlah Barang">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="inputCity" name="total_produk"
                                    placeholder="Harga Total">
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-md-12">
                        <label for="id_produk">Pilih Produk</label>
                        <select name="id_produk[]" class="form-control" id="id_produk" multiple required>
                            @foreach ($produk as $da)
                                <option value="{{ $da->idProduk }}" data-harga="{{ $da->hargaProduk }}">
                                    {{ $da->namaProduk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="row" id="jumlah">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga_keseluruhan" class="form-label">Harga Keseluruhan</label>
                        <input type="text" name="harga_keseluruhan" id="harga_keseluruhan" class="form-control" readonly>
                    </div> --}}


                    {{-- <div class="col-12">
                        <label for="formFile" class="form-label">Total Harga Keseluruhan</label>
                        <input class="form-control" type="text" name="total-harga" placeholder="200000">
                    </div> --}}
                    {{-- <div class="col-12">
                        <label for="inputAddress2" class="form-label">Stok Produk</label>
                        <input type="text" class="form-control" name="harga_batik" id="inputAddress2" placeholder="400">
                    </div> --}}
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
                        <button type="submit" class="btn bg-gradient-primary">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- <div class="card mb-4 w-50 ms-3">
            <div class="card-body">
                <h6>Hasil Penjualan</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Jumlah Barang</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody id="penjualanTableBody">
                        <!-- Data akan ditambahkan di sini -->
                        <!-- Tampilkan data hasil penjualan dari database atau variabel -->
                        <?php
                        // session_start();
                        // if (!empty($_SESSION['penjualan'])) {
                        //     foreach ($_SESSION['penjualan'] as $penjualan) {
                        //         echo '<tr>';
                        //         echo "<td>{$penjualan['nama_produk']}</td>";
                        //         echo "<td>{$penjualan['jumlah_barang']}</td>";
                        //         echo "<td>{$penjualan['total_harga']}</td>";
                        //         echo '</tr>';
                        //     }
                        // }
                        ?>
                    </tbody>
                </table>
                <div class="col-12">
                    <button type="submit" class="btn bg-gradient-primary">Tambah Barang</button>
                </div>
                <h6>Total Harga Keseluruhan</h6>
                <div class="col-md-12">
                    <input type="text" class="form-control" id="inputCity" name="total-harga" placeholder="2">
                </div>
                <div class="col-md-3 mt-3">
                    <button type="submit" class="btn bg-gradient-primary">Bayar</button>
                </div>
            </div>
        </div> --}}
    </div>
    <script>
        
    </script>

    <!-- Set variabel $action -->
    <?php $action = 'add'; ?>
@endsection
