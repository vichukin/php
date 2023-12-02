@extends("layouts.app");
@section('sidebar')
@parent
<div>Some topics</div>
@endsection
@section('content' )
<h2>Content</h2>
<form action="{{url('topic')}}" method="post">
    @csrf
    <label  class="form-label">
        Title:
        <input type="text" name="Title" class="form-control"
        class="@error('Title') is-invalid @enderror"></label>
        @error('Title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-success">Create</button>
</form>
@endsection
