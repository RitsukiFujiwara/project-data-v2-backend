<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Program;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Response
     */

    public function search(Request $request)
    {
        return Program::where('status', $request->is_valid)
            ->get();
    }
}
