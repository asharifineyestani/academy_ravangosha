@extends('layouts.eduport.master_dashboard')
@section('main')
    <div class="card bg-transparent border rounded-3">
        <div class="card-header bg-transparent border-bottom">
            <h3 class="mb-0">لیست دوره های من</h3>
        </div>
        <x-dashboard.my-courses/>

    </div>
@endsection
