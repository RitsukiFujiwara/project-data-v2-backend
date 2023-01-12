<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    /**
     * プロジェクト検索処理
     *
     * @param  Request  $request
     * @return Response
     */

    public function search(Request $request)
    {
        $rules = [];
        return $this->commonApi($request, $rules, 'search');
    }
    /**
     * プロジェクト登録処理
     *
     * @param  Request  $request
     */
    public function register(Request $request)
    {
        $rules = [];
        return $this->commonApi($request, $rules, 'register');
    }
    /**
     * プロジェクト更新処理
     *
     * @param  Request  $request
     */
    public function update(Request $request)
    {
        $rules = [];
        return $this->commonApi($request, $rules, 'update');
    }

    private function commonApi($request, $rules, $requestType)
    {
        //バリデーションメッセージ生成
        // $messages = ValidationMessage::validationMessages($rules);
        //バリデーションチェック実行
        // $validator = Validator::make($request->all(), $rules);
        // //バリデーションチェックエラーチェック
        // if ($validator->fails()) {
        //     //     throw new ValidationErrorException($validator->errors()->messages());
        // }

        $project = new Project;
        if ($requestType === 'search') {
            $response = $project->searchProject($request);
        } elseif ($requestType === 'register') {
            $response = $project->registerProject($request);
        } elseif ($requestType === 'update') {
            $response = $project->updateProject($request);
        }
        return $response;
    }
}
