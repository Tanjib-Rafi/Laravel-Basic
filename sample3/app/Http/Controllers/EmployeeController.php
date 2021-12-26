<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
    public function show() {       
        $employees =  DB::table('employees')->get();
        return view('crud.show' , compact('employees'));
   }

    public function insert() {       
         return view('crud.insert');
    }

    public function store(Request $request) {
    $name = $request->name;
    $email = $request->email;
    $salary = $request->salary;
    $birthdate = $request->birthdate;
    $department = $request->department;
    $status = $request->status;
    $gender = $request->gender;

    DB::table('employees')->insert([
        'name'  => $name,
        'email' => $email,
        'salary' => $salary,
        'birthdate' => $birthdate,
        'department' => $department,
        'status' => $status,
        'gender' => $gender,
    ]);

    return redirect()->to('show');

}

    public function edit($id) {
    $employees =DB::table('employees')->where('id','=',$id)->first();
    return view ('crud.edit',compact('employees'));
}


public function update(Request $request,$id) {

    $name = $request->name;
    $email = $request->email;
    $salary = $request->salary;
    $birthdate = $request->birthdate;
    $department = $request->department;
    $status = $request->status;
    $gender = $request->gender;

    $employees =DB::table('employees')->where('id',$id)->update([
        'name' => $name,
        'email' => $email,
        'salary' => $salary,
        'birthdate' => $birthdate,
        'department' => $department,
        'status' => $status,
        'gender' => $gender,
    ]);

    return redirect()->back()->with('msg','successfully updated!');
    //return redirect()->to('show')->with('msg','successfully updated');
}


public function delete($id) {
    DB::table('employees')->where('id', '=', $id)->delete();
    return redirect()->back()->with('msg','Employee Deleted successfully!');

}


}