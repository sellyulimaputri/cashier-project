@extends('partials.navbar')
@section('section')
    {{-- start table pelanggan --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0" style="display: flex; justify-content: space-between; align-items: center;">
                    <h6>Daftar Penjualan</h6>
                    <div class="d-flex">
                        <input type="text" class="form-control" id="searchInputPelanggan" placeholder="Cari...">
                    </div>
                    <a class="btn bg-gradient-primary mt-3 w-12 rtl-only" href="/penjualan-create">
                        Tambah Penjualan
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID Penjualan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tanggal Penjualan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Total Harga Penjualan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Produk Penjualan</th>
                                    {{-- <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Status</th> --}}
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pelanggan Penjualan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Petugas Penjualan</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualan as $da)
                                    @if ($da->IsDelete == 0)
                                        <tr>
                                            <td>
                                                {{-- <div class="d-flex px-2 py-1">
                                                <div>
                                                    <h6 class="mb-0 text-sm">{{ $da->idProduk }}</h6>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $da->namaProduk }}</h6> --}}
                                                <p class="text-xs text-secondary mb-0">{{ $da->idPenjualan }}</p>
                                                {{-- </div>
                                            </div> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $da->tanggalPenjualan }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $da->totalHarga }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            {{-- <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-gradient-success">Online</span>
                            </td> --}}
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $da->produk->namaProduk }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $da->pelanggan->namaPelanggan }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $da->petugas->namaPetugas }}</span>
                                            </td>
                                            {{-- <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td> --}}
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter, table, tr, td, i, txtValue;
            filter = this.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                let found = false;
                for (let j = 0; j < td.length; j++) {
                    let cell = td[j];
                    if (cell) {
                        txtValue = cell.textContent || cell.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                if (found) {
                    tr[i].style.display = ""; // Menampilkan baris dalam tbody
                } else {
                    if (tr[i].parentNode.tagName !== 'THEAD') { // Hanya sembunyikan baris dalam tbody
                        tr[i].style.display = "none";
                    }
                }
            }
        });
    </script>
    {{-- end table --}}
@endsection
