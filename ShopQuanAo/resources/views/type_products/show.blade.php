@extends('admin.admin_layout')
@section('content')
{{--    {{$type->name_type}}--}}
{{--    {!!  $type->details_name_type !!}--}}
{{$type->name_type}}
@foreach($type->details as $check)
    {{$check->details_name_type}}
@endforeach
@endsection
