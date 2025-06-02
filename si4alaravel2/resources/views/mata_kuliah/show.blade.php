@extends('layout.main')
@section('title','mata_kuliah')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>List Mata Kuliah</b></h3>
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
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Kode Mata Kuliah</th>
                    <td>{{ $mata_kuliah->kode_mk}}</td>
                <tr>
                    <th>Nama</th>
                    <td>{{ $mata_kuliah->nama}}</td>
                </tr>
                <tr>
                    <th>Prodi</th>
                    <td>{{ $mata_kuliah->prodi->nama}}</td>
                </tr>
            </table>
        </div>
      </div>
        <!-- /.card -->
    </div>
</div>
<!--end::Row-->
@endsection