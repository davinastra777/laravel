@extends('layout.main')
@section('title', 'mata_kuliah')

@section('content')
<!--begin::Row-->
<div class="row">
        <div class="col-12">
        <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Tambah Mata Kuliah</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                <form action="{{ route('mata_kuliah.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Kode Mata Kuliah</label>
                    <input type="text" name="kode_mk" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Program Studi</label>
                    <select name="prodi_id" class="form-control" required>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                        @endforeach
                    </select>
                </div>
                      
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
        </div>
    </div>
    <!--end::Row-->

@endsection