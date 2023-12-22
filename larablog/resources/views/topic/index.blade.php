@extends("layouts.app")
@section('sidebar')
@parent
<div class="col-3">
    <div class="navbar-nav" >
        @foreach($array as $elem)
            <a href="?topic={{$elem->Id}}" class="nav-link text-center   border border-1 border-black {{ $elem->Id == $currentId ? 'bg-secondary text-white' : '' }}">{{ $elem->Title }}</a>
        @endforeach
    </div>
</div>
@endsection
@section('content' )
    @if($currentId!=null)
    <h3 class="text-center">{{$topic->Title}}</h3>
    {{-- <h4>{{dd($test)}}</h4> --}}
    <hr>

        <form>
            <div class="d-flex">
            <input type="hidden" name="topic" value="{{$currentId}}">
            <div class="ms-auto d-flex"><h4 class="text-center m-auto me-2" >Title:</h4><input type="text" value="{{$search!=null?$search:""}}" class="form-control" name="search"></div>
            <div class="ms-2 btn-group">
                <button class="btn btn-primary">Search</button>
                <a href="?topic={{$currentId}}" class="btn btn-secondary">Clear</a>
            </div>
        </div>
        </form>

    <hr>
    <div>
        @foreach($topic->Blocks as $elem)
            <div class="border border-1 border-black mb-2">
                <h5 class="p-1">{{$elem->Title}}</h5>
                <hr>
                <div class="d-flex p-1">
                    <div class="w-25">
                        <img src="{{$elem->imagePath}}" class="w-100" alt="img">
                    </div>
                    <div class="ps-3">
                        {{$elem->Content}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
        <h3 class="text-center">Choose your topic</h3>
    @endif
@endsection

