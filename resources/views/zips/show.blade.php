@extends('layouts.main')
@section('title', '顧客詳細画面')
@section('content')

    <h1>顧客詳細画面</h1>
    <table border="1">
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>
        <tr>
            <td>{{ $zip->id }}</td>
            <td>{{ $zip->name }}</td>
            <td>{{ $zip->email }}</td>
            <td>{{ $zip->postcode }}</td>
            <td>{{ $zip->address }}</td>
            <td>{{ $zip->phoneNumber }}</td>
        </tr>
    </table>
    <div class="button-group">
        <button type="button" onclick="location.href='{{ route('zips.edit', $zip) }}'">編集画面</button><br>
        <form action="{{ route('zips.destroy', $zip) }}" method="post" name="form1" style="display: inline">
            @csrf
            @method('delete')
            <button type="submit" onclick="if(!confirm('削除していいですか?')){return false}">削除する</button><br>
        </form>

        <button type="button" onclick="location.href='{{ route('zips.index') }}'">一覧に戻る</button><br>
    </div>
@endsection
