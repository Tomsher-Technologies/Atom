@extends('layouts.admin.app', ['body_class' => '', 'title' => 'All Contact Enquiries'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>All Contact Enquiries</h1>
                
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
                                        <th scope="col">Sl No:</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col" class="w-40">Message</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($contact[0]))
                                        @foreach ($contact as $key=>$con)
                                            <tr>
                                                <td scope="row">{{ $key + 1 + ($contact->currentPage() - 1) * $contact->perPage() }}</td>
                                                <td>{{ $con->name }}</td>
                                                <td>{{ $con->email }}</td>
                                                <td>{{ $con->phone_number }}</td>
                                                <td>{{ $con->message }}</td>
                                                <td>{{ date('d M,Y', strtotime($con->created_at)) }}</td>
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
                                {{ $contact->appends(request()->input())->links('pagination::bootstrap-4') }}
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
