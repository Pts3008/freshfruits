<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khuyenmais;

class ControllerKhuyenmai extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $khuyenmai= Khuyenmais::all();
        return view('admin.khuyenmai',compact('khuyenmai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addkm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $khuyenmai = Khuyenmais::create([
             'ten'=>$request->ten,
            'noidung'=>$request->noidung
            

        ]);
        return redirect()->route('khuyenmai.index')->with('Ok','Them thanh cong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Khuyenmais::where('id_km',$id)->delete();
        return redirect()->back()->withSucces('Xóa thành công');
    }
}
