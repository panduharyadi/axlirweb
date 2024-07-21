@extends('backend.Layouts')

@section('title', 'Validate Confirm Transaction')

@section('content')
<h5 class="card-title fw-semibold mb-4">Forms</h5>
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.transaction.update', $confirms->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input class="form-control" type="text" name="status" id="status" value="{{ $confirms->status }}">
      </div>
      <div class="mb-3">
        <label for="custName" class="form-label">Customer Name</label>
        <input class="form-control" type="text" name="custName" id="custName" value="{{ $confirms->cust_name }}">
      </div>
      <div class="mb-3">
        <label for="noHp" class="form-label">No Handphone</label>
        <input class="form-control" type="text" name="noHp" id="noHp" value="{{ $confirms->noHp }}">
      </div>
      <input type="hidden" name="alamat" value="{{ $confirms->alamat }}">
      <input type="hidden" name="detailAlamat" value="{{ $confirms->alamat_detail }}">
      <input type="hidden" name="qty" value="{{ $confirms->qty }}">
      <div class="mb-3">
        <label for="total" class="form-label">Total Belanja</label>
        <input type="text" class="form-control" name="total" id="total" value="{{ $confirms->total }}">
      </div>
      <input type="submit" name="btnaccept" value="Accept" class="btn btn-outline-success">
      <input type="submit" name="btnreject" value="Reject" class="btn btn-outline-danger">
    </form>
  </div>
</div>
@endsection