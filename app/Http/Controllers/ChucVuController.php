<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChucVu;
use Google\Service\MyBusinessBusinessInformation\Chain;

class ChucVuController extends Controller
{
    //
    
    public function index() {
        $cv = ChucVu::orderBy('ten', 'asc')->get();
        return view('pages.ChucVu.index', compact('cv'));
    }

    public function postAdd(Request $request) {
        if ($request->ajax()) {
            $validator = \Validator::make($request->all(), [
                'ten' => 'required|unique:chuc_vu,ten',
            ], [
                'ten.required' => 'Hãy nhập tên chức vụ!',
                'ten.unique' => 'Chức vụ đã tồn tại!',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
            } else {
                $respone = ['success' => true];

                $cv = new ChucVu();
                $cv->ten = $request->ten;
                
                $cv->save();

                return response()->json($respone, 200);
            }
        }
    }

    public function getEdit($id) {
        $respone = ['success' => false, 'data' => ''];

        $cv = ChucVu::find($id);

        if ($cv) {
            $respone['success'] = true;
            $respone['data'] = $cv;
        }
        
        return response()->json($respone, 200);
    }

    public function postEdit(Request $request, $id) {
        if ($request->ajax()) {
            $validator = \Validator::make($request->all(), [
                'ten' => 'required|unique:chuc_vu,ten,'.$id,
            ], [
                'ten.required' => 'Hãy nhập tên chức vụ!',
                'ten.unique' => 'Chức vụ này đã tồn tại!',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
            } else {
                $respone = ['success' => true, 'data' => ''];

                $cv = ChucVu::find($id);
                $cv->ten = $request->ten;
            
                $cv->update();

                $respone['data'] = $cv;

                return response()->json($respone, 200);
            }
        }
    }

    public function delete($id) {
        $respone = ['success' => false];

        $delete = ChucVu::destroy($id);
        if ($delete) {
            $respone['success'] = true;
            return response()->json($respone, 200);
        } 
        return response()->json($respone, 400);
    }

}
