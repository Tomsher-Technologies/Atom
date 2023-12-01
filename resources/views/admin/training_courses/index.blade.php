@extends('layouts.admin.app', ['body_class' => '', 'title' => 'All Training Courses'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>All Training Courses</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.training.course-create') }}"
                        class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">ADD NEW
                    Training Courses</a>
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
            @if ($courses)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl No.</th>
                                        <th scope="col">Course Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col" class="text-center">Sort Order</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $key => $cour)
                                        <tr>
                                            <th scope="row" class="text-center">
                                                {{ $key + 1 + ($courses->currentPage() - 1) * $courses->perPage() }}
                                            </th>
                                            <td>{{ $cour->name ?? '' }}</td>
                                            <td>{{ $cour->training_category->name ?? ''}}</td>
                                            <td class="text-center">{{ $cour->sort_order ?? '' }}</td>
                                            <td class="text-center">
                                                <b>{!! $cour->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.training.course-edit', $cour->id) }}"
                                                    class="btn btn-secondary mb-1">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $courses->appends(request()->input())->links('pagination::bootstrap-5') }}
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
