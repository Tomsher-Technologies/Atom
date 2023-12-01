@extends('layouts.admin.app', ['body_class' => '', 'title' => 'All Reviews'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>All Reviews</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.reviews.create') }}"
                        class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">ADD NEW
                    Review</a>
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
            @if ($reviews)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" class="text-center">Sort Order</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $key => $rev)
                                        <tr>
                                            <th scope="row" class="text-center">
                                                {{ $key + 1 + ($reviews->currentPage() - 1) * $reviews->perPage() }}
                                            </th>
                                            <td>{{ $rev->name ?? '' }}</td>
                                            <td class="text-center">{{ $rev->sort_order ?? '' }}</td>
                                            <td class="text-center">
                                                <b>{!! $rev->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.reviews.edit', $rev->id) }}"
                                                    class="btn btn-secondary mb-1">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $reviews->appends(request()->input())->links('pagination::bootstrap-5') }}
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
