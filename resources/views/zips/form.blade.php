@extends('layouts.main')
@section('title', '新規登録画面')
@section('content')
    <h1>新規登録画面</h1>
        <form action="{{ route('zips.store', $zip)}}" method="POST">
        @csrf
        @method('POST')
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" value="{{ $zip->name }}">
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="text" name="email" id="email" >
        </div>
        <div>
            <label for="postcode">郵便番号</label>
            <input type="text" name="postcode" id="postcode" >
        </div>
        <div>
            <label for="address">住所</label>
            <textarea name="address" id="address"></textarea>
        </div>
        <div>
            <label for="phoneNumber">電話番号</label>
            <input type="text" name="phoneNumber" id="phoneNumber" >
        </div>
        <div>
            <input type="submit" value="登録">
        </div>
    </form>
    <button type="button" onclick="location.href='{{ route('zips.create', $zip) }}'">郵便番号検索に戻る</button>