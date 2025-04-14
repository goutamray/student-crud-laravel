<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();  // all data get

        // $students = Student::latest()->get(); // all data get


        // $students = Student::where("username", "uttam3")->get(); 

        // $students = Student::whereNot("username", "uttam3")->get(); 


         return view('index', [
            "students" =>  $students
         ]);
    }

    /**
     * 
     * store data
     */
    public function store(Request $request){
        $validated = $request->validate([
            "name" => 'required',
            "email" => 'required|email',
            "cell" => 'required|starts_with:01,8801,+8801',
            "username" => 'required|min:6|max:12',
            "edu" => 'required',
        ],[
            "name.required"  => "আপনার নামের ঘরটি পূরণ করুন ?",
            "email.required" => "আপনার ইমেইল টি দিন ?",
            "cell"           => "আপনার ফোন নাম্বার টি দিন ?"
        ]);

            Student::create([
                "name"     => $request->name,
                "email"    => $request->email,
                "cell"     => $request->cell,
                "username" => $request->username,
                "edu"      => $request->edu,
            ]);
            return back()->with('success', 'Student created successfully!');
    
    }

    public function create(){
        return view('create');
    }
    
    /***
     * 
     * Show Single student 
     */

        public function show($id)
        {
            $student = Student::find($id);
        
            return view('show', compact('student'));
        }

    /***
     * 
    * Student data delete 
    */
    public function destroy($id){
        $delete_data = Student::findorFail($id);
        $delete_data -> delete();

        return back() -> with("success", "Student Data Deleted SuccessFull");
    }

    /***
     * 
    * Student data edit 
    */
    public function edit($id){

        $edit_student = Student::findorFail($id); 

        return view('edit', [
            "edit_data" => $edit_student
        ]);
    }

    /**
     * 
     * update student data
     */
    public function update(Request $request, $id)
    {
        $update_data = Student::findOrFail($id);
    
        $update_data->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'cell'     => $request->cell,
            'username' => $request->username,
            'edu'      => $request->edu,
        ]);
    
        return back()->with('success', 'Student updated successfully!');
    }
    


}
