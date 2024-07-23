<script src="{{ asset('backend/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('backend/js/app.min.js') }}"></script>
  <script src="{{ asset('backend/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('backend/js/dashboard.js') }}"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

  {{-- script --}}
  <script>
    let table = new DataTable('#myTable');

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

<script>
  var chartData = {!! json_encode($chartData) !!};
  var chartOptions = {
    series: [
    { name: "Pendapatan Perhari:", data: Object.values(chartData) },
    { name: "Expense this month:", data: [280, 250, 325, 215, 250, 310, 280, 250] },
  ],

  chart: {
    type: "bar",
    height: 345,
    offsetX: -15,
    toolbar: { show: true },
    foreColor: "#adb0bb",
    fontFamily: 'inherit',
    sparkline: { enabled: false },
  },


  colors: ["#5D87FF", "#49BEFF"],


  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "35%",
      borderRadius: [6],
      borderRadiusApplication: 'end',
      borderRadiusWhenStacked: 'all'
    },
  },
  markers: { size: 0 },

  dataLabels: {
    enabled: false,
  },


  legend: {
    show: false,
  },


  grid: {
    borderColor: "rgba(0,0,0,0.1)",
    strokeDashArray: 3,
    xaxis: {
      lines: {
        show: false,
      },
    },
  },

  xaxis: {
    type: "category",
    categories: Object.keys(chartData),
    labels: {
      style: { cssClass: "grey--text lighten-2--text fill-color" },
    },
  },


  yaxis: {
    show: true,
    min: 0,
    max: 1000000,
    tickAmount: 4,
    labels: {
      style: {
        cssClass: "grey--text lighten-2--text fill-color",
      },
    },
  },
  stroke: {
    show: true,
    width: 3,
    lineCap: "butt",
    colors: ["transparent"],
  },


  tooltip: { theme: "light" },

  responsive: [
    {
      breakpoint: 600,
      options: {
        plotOptions: {
          bar: {
            borderRadius: 3,
          }
        },
      }
    }
  ]
  };

  var chart = new ApexCharts(document.querySelector("#salesChart"), chartOptions);
  chart.render();
</script>