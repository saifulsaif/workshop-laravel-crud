<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentModel;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['student_list']=studentModel::get();
       return view('index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $student= new studentModel;
        $student->first_name=$request->first_name;
        $student->last_name=$request->last_name;
        $student->department=$request->department;
        $student->email=$request->email;
        $student->present_address=$request->present_address;
        $student->permanent_address=$request->permanent_address;
        $student->save();
         session()->flash('success','Insert Record Successfully!');
        $data['student_list']=studentModel::get();
        return view('index',$data);
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
        $data['student']=studentModel::find($id);
        $data['student_list']=studentModel::get();
        return view('edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $student = studentModel::find($request->id);
        $student->first_name=$request->first_name;
        $student->last_name=$request->last_name;
        $student->department=$request->department;
        $student->email=$request->email;
        $student->present_address=$request->present_address;
        $student->permanent_address=$request->permanent_address;
        $student->save();
         session()->flash('success','Update Record Successfully!');
        $data['student_list']=studentModel::get();
        return view('index',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = studentModel::find($id);
        $student->delete();
        session()->flash('danger','Delete Record Successfully!');
        $data['student_list']=studentModel::get();
        return view('index',$data);
    }
}
