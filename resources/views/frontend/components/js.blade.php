    <script src="{{ asset('frontend/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/templatemo.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    {{-- slick --}}
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>

     {{-- slider js --}}
<script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });

// Provinsi
    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then(response => response.json())
        .then(provinces => {
            var data = provinces;
            var tampung = '<option>Pilih Province</option>';
            data.forEach(element => {
                tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
            });
            document.getElementById('provinsi').innerHTML = tampung;
        });
</script>

{{-- Kota/Kabupaten --}}
<script>
    const selectProvinsi = document.getElementById('provinsi');

    selectProvinsi.addEventListener('change', (e) => {
        var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
            .then(response => response.json())
            .then(regencies => {
                var data = regencies;
                var tampung = '<option>Pilih Kota</option>';
                data.forEach(element => {
                    tampung += `<option data-kota="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById('kota').innerHTML = tampung;
            });
    });
</script>

{{-- Kecamatan --}}
<script>
    const selectKota = document.getElementById('kota');

    selectKota.addEventListener('change', (e) => {
        var kota = e.target.options[e.target.selectedIndex].dataset.kota;
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
            .then(response => response.json())
            .then(districts => {
                var data = districts;
                var tampung = '<option>Pilih Kecamatan</option>';
                data.forEach(element => {
                    tampung += `<option data-kec="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById('kecamatan').innerHTML = tampung;
            });
    })
</script>

{{-- Kelurahan --}}
<script>
    const selectKecamatan = document.getElementById('kecamatan');

    selectKecamatan.addEventListener('change', (e) => {
        var kecamatan = e.target.options[e.target.selectedIndex].dataset.kec;
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
            .then(response => response.json())
            .then(villages => {
                var data = villages;
                var tampung = '<option>Pilih Kelurahan</option>';
                data.forEach(element => {
                    tampung += `<option data-kel="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById('kelurahan').innerHTML = tampung;
            });
    })
</script>