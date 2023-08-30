@extends('layouts.main')
@inject('carbon', 'Carbon\Carbon')

@section('title')
     Data Master Pelanggan
 @endsection

@push('styles')
    <style>
    </style>
@endpush

 @section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Master Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          {{-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol> --}}
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg">


          <div class="card card-primary card-outline">
            <div class="card-body">
             
                @foreach($stok as $stok)
                <form action={{ route('stokupdate', $stok->IdStok) }} method="POST" id="editstok">
                    @csrf
                    @method('put')
                    <div class="form-group">
<div class="row">
<div class="col-sm-6">
<div class="form-group">
  <label>Merk</label>
  <input type="text" class="form-control" id="MerkStok" placeholder="Merk" name="MerkStok" value="{{ $stok->MerkStok }}">
</div>
</div>

<div class="col-sm-6">
  <div class="form-group">
    <label>Type</label>
    <input type="text" class="form-control" id="TypeStok" placeholder="Type" name="TypeStok" value="{{ $stok->TypeStok }}">
  </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label>RAM</label>
      <input type="text" class="form-control" id="RamStok" placeholder="RAM" name="RamStok" value="{{ $stok->RamStok }}">
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      <label>ROM</label>
      <input type="text" class="form-control" id="RomStok" placeholder="ROM" name="RomStok" value="{{ $stok->RomStok }}">
    </div>
  </div>
</div>

<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label>IMEI</label>
        <input type="text" class="form-control" id="ImeiStok" placeholder="IMEI" name="ImeiStok" value="{{ $stok->ImeiStok }}">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>Harga Net</label>
        <input type="text" class="form-control" id="HargaNet" placeholder="HargaNet" name="HargaNet" value="{{ $stok->HargaNet }}">
      </div>
    </div>
  </div>

  {{-- <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label>Keterangan</label>
        <textarea type="text" class="form-control" id="KeteranganStok" placeholder="Keterangan" name="KeteranganStok" value="{{ $stok->KeteranganStok }}"></textarea>
      </div>
    </div>
  </div> --}}

</div>

<button type="submit" class="btn btn-default">Submit</button>
</form>
@endforeach
    
          </div><!-- /.card -->
        </div>

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
  @endsection

  @push('script')
  <script>
 $(document).ready(function () {
        $('#dt-basic-example').DataTable({
            "order": []
        });
    });

    $("#tambahtransaksimasuk").submit(function (event) {
        event.preventDefault();
        var formdata = new FormData(this);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/trxin/store',
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Swal.fire(
                    'Sukses!',
                    data.reason,
                    'success'
                ).then(() => {
                    location.replace("/trxin/index");
                });
            }
        });
    });
</script>
  @endpush