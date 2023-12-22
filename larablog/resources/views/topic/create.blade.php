@extends("layouts.app")
@section('content' )
<div class="row">
    <div class="col-5 px-5">
        <div class="row">
            <h2 class="text-center">Topic</h2>
            <form action="createtopic" method="post">
                @csrf

                <div class="mb-2">
                    <label class="form-label w-100">
                        Title:
                        <input type="text" name="Title" class="form-control @error('Title') is-invalid @enderror" value="{{ old('Title') }}">
                        @error('Title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </label>
                </div>

                <div class="mb-2">
                    <button class="btn btn-success w-100">Create</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-2"></div>
    <div class="col-5 px-5">
        <div class="row">
            <h2 class="text-center">Block</h2>
            <form action="createblock" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-2">
                    <label class="form-label w-100">
                        Title:
                        <input type="text" name="block_Title" class="form-control @error('block_Title') is-invalid @enderror" value="{{ old('block_Title') }}">
                        @error('block_Title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </label>
                </div>

                <div class="mb-2">
                    <label class="form-label w-100">
                        Content:
                        <textarea name="block_Content" class="form-control @error('block_Content') is-invalid @enderror">{{ old('block_Content') }}</textarea>
                        @error('block_Content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </label>
                </div>

                <div class="mb-2">
                    <label class="form-label w-100">
                        Topic:
                        <select name="topic_id" class="form-select @error('topic_id') is-invalid @enderror">
                            @foreach($topics as $topic)
                                <option value="{{ $topic->Id }}" {{ old('topic_id') == $topic->Id ? 'selected' : '' }}>{{ $topic->Title }}</option>
                            @endforeach
                        </select>
                        @error('topic_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </label>
                </div>

                <div class="mb-2">
                    <label class="form-label w-100">
                        Image:
                        <input type="file" name="block_ImagePath" accept="image/*" class="form-control @error('block_ImagePath') is-invalid @enderror">
                        @error('block_ImagePath')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </label>
                </div>

                <div class="mb-2">
                    <button class="btn btn-success w-100">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
