@extends('backend.Layouts')

@section('title', 'Add Transaction From Ecommerce')

@section('content')
    <div class="container">
        <h3 class="fw-semibold mb-3">Tambah Transaksi Dari Ecommerce</h3>
    </div>

        <div class="card">
            <div class="card-body">
              <form action="{{ route('admin.transaction.ecommerce.store') }}" method="post">
              @csrf
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="product_name" class="form-label">Nama Customer</label>
                    <input type="text" class="form-control" name="custName" id="product_name">
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="product_name" class="form-label">Nomor Telpon Customer</label>
                    <input type="text" class="form-control" name="noHp" id="product_name">
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="size" class="form-label">Product Name</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="idProduct">
                      <option selected disabled>Select Product</option>
                      @foreach ($products as $product)
                        <option value="{{$product->id  }}">{{ $product->product_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col">
                  <label for="size" class="form-label">Size</label>
                  <select class="form-select mb-3" aria-label="Default select example" name="size">
                    <option selected disabled>Select Size</option>
                    <option value="50ml">50ml</option>
                    <option value="30ml">30ml</option>
                  </select>
                </div>
              </div>

              <div class="mb-3">
                <label for="qty" class="form-label">Qty</label>
                <input type="text" class="form-control" name="qty" id="qty">
              </div>
              
              <div class="row">
                <div class="col">
                <select class="form-select mb-3" aria-label="Default select example" id="provinsi" name="provinsi">
                  <option selected disabled>Pilih Provinsi</option>
                  <option value=""></option>
                </select>
                </div>
                <div class="col">
                  <select class="form-select mb-3" aria-label="Default select example" id="kota" name="kota">
                    <option selected disabled>Pilih Kota</option>
                    <option value=""></option>
                  </select>
                </div>
              </div>  
                
              <div class="row">
                <div class="col">
                  <select class="form-select mb-3" aria-label="Default select example" id="kecamatan" name="kecamatan">
                      <option selected disabled>Pilih Kecamatan</option>
                      <option value=""></option>
                  </select>
                </div>
                <div class="col">
                  <select class="form-select mb-3" aria-label="Default select example" id="kelurahan" name="kelurahan">
                      <option selected disabled>Pilih Kelurahan</option>
                      <option value=""></option>
                  </select>
                </div>
              </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Berikan alamat lengkap seperti : No rumah, nama jalan, kode pos dll."
                    id="address" name="detailAlamat"></textarea>
                <label for="address"></label>
            </div>

                <label for="size" class="form-label">Ecommerce</label>
                <select class="form-select mb-3" aria-label="Default select example" name="ecommerce">
                  <option selected disabled>Select Ecommerce</option>
                  <option value="Shopee">Shopee</option>
                  <option value="Tokped">Tokped</option>
                  <option value="Lazada">Lazada</option>
                  <option value="Tokped">Tokped</option>
                  <option value="Tiktok">Tiktok</option>
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
    
@endsection