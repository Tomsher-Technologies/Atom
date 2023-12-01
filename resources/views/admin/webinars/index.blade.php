@extends('layouts.admin.app', ['body_class' => '', 'title' => 'All Webinars'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>All Webinars</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.webinars.create') }}"
                        class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">ADD NEW
                        Webinar</a>
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
            @if ($webinars)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl. No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col" class="text-center">Webinar Date</th>
                                        <th scope="col" class="text-center">Booking Count</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($webinars as $key=>$webinar)
                                        <tr>
                                            <th scope="row">{{ $key + 1 + ($webinars->currentPage() - 1) * $webinars->perPage() }}</th>
                                            <td>{{ $webinar->title }}</td>
                                            <td class="text-center">{{ date('d M, Y h:i a',strtotime($webinar->webinar_date)) }}
                                            </td>
                                            <td class="text-center">{{ count($webinar->bookings) }}</td>
                                            <td class="text-center">
                                                <b>{!! $webinar->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.webinars.edit', $webinar->id) }}"
                                                    class="btn btn-secondary mb-1">Edit</a>
                                                <a href="{{ route('admin.webinar-bookings', $webinar->id) }}"
                                                        class="btn btn-primary mb-1">Bookings</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="aiz-pagination float-right">
                                {{ $webinars->appends(request()->input())->links('pagination::bootstrap-5') }}
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
