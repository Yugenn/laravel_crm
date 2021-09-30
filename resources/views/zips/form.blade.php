@extends('layouts.main')
@section('title', '新規登録画面')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>新規登録画面</h1>
    <form action="{{ route('zips.store', $zip) }}" method="POST">
        @csrf
        @method('POST')
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div>
            <label for="postcode">郵便番号</label>
            <input type="text" name="postcode" id="postcode" required value="{{ old('postcode', $postcode) }}">
        </div>
        <div>
            <label for="address">住所</label>
            <textarea name="address" id="address">{{ $address }}</textarea>
        </div>
        <div>
            <label for="phone_number">電話番号</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
        </div>
        <div>
            <input type="submit" value="登録">
        </div>
    </form>
    <button type="button" onclick="location.href='{{ route('zips.create', $zip) }}'">郵便番号検索に戻る</button>
