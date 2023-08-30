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
             <a href="" class="btn btn-success btn-xs" title="Tambah Data Baru" role="button" data-toggle="modal" data-target="#modaltambahdata"><i class="fas fa-plus-circle"></i></a><br><br>
             
              <table id="dt-basic-example" class="table table-bordered table-responsive table-hover table-striped">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Tgl</th>
                                                        <th>IMEI</th>
                                                        <th>Merk</th>
                                                        <th>Type</th>
                                                        <th>RAM / ROM</th>
                                                        <th>Harga Masuk</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                                </thead>
                                                <tbody height="10px">
                                                    @php $i=1 @endphp
                                                @foreach($trxin as $in)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $carbon::parse($in->TglMasuk)->format('d/m/Y H:i:s') }}</td>
                                                        <td>{{ $in->ImeiMasuk}}</td>
                                                        <td>{{ $in->MerkMasuk }}</td>
                                                        <td>{{ $in->TypeMasuk }}</td>
                                                        <td>{{ $in->RamMasuk.'/'.$in->RomMasuk }}</td>
                                                        <td>@currency( $in->HargaMasuk )</td>
                                                        <td></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
            </div>

                                                        {{-- Modal Tambah Data --}}
                                              <div class="modal fade" id="modaltambahdata">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Transaksi Masuk</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
    	<form id="tambahtransaksimasuk" method="post">
		{{ csrf_field() }}

        <div class="form-group">
            <input type="text" name="ImeiMasuk" class="form-control form-control-sm" placeholder="IMEI">
          </div>

    <div class="form-group">
      <input type="text" name="MerkMasuk" required="required" class="form-control form-control-sm" placeholder="Merk">
    </div>
    
    <div class="form-group">
      <input type="text" name="TypeMasuk" required="required" class="form-control form-control-sm" placeholder="Type">
    </div>

    <div class="form-group">
      <input type="text" name="RamMasuk" class="form-control form-control-sm" placeholder="RAM">
    </div>

    <div class="form-group">
        <input type="text" name="RomMasuk" class="form-control form-control-sm" placeholder="ROM">
      </div>

      <div class="form-group">
        <input type="text" name="HargaMasuk" class="form-control form-control-sm" placeholder="Harga Masuk">
      </div>

      <div class="form-group">
        <input type="text" name="HargaNet" class="form-control form-control-sm" placeholder="Harga Jual">
      </div>

      <div class="form-group">
        <input type="textarea" name="KeteranganMasuk" class="form-control form-control-sm" placeholder="Keterangan">
      </div>

        <button class="btn btn-primary" type="submit">Tambah</button>
	</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    
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