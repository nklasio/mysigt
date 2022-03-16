@extends('layouts.dashboard')

@section('title', 'Users')

@section('content')
<section class="m-2">
    @livewire('users')
</section>

@endsection



@section('scripts')
@livewireScripts
@endsection
