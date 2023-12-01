@extends('layouts.admin.app', ['body_class' => '', 'title' => 'All Career Enquiries'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>All Career Enquiries</h1>
                
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl No:</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col" class="w-40">Description</th>
                                        <th scope="col" class="text-center">Date</th>
                                        <th scope="col" class="w-10 text-center">Resume</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($career[0]))
                                        @foreach ($career as $key=>$car)
                                            <tr>
                                                <td scope="row" class="text-center">{{ $key + 1 + ($career->currentPage() - 1) * $career->perPage() }}</td>
                                                <td>{{ $car->name }}</td>
                                                <td>{{ $car->email }}</td>
                                                <td>{{ $car->phone_number }}</td>
                                                <td>{{ $car->description }}</td>
                                                <td class="text-center">{{ date('d M,Y', strtotime($car->created_at)) }}</td>
                                                <td class="text-center">
                                                    <a target="_blank" href="{{ $car->getResume()}}"><img class="img-custom" src="{{ asset('assets/img/pdf_icon.png') }}"/></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-center">No data found </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $career->appends(request()->input())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
         
        </div>
    </div>
@endsection

@push('header')
@endpush

@push('footer')
<script type="text/javascript">

   
</script>
@endpush
