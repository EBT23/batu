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
        <div class="card text-white bg-primary mb-3" style="max-width: 40rem; height: 20rem;">
            <div class="card-header"><b>{{ $title }}</b></div>
            <div class="card-body">
            <h5 class="card-title">{{ $profile->name }}</h5>
            <p class="card-text">{{ $profile->email }}</p>
            <p class="card-text">
                @if ($profile->jk == 'L' )
                Laki-Laki
                @else
                Perempuan
                @endif
            </p>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal{{ $profile->id }}">
                <i class="fas fa-pencil-alt"> Edit</i>
              </button>
              <!-- Modal -->
              <div class="modal fade" id="editModal{{ $profile->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-dark" id="editModalLabel">Edit Profile</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('edit.profile',['id'=>$profile->id]) }}" method="post">
                      @csrf
                      <div class="row">
                        <div class="col-12">
                          <label for="name" class="form-label text-dark">Nama</label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" id="name" name="name"value="{{ $profile->name }}" aria-describedby="basic-addon3">
                          </div>
                          <label for="email" class="form-label text-dark">Email</label>
                          <div class="input-group mb-3">
                            <input type="email" class="form-control" id="email" name="email"value="{{ $profile->email }}" aria-describedby="basic-addon3">
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