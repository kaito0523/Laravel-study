@extends('layouts.default')

@section('title', 'ファイルアップロード')
@section('content')
    @if(session()->has('sucess'))
        <p>{{ session()->get('success') }}</p>
    @endif
    <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>画像: <input type="file" name="image"></label>
        <button type="submit">アップロード</button>
    </form>
@endsection