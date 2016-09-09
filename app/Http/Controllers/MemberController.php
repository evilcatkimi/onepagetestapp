<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Member;
use DateTime;
use File;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{

    public function ListMember () {
        return Member::orderBy('id','ASC')->get();
    }

    public function AddMember (Request $request) {

        if(DB::connection()) {//Check DB connection before Edit
            $member = new Member;
            $member->name = $request->name;
            $member->age = $request->age;
            $member->address = $request->address;

            if ($request->hasFile('image')) {//check if the file is image
                $this->validate($request, [
                    'image' => 'image|max:10000',//Check file size
                ]);
                if (!$request->file('image')->isValid()) {//Check the file if error when upload
                    return redirect()->back()->withErrors(["image" => "File is corrupt"]);
                }
                $file = $request->file('image');
                $file->move('img', time() . $file->getClientOriginalName());//exemple : 1473230950pic.png
                $member->image = time() . $file->getClientOriginalName();
            } else {//if the file not image, add default picture
                $member->image = "nophoto.jpg";
            }
            $member->save();
            return "Add done";
        }
        else{
            return "Fail, can't connect to the DB";
        }
    }

    public function getEdit ($id) {
        return Member::findOrFail($id);
    }

    public function postEdit (Request $request,$id) {

        if(DB::connection()) {//Check DB connection before Edit
            $member = Member::findOrFail($id);
            $member->name = $request->name;
            $member->age = $request->age;
            $member->address = $request->address;

            if ($request->hasFile('image')) {//check if the file is image
                if (!$request->file('image')->isValid()) {//Check the file if error when upload
                    return redirect()->back()->withErrors(["image" => "File is corrupt"]);
                }
                $this->validate($request, [
                    'image' => 'image|max:10000',//Check file size
                ]);

                if ($member->image != "nophoto.jpg") {//if have picture
                    $deletepictureurl = "img/" . $member->image;
                    File::delete($deletepictureurl);//delete old picture
                }

                $file = $request->file('image');
                $file->move('img', time() . $file->getClientOriginalName());//upload new picture
                $member->image = time() . $file->getClientOriginalName();
            }
            $member->save();
            return "Edit done";
        }
        else{
            return "Fail, can't connect to the DB";
        }
    }

    public function getDelete ($id) {
        if(DB::connection()){//Check DB connection before delete
            $member = Member::findOrFail($id);
            if($member->image !== "nophoto.jpg"){//if have picture
                $deletepictureurl = "img/".$member->image;
                File::delete($deletepictureurl);//delete picture
            }
            $member->delete();//delete member
            return "Delete done";
        }
        else{
            return "Fail, can't connect to the DB";
        }
    }
}
