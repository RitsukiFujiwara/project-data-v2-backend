<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Program;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationErrorException;
// use Exception;

class ProgramController extends Controller
{
    /**
     * 言語検索処理
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
     * 言語登録処理
     *
     * @param  Request  $request
     */
    public function register(Request $request)
    {
        $rules = [];
        return $this->commonApi($request, $rules, 'register');
    }
    /**
     * 言語更新処理
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

        $program = new Program;
        if ($requestType === 'search') {
            $response = $program->searchProgram($request);
        } elseif ($requestType === 'register') {
            $response = $program->registerProgram($request);
        } elseif ($requestType === 'update') {
            $response = $program->updateProgram($request);
        }
        return $response;
    }
}
