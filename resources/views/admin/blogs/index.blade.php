@extends('layouts.admin.app', ['body_class' => '', 'title' => 'All Blogs'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>All Blogs</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.blogs.create') }}"
                        class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">ADD NEW
                        Blog</a>
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
            @if ($blogs)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl. No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col" class="text-center">Blog Date</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $key=> $blog)
                                        <tr>
                                            <th scope="row">{{ $key + 1 + ($blogs->currentPage() - 1) * $blogs->perPage() }}</th>
                                            <td>{{ $blog->title }}</td>
                                            <td class="text-center">{{ date('d M, Y',strtotime($blog->blog_date)) }}</td>
                                            <td class="text-center">
                                                <b>{!! $blog->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                    class="btn btn-secondary mb-1">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $blogs->appends(request()->input())->links('pagination::bootstrap-5') }}
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
