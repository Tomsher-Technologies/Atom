@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Downloads'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Downloads</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.downloads.create') }}"
                        class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">ADD NEW
                        File</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="rpw">
            <div class="col-12">
                <x-status />
                <x-errors />
            </div>
        </div>

        <div class="row">
            @if ($downloads)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl No.</th>
                                        <th scope="col">Title</th>
                                        {{-- <th scope="col" class="text-center">Image</th> --}}
                                        <th scope="col" class="text-center w-10">File</th>
                                        <th scope="col" class="text-center">Sort Order</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($downloads[0]))
                                        @foreach ($downloads as $key=>$down)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 + ($downloads->currentPage() - 1) * $downloads->perPage() }}</td>
                                                <td>{{ $down->title }}</td>
                                                {{-- <td class="text-center">
                                                    <img class="client-image" src="{{ $down->getImage() }}" alt="">
                                                </td> --}}
                                                <td class="text-center">
                                                    <a target="_blank" href="{{ $down->getFile() }}">
                                                        <img class="img-custom" src="{{ asset('assets/img/pdf_icon.png') }}"/>
                                                    </a>
                                                </td>
                                                <td class="text-center">{{ $down->sort_order }}</td>
                                                <td class="text-center">
                                                    <b>{!! $down->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.downloads.edit', $down->id) }}" class="btn btn-secondary mb-1">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">No data found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="aiz-pagination float-right">
                                {{ $downloads->appends(request()->input())->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('header')
@endpush
