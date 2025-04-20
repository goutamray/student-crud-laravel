<?php

namespace App\Http\Controllers;

use App\Mail\StaffAccountMail;
use App\Models\Staff;
use App\Notifications\StaffAccountNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::latest() -> get();

       

        return view("staff.index", [
            "staffs" =>  $staff
        ]); // staff folder ar vetore index ace tai staff.index dite hbe 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("staff.create");  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => 'required',
            "email" => 'required|email',
            "cell" => 'required|starts_with:01,8801,+8801,013,015,014',  
        ]);

        // ✅ Photo Upload
        $file_name = null;
        if ($request->hasFile('photo')) {
            $img = $request->file('photo');
            $file_name = md5(time() . rand()) . '.' . $img->getClientOriginalExtension();
            $img->move(storage_path('app/public/staffs/'), $file_name);
        }
    
        // ✅ Create Staff
      $staff = Staff::create([
            "name"        => $request->name,
            "email"       => $request->email,
            "cell"        => $request->cell,
            'photo'       => $file_name,
        ]);
   
         $data = [
            "name"        => $request->name,
            "email"       => $request->email,
            "cell"        => $request->cell,
            'photo'       => $file_name,
        ];



        $staff -> notify(new StaffAccountNotification($data) );

        // send mail 
        // Mail::to( $request->email) -> send( new StaffAccountMail( $data )); 
    
        return back()->with('success', 'Staff created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staff = Staff::find($id);
        
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = Staff::findorFail($id); 

        return view('staff.edit', compact("staff"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update_data = Staff::findOrFail($id);

        $update_data->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'cell'     => $request->cell,
        ]);
    
        return back()->with('success', 'Staff updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete_data = Staff::findorFail($id);
        $delete_data -> delete();

        return back() -> with("success", "Staff Data Deleted SuccessFull");
    }
}
