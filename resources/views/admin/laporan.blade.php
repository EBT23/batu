@extends('layouts.base', ['title' => 'Dashboard - Administrator - Laravel 9'])

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        @if (Session::has('success'))
          <div class="alert alert-success text-success">
              {{ Session::get('success') }}
          </div>
        @endif
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $title }}</h5>
                <div>
                    <a href="{{ route('export.excel') }}" type="button" class="btn btn-success mb-3"> <i class="fas fa-download"> Print</i></a>
                </div>
              
              <div class="table-responsive">
                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="zero_config_length"><label>Show <select name="zero_config_length" aria-controls="zero_config" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="zero_config_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="zero_config"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 202.48px;">Nama Barang</th>
                      <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 149.102px;">Jumlah Berat</th>
                      <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 149.102px;">Harga</th>
                      <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 322.48px;">Nama Pemesan</th>
                      <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 61.1719px;">Status Pemesanan</th>
                      <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 130.742px;">Tanggal Pembelian</th>
                      <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 127.773px;">Total Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($laporan as $item)
                        <tr role="row" class="odd">
                          <td class="sorting_1">{{ $item->nama_barang }}</td>
                          <td>{{ $item->jumlah_berat }} Ton</td>
                          <td>{{ $item->harga }}</td>
                          <td>{{ $item->name }}</td>
                          <td> 
                            <span class="badge rounded-pill bg-success">
                              <b>{{ $item->status_pemesanan }}</b>
                            </span>
                          </td>
                          <td>{{ date_format(date_create($item->created_at),'d-M-Y') }}</td>
                          <td>{{ $item->total_harga }}</td>
                        </tr> 
                    @endforeach
                   </tbody>
                  <tfoot>
                    <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                  </tfoot>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="zero_config_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="zero_config_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="zero_config_previous"><a href="#" aria-controls="zero_config" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="zero_config" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="zero_config_next"><a href="#" aria-controls="zero_config" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
              </div>
            </div>
          </div>
            
          

    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
@endsection