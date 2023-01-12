<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    protected $table = 'databases';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'status',
        'name',
        'icon',
        'created_at',
        'created_user',
        'updated_at',
        'updated_user'
    ];
    //DB検索処理
    public function searchDatabase($request)
    {
        $response = $this::where('status', $request->is_valid)
            ->where('name', 'LIKE', '%' . $request->keyword . '%')
            ->get();

        return $response;
    }
    //DB登録処理
    public function registerDatabase($request)
    {
        $timestamp = now();
        $ref = $this->create([
            'id' => null,
            'status' => $request->is_valid,
            'name' => $request->name,
            'icon' => $request->icon,
            'created_at' => $timestamp,
            'created_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
            'updated_at' => $timestamp,
            'updated_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
        ]);
        return $ref;
    }
    //DB更新処理
    public function updateDatabase($request)
    {
        $timestamp = now();
        $ref = $this->where('id', '=', $request->id)->update([
            'status' => $request->is_valid,
            'name' => $request->name,
            'icon' => $request->icon,
            'updated_at' => $timestamp,
            'updated_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
        ]);
        return $ref;
    }
}
