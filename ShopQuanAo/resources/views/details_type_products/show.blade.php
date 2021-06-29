@extends('admin.admin_layout')
@section('content')

{{--    {{$details->details_name_type}}--}}
{{--    {{$details->type->name_type}}--}}

    @foreach($details->products as $check)
     {{$check->name_product}}
    @endforeach
@endsection
