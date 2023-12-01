@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Reels'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Reels</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.reels.create') }}"
                        class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">ADD NEW
                        REEL</a>
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
            @if ($reels)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col" class="text-center">Image</th>
                                        <th scope="col" class="text-center">Sort Order</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reels as $key=>$reel)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $key + 1 + ($reels->currentPage() - 1) * $reels->perPage() }}</th>
                                            <td>{{ $reel->title }}</td>
                                            <td class="text-center">
                                                <img class="custom-image" src="{{ $reel->getImage() }}" alt="">
                                            </td>
                                            <td class="text-center">{{ $reel->sort_order }}</td>
                                            <td class="text-center">
                                                <b>{!! $reel->is_active == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.reels.edit', $reel) }}"
                                                    class="btn btn-secondary mb-1">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $reels->appends(request()->input())->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('header')
    <style>
       
    </style>
@endpush
