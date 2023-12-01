@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Bookings'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Webinar Bookings</h1>
                <div class="text-zero top-right-button-container">
                    
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
               
            </div>
        </div>

        <div class="row">
            @if ($bookings)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        
                        <div class="card-body">
                            <h4 class="card-title">{{ $webinar->title ?? '' }}</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl. No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col" class="text-center">Booking Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $book)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->email }}</td>
                                            <td>{{ $book->phone }}</td>
                                            <td class="text-center">{{ date('d M, Y',strtotime($book->created_at)) }}
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
