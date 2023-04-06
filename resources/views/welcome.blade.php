@extends('layouts.base')

@section('title')
    Dashboard
@endsection

@section('badge')
    @parent
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection