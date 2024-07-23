<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            <img src="{{ asset('frontend/img/logo/logo_axlir.png') }}" alt="" width="120" srcset="">
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                
                <a class="nav-icon d-none d-lg-inline" href="#" id="search-toggle">
                    <i class="fa fa-fw fa-search text-dark"></i>
                </a>

                <!-- Input pencarian -->
                <div id="search-container" class="d-none position-relative">
                    <input type="text" id="search-input" class="form-control" placeholder="Cari...">
                </div>

                {{-- <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                </a> --}}
            </div>
        </div>

    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var searchToggle = document.getElementById('search-toggle');
        var searchContainer = document.getElementById('search-container');

        searchToggle.addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah default action dari link

            // Toggle kelas d-none untuk menampilkan atau menyembunyikan input
            searchContainer.classList.toggle('d-none');
            
            // Fokus pada input ketika ditampilkan
            if (!searchContainer.classList.contains('d-none')) {
                searchContainer.querySelector('input').focus();
            }
        });

        // Opsional: Sembunyikan input pencarian ketika klik di luar
        document.addEventListener('click', function (event) {
            if (!searchContainer.contains(event.target) && !searchToggle.contains(event.target)) {
                searchContainer.classList.add('d-none');
            }
        });
    });
</script>
