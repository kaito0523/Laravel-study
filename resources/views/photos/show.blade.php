@extends('layouts.default')

@section('title', 'アップロード画面の表示')
@section('content')
    @if(session()->has('sucess'))
        <p>{{ session()->get('success') }}</p>
    @endif
    <img src="{{ asset('storage/photos/'.$filename)}}" alt="">

    <form action="{{ route('photos.destroy', ['photo' => $filename]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>
    <a href="{{ route('photos.download', ['photo' => $filename]) }}" >ダウンロード</a>
@endsection