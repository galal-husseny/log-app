<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Services\FileService;
use App\Http\Requests\EndRequest;
use App\Http\Requests\NextRequest;
use App\Http\Requests\BeginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\PreviousRequest;

class FileController extends Controller
{
    public function begin(BeginRequest $request,FileService $file)
   {
        $data = $file->begin($request->input('path'));
        return response()->json(compact('data'));
   }

   public function next(NextRequest $request,FileService $file)
   {
        $data = $file->next($request->input('path'),$request->lastIndex);
        return response()->json(compact('data'));
   }

   public function previous(PreviousRequest $request,FileService $file)
   {
        $data = $file->previous($request->input('path'),$request->lastIndex);
        return response()->json(compact('data'));
   }

   public function end(EndRequest $request,FileService $file)
   {
        $data = $file->end($request->input('path'));
        return response()->json(compact('data'));
   }
}
