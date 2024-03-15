@extends('layouts.eduport.master_dashboard')
@section('main')
    <livewire:management.videos :request="$request" />
@endsection
