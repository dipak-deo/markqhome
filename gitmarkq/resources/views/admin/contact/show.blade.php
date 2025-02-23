@extends('admin.master')
@section('title','Show Contact')
@section('page_title','Show Contact')
@section('body')

<div class="row">
    <div class="col-md-12">
        <ul>
            <li>Name: <span>{{ $data->first_name }} {{ $data->last_name }}</span></li>
            <li>email: <span>{{ $data->email }}</span></li>
            <li>phone: <span>{{ $data->phone }}</span></li>
            <li>Who Are You: <span>{{ $data->who_are_you }}</span></li>
            <li>Message: <span> <p>{{ $data->message }}</p> </span></li>
        </ul>
    </div>
</div>
@endsection