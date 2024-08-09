@extends('backend.Layouts')

@section('content')
<div class="row">
  <div class="col-lg-8 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <div class="mb-3 mb-sm-0">
            <h5 class="card-title fw-semibold">Sales Overview</h5>
          </div>
          <div>
            <select class="form-select">
              <option value="1">{{ \Carbon\Carbon::now()->format('Y-m') }}</option>
            </select>
          </div>
        </div>
        <div id="salesChart"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="row">
      <div class="col-lg-12">
        <!-- Yearly Breakup -->
        <div class="card overflow-hidden">
          <div class="card-body p-4">
            <h5 class="card-title mb-9 fw-semibold">Yearly Earnings</h5>
            <div class="row align-items-center">
              <div class="col-8">
                @foreach ($yearEarnings as $year)
                  <h4 class="fw-semibold mb-3">@currency($year->total)</h4>
                  <div class="d-flex align-items-center">
                    <div class="me-4">
                      <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                      <span class="fs-2">{{ $year->year }}</span>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-center">
                  <div id="breakup"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <!-- Monthly Earnings -->
        <div class="card">
          <div class="card-body">
            <div class="row alig n-items-start">
              <div class="col-8">
                <h5 class="card-title mb-9 fw-semibold"> Montly Earnings </h5>
                @foreach ($montlyEarnings as $montly)
                  <h4 class="fw-semibold mb-3">@currency($montly->total)</h4>
                  <div class="d-flex align-items-center pb-1">
                    {{-- <span
                      class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                      <i class="ti ti-arrow-down-right text-danger hidden"></i>
                    </span> --}}
                    <p class="text-dark me-1 fs-3 mb-0">Bulan :</p>
                    <p class="fs-3 mb-0">{{ $montly->month }}</p>
                @endforeach
                </div>
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-end">
                  <div
                    class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                    <i class="ti ti-currency-dollar fs-6"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="earning"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <div class="mb-4">
          <h5 class="card-title fw-semibold">Total Pengiriman</h5>
        </div>
        <ul class="timeline-widget mb-0 position-relative mb-n5">
          <li class="timeline-item d-flex position-relative overflow-hidden">
            <div class="timeline-badge-wrap d-flex flex-column align-items-center">
              <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
              <span class="timeline-badge-border d-block flex-shrink-0"></span>
            </div>
            <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Pengiriman Dikirim 
              <p class="text-dark d-block fw-normal">{{ $delivered }}</p>
            </div>
          </li>
          <li class="timeline-item d-flex position-relative overflow-hidden">
            <div class="timeline-badge-wrap d-flex flex-column align-items-center">
              <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
              <span class="timeline-badge-border d-block flex-shrink-0"></span>
            </div>
            <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Pengiriman Menunggu 
              <p class="text-dark d-block fw-normal">{{ $pending }}</p>
            </div>
          </li>
          <li class="timeline-item d-flex position-relative overflow-hidden">
            <div class="timeline-badge-wrap d-flex flex-column align-items-center">
              <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
              <span class="timeline-badge-border d-block flex-shrink-0"></span>
            </div>
            <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Pengiriman Batal 
              <p class="text-dark d-block fw-normal">{{ $cancelled }}</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-8 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Product Terlaris</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">No</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Product</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Terjual</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              @if ($mostSoldProducts->isEmpty())
                  <span class="fs-14 fw-200 text-center">
                    Data Belum Tersedia
                  </span>
              @else
                @foreach ($mostSoldProducts as $product)
                  <tr>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">1</h6></td>
                    <td class="border-bottom-0">
                      @if ($product->product)
                        <h6 class="fw-semibold mb-1">{{ $product->product->product_name }}</h6>
                        <span class="fw-normal">{{ $product->product->size }}</span>
                      @else
                        <span class="fw-semibold mb-1">Product not available</span>
                      @endif                          
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary rounded-3 fw-semibold">{{ $product->total_qty }}</span>
                      </div>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection