@extends("layouts.app");
@section('sidebar')
@parent
<div>Some topics</div>
@endsection
@section('content' )
<h2>Content</h2>
<livewire:counter></livewire:counter>
{{-- @livewire('counter') --}}
@endsection

