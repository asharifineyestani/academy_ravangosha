@extends('layouts.eduport.master_dashboard')
@section('main')
    <livewire:management.courses :request="$request" />
@endsection
