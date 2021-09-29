<?php

namespace App\Http\Controllers;

use App\Models\Zip;

use GuzzleHttp\Client;
use App\Http\Requests\ZipRequest;

class ZipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zips = Zip::all();
        return view('zips.index', compact('zips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZipRequest $request)
    {
                $zip = new Zip();

        $zip->name = $request->name;
        $zip->email = $request->email;
        $zip->postcode = $request->postcode;
        $zip->address = $request->address;
        $zip->phoneNumber = $request->phoneNumber;
        $zip->save();

        return redirect()->route('zips.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zip  $zip
     * @return \Illuminate\Http\Response
     */
    public function show(Zip $zip)
    {
        return view('zips.show', compact('zip'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zip  $zip
     * @return \Illuminate\Http\Response
     */
    public function edit(Zip $zip)
    {
        return view('zips.edit', compact('zip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zip  $zip
     * @return \Illuminate\Http\Response
     */
    public function update(ZipRequest $request, Zip $zip)
    {
        $zip->name = $request->name;
        $zip->email = $request->email;
        $zip->postcode = $request->postcode;
        $zip->address = $request->address;
        $zip->phoneNumber = $request->phoneNumber;
        $zip->save();

        return redirect()->route('zips.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zip  $zip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zip $zip)
    {
        $zip->delete();
        return redirect()->route('zips.index');
    }

    public function form(ZipRequest $request ,Zip $zip)
    {
        $method = 'GET';
        // create画面で入力した値をzipcodeに反映
        $postcode = $request->input('postcode');
        // URLを定義
        $url = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $postcode;
        // Client(接続する為のクラス)を生成
        $client = new Client();
        // try catchでエラー時の処理を書く
        try {
            // データを取得し、JSON形式からPHPの変数に変換
            $response = $client->request($method, $url);
            $body = $response->getBody();
            $customer = json_decode($body, false);
            // 郵便番号取得
            $results = $customer->results[0];
            // 住所を取得
            $address = $results->address1 . $results->address2 . $results->address3;
        } catch (\Throwable $th) {
            // フラッシュメッセージ
            return back()->withErrors(['error' => '郵便番号が正しくありません！']);
        }
        return view('zips.form')->with(compact('zip', 'address','postcode'));
    }


}

    
