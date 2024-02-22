@extends('partials.navbar')
@section('section')
    <div class="pb-0" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="d-flex ms-3">
            <input type="text" class="form-control" id="searchInput" placeholder="Cari...">
        </div>
        <a class="btn bg-gradient-primary mt-3 w-12 me-3 rtl-only" href="/galeri-create">
            Tambah Produk
        </a>
    </div>
    <div class="card-container">
        @foreach ($galeri as $da)
            @if ($da->IsDelete == 0)
                <div class="card" style="width: 18rem;">
                    <div class="file p-2" style="height: 12rem;">
                        <img style="width: 100%; height: 100%; object-fit: cover; object-position: center;"
                            src="{{ url('/images/' . $da->foto) }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $da->judul }}</h5>
                        {{-- <p class="card-text">Deskripsi : {{ $da->deskripsi }}</p> --}}
                        <div class="edit-delete-icons mt-3">
                            <a href="{{ route('galeri.destroy', $da->idGaleri) }}" class="">
                                <img class="w-10 me-3" src="../media/icons8-delete-48.png" />
                            </a>
                            <span>
                                <a href="{{ route('galeri.edit', $da->idGaleri) }}" class="">
                                    <img class="w-10 me-3" src="../media/icons8-edit-100.png" />
                                </a>
                            </span>
                            <span>
                                <a href="" class="open-popup" data-src="/images/{{ $da->foto }}"
                                    data-deskripsi="{{ $da->deskripsi }}">
                                    <img class="w-10" src="../media/icons8-eye-90.png" />
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="modal" id="popupModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" id="modalContent">
                    <!-- Modal content will be displayed here -->
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> --}}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all elements with the class "open-popup"
            var popupTriggers = document.querySelectorAll('.open-popup');

            // Add click event listener to each element
            popupTriggers.forEach(function(popupTrigger) {
                popupTrigger.addEventListener('click', function(event) {
                    // Prevent the default behavior of the anchor tag
                    event.preventDefault();

                    // Get the values of data-src and data-deskripsi attributes
                    var dataSrc = popupTrigger.getAttribute('data-src');
                    var dataDeskripsi = popupTrigger.getAttribute('data-deskripsi');

                    // Create modal content with the data
                    var modalContent = '<img src="' + dataSrc +
                        '" class="img-fluid" style="width :100rem;" alt="Image">';
                    modalContent += '<p>Deskripsi : ' + dataDeskripsi + '</p>';

                    // Create a Bootstrap modal
                    var modal = new bootstrap.Modal(document.getElementById('popupModal'));

                    // Set the modal content
                    document.getElementById('modalContent').innerHTML = modalContent;

                    // Show the modal
                    modal.show();
                });
            });
        });
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter, cards, card, cardTitle, i, txtValue;
            filter = this.value.toUpperCase();
            cards = document.getElementsByClassName("card");

            for (i = 0; i < cards.length; i++) {
                card = cards[i];
                cardTitle = card.querySelector(".card-title");
                if (cardTitle) {
                    txtValue = cardTitle.textContent || cardTitle.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        card.style.display = ""; // Menampilkan card
                    } else {
                        card.style.display = "none"; // Sembunyikan card
                    }
                }
            }
        });
    </script>
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: center; */
        }

        .card {
            width: 18rem;
            margin: 10px;
            /* Margin antar kartu */
        }
    </style>
@endsection
