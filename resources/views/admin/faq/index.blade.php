@extends('layouts.admin.app', ['body_class' => '', 'title' => 'FAQ'])
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>FAQ</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.faq.create') }}" class="btn btn-primary btn-lg top-right-button mr-1">CREATE NEW FAQ</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="rpw">
            <div class="col-12">
                <x-status />
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                    <table class="table" id="faqtable">
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th class="">Title</th>
                                <th  class="text-center">Sort Order</th>
                                <th  class="text-center">Status</th>
                                <th  class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($faqs)
                                @php $i=0; @endphp
                                @foreach($faqs as $faq)
                                    @php $i++; @endphp
                                    <tr id="row_{{ $faq->id }}">
                                        <td>{{ $i }}</td>
                                        <td> {{ $faq->title }}</td>
                                        <td class="text-center">
                                            {{ $faq->sort_order }}
                                        </td>
                                        <td class="text-center">
                                            <b>{!! $faq->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-info" href="{{ route('admin.faq.edit', $faq->id) }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                  
@endsection
@push('header')

@endpush
@push('footer')


<script>
  
 </script>
@endpush