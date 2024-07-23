@extends('backend.Layouts')

@section('content')

{{-- css --}}
<style>
    .card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: 1rem;
    }
</style>
{{-- end css --}}

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" /> --}}

<div class="container">
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-15">Status 
                            @if ($findInvoice->status == 'waiting')
                                <span class="badge bg-warning font-size-12 ms-2">{{ $findInvoice->status }}</span>
                            @elseif ($findInvoice->status == 'rejected')
                                <span class="badge bg-danger font-size-12 ms-2">{{ $findInvoice->status }}</span>
                            @else
                                <span class="badge bg-success font-size-12 ms-2">{{ $findInvoice->status }}</span>
                            @endif
                        </h4>
                        <div class="mb-4">
                           <h2 class="mb-1 text-muted">Axlir Parfume</h2>
                        </div>
                        <div class="text-muted">
                            <p class="mb-1">Alamat Axlir</p>
                            <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>Detail Alamat Axlir</p>
                            <p><i class="uil uil-phone me-1"></i> No hp kantor axlir</p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-16 mb-3">Billed To:</h5>
                                <h5 class="font-size-15 mb-2">{{ $findInvoice->cust_name }}</h5>
                                <p class="mb-1">{{ $findInvoice->alamat }}</p>
                                <p class="mb-1">{{ $findInvoice->alamat_detail }}</p>
                                <p>+{{ $findInvoice->noHp }}</p>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                    <p>{{ date('d-M-y', strtotime($findInvoice->created_at)) }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    
                    <div class="py-2">
                        <h5 class="font-size-15">Order Summary</h5>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No.</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th class="text-end" style="width: 120px;">Total</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                {{-- @foreach ($getProduct as $product) --}}
                                    <tr>
                                        <th scope="row">01</th>
                                        <td>
                                            <div>
                                                @foreach ($getProduct as $product)
                                                    <h5 class="text-truncate font-size-14 mb-1">{{ $product->product_name }}</h5>
                                                @endforeach
                                                <p class="text-muted mb-0">{{ $findInvoice->size }}</p>
                                            </div>
                                        </td>
                                        <td>@currency($findInvoice->price)</td>
                                        <td>{{ $findInvoice->qty }}</td>
                                        <td class="text-end">@currency($findInvoice->total)</td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                        <td class="text-end">@currency($findInvoice->total)</td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">
                                            Discount :</th>
                                        <td class="border-0 text-end">Rp0</td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                        <td class="border-0 text-end"><h4 class="m-0 fw-semibold">@currency($findInvoice->total)</h4></td>
                                    </tr>
                                    <!-- end tr -->
                                {{-- @endforeach --}}
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end table responsive -->
                        <div class="d-print-none mt-4">
                            <div class="float-end">
                                <form action="{{ route('admin.invoice.retur', $findInvoice->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger fs-2 fw-semibold lh-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card-refund">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 19h-6a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5" />
                                            <path d="M3 10h18" />
                                            <path d="M7 15h.01" />
                                            <path d="M11 15h2" />
                                            <path d="M16 19h6" />
                                            <path d="M19 16l-3 3l3 3" />
                                        </svg>
                                        Return
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
</div>
@endsection