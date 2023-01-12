<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'status',
        'name',
        'os_id',
        'program_ids',
        'fw_ids',
        'db_ids',
        'job_id',
        'responsible_ids',
        'period_from',
        'period_to',
        'info',
        'lean',
        'work_type',
        'created_at',
        'created_user',
        'updated_at',
        'updated_user'
    ];
    /**
     * プロジェクトに関連する言語レコードを取得
     */
    public function program()
    {
        return $this->belongsTo('App\Program', 'program_ids');
    }
    /**
     * プロジェクトに関連するフレームワークレコードを取得
     */
    public function framework()
    {
        return $this->belongsTo('App\Framework', 'fw_ids');
    }
    /**
     * プロジェクトに関連すデータベース語レコードを取得
     */
    public function database()
    {
        return $this->belongsTo('App\Database', 'db_ids');
    }

    //プロジェクト検索処理
    public function searchProject($request)
    {
        $response = License::where('status', $request->is_valid)
            ->where('program_ids', $request->program_id)
            ->where('responsible_ids', $request->responsible_ids)
            ->where('name', 'LIKE', '%' . $request->keyword . '%')
            ->get();

        return $response;
    }
    //プロジェクト登録処理
    public function registerProject($request)
    {
        $timestamp = now();
        $ref = $this->create([
            'id' => null,
            'status' => $request->is_valid,
            'name' => $request->name,
            'os_id' => $request->os_id,
            'program_ids' => $request->program_ids,
            'fw_ids' => $request->fw_ids,
            'db_ids' => $request->db_ids,
            'job_id' => $request->job_id,
            'responsible_ids' => $request->responsible_ids,
            'period_from' => $request->period_from,
            'period_to' => $request->period_to,
            'info' => $request->info,
            'lean' => $request->lean,
            'work_type' => $request->work_type,
            'created_at' => $timestamp,
            'created_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
            'updated_at' => $timestamp,
            'updated_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
        ]);
        return $ref;
    }
    //プロジェクト更新処理
    public function updateProject($request)
    {
        $timestamp = now();
        $ref = $this->where('id', '=', $request->id)->update([
            'status' => $request->is_valid,
            'name' => $request->name,
            'os_id' => $request->os_id,
            'program_ids' => $request->program_ids,
            'fw_ids' => $request->fw_ids,
            'db_ids' => $request->db_ids,
            'job_id' => $request->job_id,
            'responsible_ids' => $request->responsible_ids,
            'period_from' => $request->period_from,
            'period_to' => $request->period_to,
            'info' => $request->info,
            'lean' => $request->lean,
            'work_type' => $request->work_type,
            'updated_at' => $timestamp,
            'updated_user' => 'dummyUser', //TODO:ログイン情報からユーザー情報を取得
        ]);
        return $ref;
    }
}
