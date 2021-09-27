@extends('layouts.main')

@section('title', '顧客一覧')

@section('content')
    <h1>顧客一覧</h1>
    <table border="1">
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>

        @foreach ($zips as $zip)
            <tr>
                <td><a href="{{ route('zips.show', $zip) }}">{{ $zip->id }}</a></td>
                <td>{{ $zip->name }}</td>
                <td>{{ $zip->email }}</td>
                <td>{{ $zip->postcode }}</td>
                <td>{{ $zip->address }}</td>
                <td>{{ $zip->phoneNumber }}</td>
            </tr>
        @endforeach
        <button type="button" onclick="location.href='{{ route('zips.create') }}'">新規作成</button>


    @endsection
