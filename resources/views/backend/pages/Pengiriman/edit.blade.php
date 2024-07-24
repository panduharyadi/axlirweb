@extends('backend.Layouts')

@section('title', 'Validate Confirm Transaction')

@section('content')
<h5 class="card-title fw-semibold mb-4">Forms</h5>
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.update.pengiriman', $pengiriman->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input class="form-control" type="text" name="status" id="status" value="{{ $pengiriman->status }}">
      </div>
      <div class="mb-3">
        <label for="custName" class="form-label">Customer Name</label>
        <input class="form-control" type="text" name="custName" id="custName" value="{{ $pengiriman->cust_name }}">
      </div>
      <div class="mb-3">
        <label for="noHp" class="form-label">No Handphone</label>
        <input class="form-control" type="text" name="noHp" id="noHp" value="{{ $pengiriman->noHp }}">
      </div>
      <input type="hidden" name="alamat" value="{{ $pengiriman->alamat }}">
      <input type="hidden" name="detailAlamat" value="{{ $pengiriman->alamat_detail }}">
      <input type="hidden" name="qty" value="{{ $pengiriman->qty }}">
      <div class="mb-3">
        <label for="total" class="form-label">Total Belanja</label>
        <input type="text" class="form-control" name="total" id="total" value="{{ $pengiriman->total }}">
      </div>
      <input type="submit" name="btnkirim" value="Kirim" class="btn btn-outline-success">
      <input type="submit" name="btnbatal" value="Batal" class="btn btn-outline-danger">
    </form>
  </div>
</div>
@endsection