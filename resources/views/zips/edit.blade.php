@extends('layouts.main')
@section('title', '編集画面')
@section('content')
    <h1>編集画面</h1>
        <form action="{{ route('zips.update', $zip)}}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" value="{{ $zip->name }}">
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="text" name="email" id="email" value="{{ $zip->email }}">
        </div>
        <div>
            <label for="postcode">郵便番号</label>
            <input type="text" name="postcode" id="postcode" value="{{ $zip->postcode }}">
        </div>
        <div>
            <label for="address">住所</label>
            <textarea name="address" id="address">{{ $zip->address }}</textarea>
        </div>
        <div>
            <label for="phoneNumber">電話番号</label>
            <input type="text" name="phoneNumber" id="phoneNumber" value="{{ $zip->phoneNumber }}">
        </div>
        <div>
            <input type="submit" value="更新">
        </div>
    </form>
    <button type="button" onclick="location.href='{{ route('zips.show', $zip) }}'">戻る</button>
{{-- <button type="button" onclick="location.href='{{ route('zips.show') }}'" class="btn btn-outline-danger">一覧に戻る</button> --}}
    {{-- <a href="{{ route('shops.index') }}">一覧画面</a>
    <a href="{{ route('shops.edit', $shop) }}">編集</a> --}}
    {{-- <form action="{{ route('shops.destroy', $shop) }}" method="post" name="form1" style="display: inline">
        @csrf
        @method('delete')
        <button type="submit" onclick="if(!confirm('削除していいですか?')){return false}">削除する</button>
    </form> --}}
@endsection