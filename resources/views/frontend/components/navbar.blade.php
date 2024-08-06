<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand logo h1" href="/">
            <img src="{{ asset('frontend/img/logo/logo-dmain.svg') }}" alt="" width="200" srcset="">
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
                        <a class="nav-link" href="{{ route('user.about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.blog.list') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.contact') }}">Contact</a>
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
            event.preventDefault(); 

            searchContainer.classList.toggle('d-none');
            
            if (!searchContainer.classList.contains('d-none')) {
                searchContainer.querySelector('input').focus();
            }
        });

        document.addEventListener('click', function (event) {
            if (!searchContainer.contains(event.target) && !searchToggle.contains(event.target)) {
                searchContainer.classList.add('d-none');
            }
        });
    });
</script>
