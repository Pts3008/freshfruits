<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPhams;

class ControllerSanpham extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanpham= SanPhams::all();
        return view('admin.sanpham',compact('sanpham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sanpham = SanPhams::all();

       return view('admin.addsp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sanpham = SanPhams::create([
             'tensp'=>$request->tensp,
            'image'=>$request->image,
            'gia'=>$request->gia,
            'soluong'=>$request->soluong

        ]);
        return redirect()->route('sanpham.index')->with('Ok','Them thanh cong');
        
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
        $sanpham=SanPhams::all();
        $se=SanPhams::where('id',$id)->first();
        return view('admin.suasanpham',compact('sanpham','se'));
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
        SanPhams::where('id',$id)->update([

             'tensp'=>$request->tensp,
             'image'=>$request->image,
             'gia'=>$request->gia,
             'soluong'=>$request->soluong,
        ]);
        return redirect()->route('sanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SanPhams::where('id',$id)->delete();
        return redirect()->back()->withSucces('Xóa thành công');
    }
}
