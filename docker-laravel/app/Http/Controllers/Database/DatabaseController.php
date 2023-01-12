<?php

namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Database;


class DatabaseController extends Controller
{
    /**
     * データベース検索処理
     *
     * @param  Request  $request
     * @return Response
     */

    public function search(Request $request)
    {
        $rules = [
            'status' => 'integer|min:1',
            'name' => 'string',
            'icon' => 'string',
        ];
        return $this->commonApi($request, $rules, 'search');
    }
    /**
     * データベース登録処理
     *
     * @param  Request  $request
     */
    public function register(Request $request)
    {
        $rules = [];
        return $this->commonApi($request, $rules, 'register');
    }
    /**
     * データベース更新処理
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

        $database = new Database;
        if ($requestType === 'search') {
            $response = $database->searchDatabase($request);
        } elseif ($requestType === 'register') {
            $response = $database->registerDatabase($request);
        } elseif ($requestType === 'update') {
            $response = $database->updateDatabase($request);
        }
        return $response;
    }
}
