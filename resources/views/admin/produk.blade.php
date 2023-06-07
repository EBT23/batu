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
        <div class="row">
       
        </div>
        <form action="{{ route('produk.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Data Produk</h4>
                        <div class="form-group row">
                          <label for="nama_barang" class="col-sm-3 text-end control-label col-form-label">Nama Barang</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label
                            for="harga"
                            class="col-sm-3 text-end control-label col-form-label"
                            >Harga</label
                          >
                          <div class="col-sm-9">
                            <input
                              type="number"
                              class="form-control"
                              id="harga" name="harga"
                              placeholder="Masukkan Harga"
                            />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="keterangan" class="col-sm-3 text-end control-label col-form-label">Keterangan</label>
                          <div class="col-sm-9">
                            <input
                              type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="gambar" class="col-sm-3 text-end control-label form-label">Gambar</label>
                          <div class="col-sm-9">
                            <input class="form-control form-control-sm" name="gambar" id="gambar" type="file">
                          </div>
                        </div>
                      </div>    
                    </div> 
                    <div>
                        <button type="submit" class="btn btn-success mb-3">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Basic Datatable</h5>
              <div class="table-responsive">
                <table
                  id="zero_config"
                  class="table table-striped table-bordered"
                >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Harga</th>
                      <th>Keterangan</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($produk as $index=> $p )
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $p->nama_barang }}</td>
                        <td>{{ $p->harga }}</td>
                        <td>{{ $p->keterangan }}</td>
                        <td style="width: auto">
                          <img src="{{ asset('upload/produk/' . $p->gambar . '') }}" alt=""
                                    style="width: 55px;height: 45px;">
                        </td>
                        <td class="d-flex">
                          <span>
                            <form action="hapusproduk/{{$p->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger m-md-1" type="submit"><i class="fas fa-trash-alt"> Hapus</i></button>
                            </form>
                          </span>
                          <span>
                            <button type="button" class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $p->id }}">
                              <i class="fas fa-pencil-alt"> Edit</i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{ route('edit.produk',['id'=>$p->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                      <div class="col-12">
                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                        <div class="input-group mb-3">
                                          <input type="text" class="form-control" id="nama_barang" name="nama_barang"value="{{ $p->nama_barang }}" aria-describedby="basic-addon3">
                                        </div>
                                        <label for="harga" class="form-label">Harga</label>
                                        <div class="input-group mb-3">
                                          <input type="number" class="form-control" id="harga" name="harga" value="{{ $p->harga }}" aria-describedby="basic-addon3">
                                        </div>
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <div class="input-group mb-3">
                                          <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $p->keterangan }}" aria-describedby="basic-addon3">
                                        </div>
                                        <label for="gambar" class="form-label">Gambar</label>
                                        <div class="input-group mb-3">
                                          @if ($p->gambar)
                                            <img src="{{ asset('upload/produk/' . $p->gambar . '') }}" alt="Gambar Produk"style="width: 55px;height: 45px;">
                                          @endif
                                            <input class="form-control form-control-sm" name="gambar" value="{{ $p->gambar }}" id="gambar" type="file">
                                        </div>
                                          
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
                           
                          </span>
                        </td>
                    </tr>
                    @endforeach
                   
                </table>
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