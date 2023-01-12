<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $table = 'licenses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'status',
        'name',
        'created_at',
        'created_user',
        'updated_at',
        'updated_user'
    ];
    //資格検索処理
    public function searchLicense($request)
    {
        $response = License::where('status', $request->is_valid)
            ->where('name', 'LIKE', '%' . $request->keyword . '%')
            ->get();

        return $response;
    }
    //資格登録処理
    public function registerLicense($request)
    {
        $timestamp = now();
        $ref = $this->create([
            'id' => null,
            'status' => $request->is_valid,
            'name' => $request->name,
            'created_at' => $timestamp,
            'created_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
            'updated_at' => $timestamp,
            'updated_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
        ]);
        return $ref;
    }
    //資格更新処理
    public function updateLicense($request)
    {
        $timestamp = now();
        $ref = $this->where('id', '=', $request->id)->update([
            'status' => $request->is_valid,
            'name' => $request->name,
            'updated_at' => $timestamp,
            'updated_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
        ]);
        return $ref;
    }
}
