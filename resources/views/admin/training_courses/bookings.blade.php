@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Course Registrations'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Course Registrations</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ Session::has('last_url') ? Session::get('last_url') : route('admin.training.courses') }}"
                    class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">Back</a>
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
           
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $course->name ?? '' }}</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col" class="text-center">Registration Type</th>
                                        <th scope="col" class="text-center">Price</th>
                                        <th scope="col" class="text-center">Register Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($bookings[0]))
                                        @foreach ($bookings as $key => $book)
                                            <tr style="background: aliceblue;">
                                                <th scope="row" class="text-center">
                                                    {{ $key + 1 + ($bookings->currentPage() - 1) * $bookings->perPage() }}
                                                </th>
                                                <td>{{ $book->name ?? '' }}</td>
                                                <td>{{ $book->email ?? '' }}</td>
                                                <td>{{ $book->phone ?? '' }}</td>
                                                <td class="text-center">
                                                    {{ ($book->type == 'group') ? 'Group' : 'Individual'; }}
                                                </td>
                                                <td class="text-center">{{ $book->price ?? '' }}</td>
                                                <td class="text-center">{{ date('d-m-Y', strtotime($book->created_at)) }}</td>
                                            </tr>
                                            @if ($book->children)
                                                @foreach ($book->children as $child)
                                                    <tr>
                                                        <th scope="row" class="text-center">
                                                        
                                                        </th>
                                                        <td>{{ $child->name ?? '' }}</td>
                                                        <td>{{ $child->email ?? '' }}</td>
                                                        <td>{{ $child->phone ?? '' }}</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">No Registration Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $bookings->appends(request()->input())->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>
@endsection

@push('header')
@endpush
