<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Framework extends Model
{
    protected $table = 'frameworks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'program_id',
        'status',
        'name',
        'icon',
        'version',
        'created_at',
        'created_user',
        'updated_at',
        'updated_user'
    ];
    /**
     * フレームワークに関連する言語レコードを取得
     */
    public function program()
    {
        return $this->belongsTo('App\Program');
    }
    //FW検索処理
    public function searchFramework($request)
    {
        $response = Framework::where('status', $request->is_valid)
            ->where('name', 'LIKE', '%' . $request->keyword . '%')
            ->with('program')
            ->get();
        return $response;
    }
    //FW登録処理
    public function registerFramework($request)
    {
        $timestamp = now();
        $ref = $this->create([
            'id' => null,
            'program_id' => $request->program_id,
            'status' => $request->is_valid,
            'name' => $request->name,
            'icon' => $request->icon,
            'version' => $request->version,
            'created_at' => $timestamp,
            'created_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
            'updated_at' => $timestamp,
            'updated_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
        ]);
        return $ref;
    }
    //FW更新処理
    public function updateFramework($request)
    {
        $timestamp = now();
        $ref = $this->where('id', '=', $request->id)->update([
            'program_id' => $request->program_id,
            'status' => $request->is_valid,
            'name' => $request->name,
            'icon' => $request->icon,
            'version' => $request->version,
            'updated_at' => $timestamp,
            'updated_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
        ]);
        return $ref;
    }
}
