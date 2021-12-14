<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongBan;
class PhongBanController extends Controller
{
    //
    public function index() {
        $pb = PhongBan::all();
        return view('pages.PhongBan.index', compact('pb'));
    }

    public function postAdd(Request $request) {
        if ($request->ajax()) {
            $validator = \Validator::make($request->all(), [
                'ten' => 'required|unique:phong_ban,ten',
            ], [
                'ten.required' => 'Hãy nhập tên phòng ban!',
                'ten.unique' => 'Phòng ban đã tồn tại!',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
            } else {
                $respone = ['success' => true];

                $pb = new PhongBan();
                $pb->ten = $request->ten;
                
                $pb->save();

                return response()->json($respone, 200);
            }
        }
    }

    public function getEdit($id) {
        $respone = ['success' => false, 'data' => ''];

        $pb = PhongBan::find($id);

        if ($pb) {
            $respone['success'] = true;
            $respone['data'] = $pb;
        }
        
        return response()->json($respone, 200);
    }

    public function postEdit(Request $request, $id) {
        if ($request->ajax()) {
            $validator = \Validator::make($request->all(), [
                'ten' => 'required|unique:phong_ban,ten,'.$id,
                
            ], [
                'ten.unique' => 'Đã tồn tại mã phòng ban này!',
                'ten.required' => 'Hãy nhập tên phòng ban!',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
            } else {
                $respone = ['success' => true, 'data' => ''];

                $pb = PhongBan::find($id);
                $pb->ten = $request->ten;
               
                $pb->save();

                $respone['data'] = $pb;

                return response()->json($respone, 200);
            }
        }
    }

    public function delete($id) {
        $respone = ['success' => false];

        $delete = PhongBan::destroy($id);
        if ($delete) {
            $respone['success'] = true;
            return response()->json($respone, 200);
        } 
        return response()->json($respone, 400);
    }

}
