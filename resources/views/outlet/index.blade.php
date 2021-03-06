@extends('layouts.app2')

@section('title', 'Outlet')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        @yield('title')
    </h1>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
                <a href="{{ route('outlet.create') }}" class="btn btn-outline-primary btn-sm ml-5">Tambah Outlet</a>
            </div>
            @if(session()->has('msg'))
            <div class="card-alert alert alert-{{ session()->get('type') }}" id="message" style="border-radius: 0px !important">
                @if(session()->get('type') == 'success')
                    <i class="fe fe-check mr-2" aria-hidden="true"></i>
                @else
                    <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
                @endif
                    {{ session()->get('msg') }}
            </div>
            @endif
            <div class="table-responsive">

                <table class="table card-table table-hover table-vcenter text-nowrap">
                    <thead>
                    <tr>
                        <th class="w-1">#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telp</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($outlet as $index => $item)
                        <tr>
                            <td><span class="text-muted">{{ $index+1 }}</span></td>
                            <td>{{ $item->name }}</td>
                            <td>
                                {{ $item->address }}
                            </td>
                            <td>
                                {{ $item->phone }}
                            </td>
                            <td class="text-center">
                                <a class="icon" href="{{ route('outlet.edit', $item->id) }}" title="edit item">
                                    <i class="fe fe-edit"></i>
                                </a>
                                <a class="icon btn-delete" href="javascript:void(0)" data-id="{{ $item->id }}" title="delete item">
                                    <i class="fe fe-trash"></i>
                                </a>
                                <form action="{{ route('outlet.destroy', $item->id) }}" method="POST" id="form-{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="d-flex">
                    <div class="ml-auto mb-0">
                        {{ $outlet->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/delete.js') }}"></script>
@endsection
