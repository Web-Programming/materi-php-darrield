@extends('layout.master')

@section('title', "Halaman List Prodi")

@section('content')
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Program Studi</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ url("/") }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Program Studi</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!-- Default box -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Program Studi</h3>
                    <div class="card-tools">
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-collapse"
                        title="Collapse"
                      >
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                      >
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <a href="{{ url('prodi/create') }}" class="btn btn-success">Buat Prodi Baru</a>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Prodi</th>
                          <th>Kode Prodi</th>
                          <th>Logo</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($listprodi as $prodi)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $prodi->nama }}</td>
                          <td>{{ $prodi->kode_prodi }}</td>
                          <td>{{ $prodi->logo }}</td>
                          <td>
                            <form action="{{ url('/prodi/' . $prodi->id) }}" method="post" style="display:inline">
                              @csrf
                              @method("DELETE")
                              <a href="{{ url('/prodi/' . $prodi->id)}}" class="btn btn-link">Detail</a>
                              <a href="{{ url('/prodi/' . $prodi->id . '/edit') }}" class="btn btn-link">Edit</a>
                              <button type="submit" class="btn btn-link" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">Footer</div>

@endsection

