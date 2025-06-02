@extends('layout.main')
@section('title', 'jadwal')

@section('content')
<!--begin::Row-->
<div class="row">
        <div class="col-12">
        <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Tambah Jadwal</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('jadwal.store')}}" method="POST">
                      @csrf 
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Tahun Akademik</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('tahun_akademik') }}">
                        @error('tahun_akademik')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="singkatan" class="form-label">Semester</label>
                        <input type="text" class="form-control" name="singkatan" value="{{ old('semester') }}">
                        @error('semester')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                       <div class="mb-3">
                        <label for="dekan" class="form-label">Kelas</label>
                        <input type="text" class="form-control" name="dekan" value="{{ old('kelas') }}">
                        @error('kelas')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                        <select class="form-control" name="mata_kuliah_id">
                          @foreach ($mata_kuliah as $item)
                              <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                          </select>
                        @error('mata_kuliah_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        {{-- <div class="mb-3">
                        <label for="dosen_id" class="form-label">Dosen</label>
                        <select class="form-control" name="dosen_id">
                          @foreach ($dosen as $item)
                              <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                          </select>
                        @error('dosen_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div> --}}
                     
                     <div class="mb-3">
                        <label for="sesi_id" class="form-label">Sesi</label>
                        <select class="form-control" name="sesi_id">
                          @foreach ($sesi as $item)
                              <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                          </select>
                        @error('sesi_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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