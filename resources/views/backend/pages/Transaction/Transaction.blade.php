@extends('backend.Layouts')

@section('title', 'Transaction')

@section('content')

<div class="containe">
    <a href="{{ route('admin.transaction.ecommerce') }}" class="btn btn-primary">Add Transaction</a>
</div>

<div class="card container mb-3 mt-4">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Nama Customer</th>
                <th>Nama Produk</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Cetak</th>
                <th>Status</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->cust_name }}</td>
                    <td>{{ $transaction->product_name }}</td>
                    <td>@currency($transaction->total)</td>
                    <td>{{ date('d-M-y', strtotime($transaction->created_at)) }}</td>
                    <td>
                        {{-- phone --}}
                        <a href="https://wa.me/{{ $transaction->noHp }}" target="_blank" class="btn btn-success fs-2 fw-semibold lh-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-phone">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                            </svg>
                            Blast
                        </a> |
                        {{-- print --}}
                        <a href="{{ route('admin.resi', $transaction->id) }}" class="btn btn-primary fs-2 fw-semibold lh-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-printer">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                            </svg>
                            Print
                        </a> |
                        <a href="{{ route('admin.invoice', $transaction->id) }}" class="btn btn-info fs-2 fw-semibold lh-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-info-octagon">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12.802 2.165l5.575 2.389c.48 .206 .863 .589 1.07 1.07l2.388 5.574c.22 .512 .22 1.092 0 1.604l-2.389 5.575c-.206 .48 -.589 .863 -1.07 1.07l-5.574 2.388c-.512 .22 -1.092 .22 -1.604 0l-5.575 -2.389a2.036 2.036 0 0 1 -1.07 -1.07l-2.388 -5.574a2.036 2.036 0 0 1 0 -1.604l2.389 -5.575c.206 -.48 .589 -.863 1.07 -1.07l5.574 -2.388a2.036 2.036 0 0 1 1.604 0z" />
                                <path d="M12 9h.01" />
                                <path d="M11 12h1v4h1" />
                            </svg>
                            Info
                        </a>
                    </td>
                    <td>
                        @if ($transaction->status == "waiting")
                            <a href="{{ route('admin.transaction.edit', $transaction->id) }}" class="btn btn-warning fs-2 fw-semibold lh-sm">waiting</a>
                        @elseif($transaction->status == "Reject")
                            <a href="{{ route('admin.transaction.edit', $transaction->id) }}" class="btn btn-danger fs-2 fw-semibold lh-sm">{{ $transaction->status }}</a>
                        @elseif($transaction->status == "Retur")
                            <a href="{{ route('admin.transaction.edit', $transaction->id) }}" class="btn btn-danger fs-2 fw-semibold lh-sm">{{ $transaction->status }}</a>
                        @else
                            <a href="{{ route('admin.transaction.edit', $transaction->id) }}" class="btn btn-success fs-2 fw-semibold lh-sm">{{ $transaction->status }}</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
    </table>
</div>

@endsection