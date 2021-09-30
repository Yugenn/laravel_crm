@extends('layouts.main')
@section('title', '編集画面')
@section('content')
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
    <h1>編集画面</h1>
    <form action="{{ route('zips.update', $zip) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" value="{{ old('name', $zip->name) }}">
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" value="{{ old('email', $zip->email) }}">
        </div>
        <div>
            <label for="postcode">郵便番号</label>
            <input type="text" name="postcode" id="postcode" value="{{ old('postcode', $zip->postcode) }}">
        </div>
        <div>
            <label for="address">住所</label>
            <textarea name="address" id="address">{{ old('address', $zip->address) }}</textarea>
        </div>
        <div>
            <label for="phone_number">電話番号</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $zip->phone_number) }}">
        </div>
        <div>
            <input type="submit" value="更新">
        </div>
    </form>
    <button type="button" onclick="location.href='{{ route('zips.show', $zip) }}'">戻る</button>

@endsection
