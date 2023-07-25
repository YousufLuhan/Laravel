<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    public function display()
    {
        $user = DB::table("students")->paginate(4);
        return view("welcome", ["data" => $user]);
    }
    public function search(Request $req)
    {
       
        $search = $req->search;
        $user = DB::table("students")->where("Phone",'like','%' . $search . '%')->paginate(12);
        //  return $user;
        // return redirect()->route('home')->withInput();
        // if($user){
        // }
        // return redirect()->back();
         return view("welcome", ["data" => $user,"r"=>$search]);
        //  return redirect()->route('home')->withInput();
    }

    public function addUser(Request $req)
    {
        // dd($req->groups);
        //   dd($req->file("image")->store("public/images"));
        $req->validate([
            'name' => 'required|string',
             'age' => 'required|integer',
             'phone'=>'required|string|unique:students',
             'image'=>'required',
             'gender' => 'required|in:Male,Female',
             'groups' => 'required|in:Science,Arts,Commerce',
            
        ]);

        $user = DB::table("students")->insert([
            "Name" => $req->name,
            "Age" => $req->age,
            "Phone" => $req->phone,
            "Image" => $req->file("image")->store("public/images"),
            "Gender" => $req->gender,
            "Groups" => $req->groups,
        ]);
        if ($user) {
            return redirect()->route('home')->with('success', 'User added successfully!');
        } else {
            return "<h1>Data not added!<h1>";
        }
    }

    public function editUser(Request $req, $id)
    {
        // $req->validate([
        //     'name' => 'required|string',
        //      'age' => 'required|integer',
        //      'phone'=>'required|string|unique:students',
        //      'image'=>'required',
        //      'gender' => 'required|in:male,female',
        //      'groups' => 'required|in:science,arts,commerce',
            
        // ]);
        // dd($req->file("image")->store("public/images"));
        // dd($req->image);
        // dd($req->file("new"))
        // dd('public/images/' . basename($req->image));
        // dd('public/images/' . basename($req->image));
        $r = "";
        if ($req->new != null) {
          
            if ($req->image && Storage::exists('public/images/' . basename($req->image))) {
                Storage::delete('public/images/' . basename($req->image));
            }
            $user = DB::table('students')->where("Id", $id)->update([
                "Name" => $req->name,
                "Age" => $req->age,
                "Phone" => $req->phone,
                "Image" => $req->file("new")->store("public/images"),
                "Gender" => $req->gender,
                "Groups" => $req->groups,
            ]);
            if ($user) {
                return redirect()->route("home")->with("update","User update successfully!");
            } else {
                return "<h1>Data not updated!<h1>";
            }

        } else {
            global $r;
            $r = $req->image;
        }
        //    dd($r);
        $user = DB::table('students')->where("Id", $id)->update([
            "Name" => $req->name,
            "Age" => $req->age,
            "Phone" => $req->phone,
            "Image" => $r,
            "Gender" => $req->gender,
            "Groups" => $req->groups,
        ]);
        if ($user) {
            return redirect()->route("home")->with("update","User update successfully!");
        } else {
            return redirect()->route("edit.view",$id);
        }

    }

    public function edit($id)
    {
        $user = DB::table('students')->find($id);
        return view("edit", ["data" => $user]);
    }

    public function delete($id)
    {
        $user = DB::table('students')->where("Id", $id)->delete();
        if ($user) {
            return redirect()->route("home")->with("delete","User delete successfully!");
        } else {
            return "<h1>Data not Delete!<h1>";
        }

    }

}