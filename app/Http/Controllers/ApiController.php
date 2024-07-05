<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function index()
    {
        return response()->json(User::all(),200);
    }
    public function get_all_user($id)
    {
        $data = User::find($id);

        if($data){
            return response()->json($data,200);
        }else{
            return response()->json(['message'=>'user not found'],404);
        }

    }

    public function create_user(Request $request)
    {
        $data = User::create($request->all());
        return response()->json($data);
    }

    public function update_user(Request $request, $id)
    {
        $data = User::find($id);
        if ($data) {
            $validateData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required',
                'usertype'=> 'required',
                'password'=> 'required',


            ]);

            $data->update($validateData);

            return response()->json($data,200);
        } else {
           return response()->json(['message'=>'user not found'],404);
        }
    }

    public function delete_user($id)
    {
        $data = User::find($id);
        if ($data) {
            $data->delete();
            return response()->json([
                "message" => "User deleted successfully",
                "status" => "success"
            ]);
        } else {
            return response()->json([
                "message" => "User not found",
                "status" => "error"
            ], 404);
        }
    }








    public function get_all_food()
    {
        $data=Food::all();
        return response()->json($data);
    }

    public function create_food(Request $request)
    {
        $data = Food::create($request->all());
        return response()->json($data);
    }

    public function update_food(Request $request, $id)
    {
        $data = Food::find($id);
        if ($data) {
            $data->update($request->all());
            return response()->json([
                "message" => "Food updated successfully",
                "status" => "success",
                "data" => $data
            ]);
        } else {
            return response()->json([
                "message" => "Food not found",
                "status" => "error"
            ], 404);
        }
    }

    public function delete_food($id)
    {
        $data = Food::find($id);
        if ($data) {
            $data->delete();
            return response()->json([
                "message" => "Food deleted successfully",
                "status" => "success"
            ]);
        } else {
            return response()->json([
                "message" => "Food not found",
                "status" => "error"
            ], 404);
        }
    }

}
