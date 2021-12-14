<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NhanVien;
use App\Models\PhongBan;
use App\Models\Luong;

class ThongKeController extends Controller
{
    //
    public function index() {
        return view('pages.ThongKe.index');
    }

    // public function loadChart() {
    //     $respone = ['success' => true,'data' => ''];
    //     $hdn = HoaDonNhap::orderBy('created_at', 'desc')->take(20)->get();
    //     foreach ($hdn as $item) {
    //         $respone['times'][] = date('d-m-Y', strtotime($item->updated_at));
    //         $respone['values'][] = $item->tong_tien;
    //     }
    //     return response()->json($respone, 200);
    // }

    // public function loadChart2() {
    //     $respone = ['success' => true,'data' => ''];
    //     $px = PhieuXuat::select('ngay_xuat', \DB::raw('count(*) as total'))->groupBy('ngay_xuat')->pluck('total','ngay_xuat')->all();

    //     foreach($px as $key => $value) {
    //         $respone['times'][] = date('d-m-Y', strtotime($key));
    //         $respone['values'][] = $value;
    //     }
    //     return response()->json($respone, 200); 
    // }
    
    // public function loadChart3() {
    //     $respone = ['success' => true,'data' => ''];
    //     $sp = SanPham::select('loai_san_pham_id', \DB::raw('count(*) as total'))->groupBy('loai_san_pham_id')->pluck('total','loai_san_pham_id')->all();

    //     foreach($sp as $key => $value) {
    //         $respone['times'][] = LoaiSanPham::find($key)->ten;
    //         $respone['values'][] = $value;
    //     }
    //     return response()->json($respone, 200);
    // }
}
