@extends('admin.master')
@section('title','Show Property INquery')
@section('page_title','Show Property Inquery')
@section('body')

<div class="row">
    <div class="col-md-12">
        <ul>
            <li>Name: <span>{{ $data->first_name }} {{ $data->last_name }}</span></li>
            <li>email: <span>{{ $data->email }}</span></li>
            <li>phone: <span>{{ $data->phone }}</span></li>
            <li>Property Name: <span>{{ $data->property->title }}</span></li>
            <li>How Find US: <span>{{ $data->how_to_reach_us }}</span></li>
            <li>Location: <span>{{ $data->location }}</span></li>
            <li>Build Time Duretion: <span>{{ $data->time_duretion }}</span></li>
            <li>Message: <span> <p>{{ $data->message }}</p> </span></li>
        </ul>
    </div>
</div>
@endsection