@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Downloaded Users'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Downloaded Users</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ Session::has('down_last_url') ? Session::get('down_last_url') : route('admin.downloads.index') }}"
                    class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">Back</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
               
            </div>
        </div>

        <div class="row">
            
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        
                        <div class="card-body">
                            <h4 class="card-title">{{ $downloads->title ?? '' }}</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl. No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col" class="text-center">Downloaded Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($users[0]))
                                        @foreach ($users as $key => $us)
                                            <tr>
                                                <th class="text-center" scope="row">{{ $key + 1 + ($users->currentPage() - 1) * $users->perPage() }}</th>
                                                <td>{{ $us->name }}</td>
                                                <td>{{ $us->email }}</td>
                                                <td>{{ $us->phone }}</td>
                                                <td class="text-center">{{ date('d M, Y',strtotime($us->created_at)) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center">No Data Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $users->appends(request()->input())->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                        
                    </div>
                </div>
            
        </div>
    </div>
@endsection

@push('header')
@endpush
