@extends('layouts.main')
@section('title', '郵便番号検索画面')
@section('content')
    <h1>郵便番号検索画面</h1>
    <button type="button" onclick="location.href='{{ route('zips.index') }}'">一覧に戻る</button>
@endsection
