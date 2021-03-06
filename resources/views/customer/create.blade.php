@extends('layouts.app2')

@section('title', 'Tambah Customer')

@section('content')
<div class="row">
    <div class="col-8">
        <form action="{{ route('customer.store') }}" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Nama customer</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama customer" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="address" rows="6" placeholder="Alamat customer">{{ old('address') }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-label">Gender</div>
                            <div class="custom-controls-stacked">
                              <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="gender" value="L">
                                <span class="custom-control-label">Laki-Laki</span>
                              </label>
                              <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="gender" value="P">
                                <span class="custom-control-label">Perempuan</span>
                              </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">No Telp.</label>
                            <input type="text" class="form-control" name="phone" placeholder="Telp customer" value="{{ old('phone') }}" required>
                        </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <div class="d-flex">
                    <a href="{{ url()->previous() }}" class="btn btn-link">Batal</a>
                    <button type="submit" class="btn btn-primary ml-auto">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
