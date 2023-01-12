<?php

namespace App\Http\Controllers\License;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\License;

class LicenseController extends Controller
{
    /**
     * 資格検索処理
     *
     * @param  Request  $request
     * @return Response
     */

    public function search(Request $request)
    {
        $rules = [
            'status' => 'integer|min:1',
            'name' => 'string',
        ];
        return $this->commonApi($request, $rules, 'search');
    }
    /**
     * 資格登録処理
     *
     * @param  Request  $request
     */
    public function register(Request $request)
    {
        $rules = [];
        return $this->commonApi($request, $rules, 'register');
    }
    /**
     * 資格更新処理
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

        $license = new License;
        if ($requestType === 'search') {
            $response = $license->searchLicense($request);
        } elseif ($requestType === 'register') {
            $response = $license->registerLicense($request);
        } elseif ($requestType === 'update') {
            $response = $license->updateLicense($request);
        }
        return $response;
    }
}
