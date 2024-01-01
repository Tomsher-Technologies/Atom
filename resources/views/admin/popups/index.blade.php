@extends('layouts.admin.app', ['body_class' => '', 'title' => 'popups'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>popup</h1>
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
            @if ($popups)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" class="text-center">Image</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($popups[0]))
                                        @foreach ($popups as $key=>$popup)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 + ($popups->currentPage() - 1) * $popups->perPage() }}</td>
                                                <td>{{ $popup->name }}</td>
                                                <td class="text-center">
                                                    <img class="popup-image" src="{{ $popup->getImage() }}" alt="">
                                                </td>
                                                <td class="text-center">
                                                    <b>{!! $popup->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.popups.edit', $popup) }}"
                                                        class="btn btn-secondary mb-1">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No data found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="aiz-pagination float-right">
                                {{ $popups->appends(request()->input())->links('pagination::bootstrap-5') }}
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
