<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
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
    //言語検索処理
    public function searchProgram($request)
    {
        $response = Program::where('status', $request->is_valid)
            ->where('name', 'LIKE', '%' . $request->keyword . '%')
            ->get();

        return $response;
    }
    //言語登録処理
    public function registerProgram($request)
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
    //言語更新処理
    public function updateProgram($request)
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
