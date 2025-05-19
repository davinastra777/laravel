@extends('layout.main')
@section('title', 'Mahasiswa')
@section('content')

<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List Mahasiswa</h3>
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
         <a href="{{ route('mahasiswa.create')}}" class="btn btn-primary"> Tambah </a>
            <table>
    <tr>
        <th>npm</th>
        <th>nama</th>
        <th>jk</th>
        <th>tanggal_lahir</th>
        <th>tempat_lahir</th>
        <th>asal_sma</th>
        <th>prodi_id</th>
        <th>foto</th>
    </tr>
@foreach ($mahasiswa as $item)
    <tr>
    <td>{{  $item->npm }} </td>
    <td>{{  $item->nama }} </td>
    <td>{{  $item->jk }} </td>
    <td>{{  $item->tanggal_lahir }} </td>
    <td>{{  $item->tempat_lahir}} </td>
    <td>{{  $item->asal_sma}} </td>
    <td>{{  $item->prodi->nama }}</td>
    <td>{{  $item->foto}} </td>
</tr>
</table>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!--end::Row-->


@endforeach
@endsection

