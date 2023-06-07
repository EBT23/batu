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
                <h5 class="card-title">Pemesanan</h5>
                <div class="table-responsive">
                  <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="zero_config_length"><label>Show <select name="zero_config_length" aria-controls="zero_config" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="zero_config_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="zero_config"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 202.48px;">Nama Barang</th>
                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 322.48px;">Jumlah Berat</th>
                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 130.742px;">Barang In</th>
                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 130.742px;">Barang Out</th>
                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 130.742px;">Status Pemesanan</th>
                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 127.773px;">Total Harga</th>
                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 130.773px;">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pemesanan as $item)    
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                                {{ $item->nama_barang }}
                            </td>
                            <td>{{ $item->jumlah_berat }}</td>
                            <td>
                                @if ($item->barang_in == null)
                                    <p>-</p>
                                @else
                                    {{ $item->barang_in }}</td>
                                @endif
                               
                            <td>
                                @if ($item->barang_out == null)
                                     <p>-</p>
                                @else
                                    {{ $item->barang_out }}</td>
                                @endif
                            </td>
                            <td>
                                @if ($item->status_pemesanan === "Selesai" )
                                    <span class="badge rounded-pill bg-success"><b>Selesai</b></span>
                                @elseif ($item->status_pemesanan === "Proses")
                                    <span class="badge rounded-pill bg-warning"><b>Proses</b></span>
                                @else
                                    <span class="badge rounded-pill bg-danger"><b>Pending</b></span>
                                @endif
                                
                            </td>
                            <td>Rp. {{ number_format($item->total_harga) }}</td>
                                <td>
                                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                        <i class="fas fa-pencil-alt"> Edit</i>
                                      </button>
                                      <!-- Modal -->
                                      <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="editModalLabel">Edit Pemesanan</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{ route('update.pemesanan',['id'=>$item->id]) }}" method="post">
                                              @csrf
                                              <div class="row">
                                                <div class="col-12">
                                                  <label for="barang_in" class="form-label">Barang In</label>
                                                  <div class="input-group mb-3">
                                                    <input type="time" class="form-control" id="barang_in" name="barang_in"value="{{ $item->barang_in }}" aria-describedby="basic-addon3">
                                                  </div>
                                                  <label for="barang_out" class="form-label">Barang Out</label>
                                                  <div class="input-group mb-3">
                                                    <input type="time" class="form-control" id="barang_out" name="barang_out"value="{{ $item->barang_out }}" aria-describedby="basic-addon3">
                                                  </div>
                                                  <label for="status_pemesanan" class="form-label">Status Pemesanan</label>
                                                  <div class="input-group mb-3">
                                                    <select name="status_pemesanan" id="status_pemesanan" class="form-control">
                                                        <option value="Pending" {{ $item->status_pemesanan === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="Proses"  {{ $item->status_pemesanan === 'Proses'  ? 'selected' : '' }}>Proses</option>
                                                        <option value="Selesai" {{ $item->status_pemesanan === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="zero_config_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="zero_config_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="zero_config_previous">
                                            <a href="#" aria-controls="zero_config" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                        </li>
                                        <li class="paginate_button page-item active">
                                            <a href="#" aria-controls="zero_config" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="zero_config" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="zero_config" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="zero_config" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="zero_config" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="zero_config" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                                        </li>
                                        <li class="paginate_button page-item next" id="zero_config_next">
                                            <a href="#" aria-controls="zero_config" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>
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