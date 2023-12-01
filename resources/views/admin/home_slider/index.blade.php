@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Home Sliders'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Home Sliders</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.home_slider.create') }}" class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">ADD NEW
                        Home Slider</a>
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
            @if ($home_sliders)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl No:</th>
                                        <th scope="col">Image</th>
                                        <th scope="col" class="text-center">Sort Order</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($home_sliders as $slider)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                <img src="{{ $slider->getImage() }}" alt="" height="80px;">
                                            </td>
                                            <td class="text-center">{{ $slider->sort_order }}</td>
                                            <td class="text-center">
                                                <b>{!! $slider->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.home_slider.edit', $slider) }}"
                                                    class="btn btn-secondary mb-1">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('header')
@endpush
