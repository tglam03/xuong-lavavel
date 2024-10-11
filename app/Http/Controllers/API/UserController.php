<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Spatie\FlareClient\Http\Response as HttpResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = User::query()->latest('id')->paginate(5);

        return response()->json([
            'message' => 'Danh sach nguoi dung . ' . request('page', 1),
            'data'    => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = User::query()->create($request->all());

        return response()->json([
            'message' => 'Them moi thanh cong',
            'data'    => $user
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            //code...   
            $data = User::query()->findOrFail($id);

            return response()->json([
                'msg' => 'chi tiet id =' . $id,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            //throw $th;

            Log::error(__CLASS__ . '@' . __FUNCTION__, [
                $th
            ]);
            if ($th instanceof ModelNotFoundException) {
                return response()->json(
                    [
                        'msg' => 'khong thay nguoi dung co id = ' . $id,

                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
