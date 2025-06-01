@extends('layout.main')
@section('title', 'mata_kuliah')

@section('content')
<!--begin::Row-->
<div class="row">
        <div class="col-12">
        <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Ubah Mata Kuliah</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('mata_kuliah.update' ,$mata_kuliah ->id)}}" method="POST">
                      @csrf 
                      @method('PUT')
                    <!--begin::Body-->
                    <div class="card-body">
                     <div class="mb-3">
                        <label for="singkatan" class="form-label">Kode Mata Kuliah</label>
                        <input type="text" name="kode_mk" class="form-control" value="{{ $mata_kuliah->kode_mk }}" required>
                        @error('kode_mk')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $mata_kuliah->nama }}">
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                     
                    <div class="mb-3">
                        <label for="nama" class="form-label">Program Studi</label>
                        <select name="prodi_id" class="form-control" required>
                            @foreach($prodis as $prodi)
                                <option value="{{ $prodi->id }}" {{ $prodi->id == $mata_kuliah->prodi_id ? 'selected' : '' }}>{{ $prodi->nama }}</option>
                            @endforeach
                        </select>
                    </div>
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