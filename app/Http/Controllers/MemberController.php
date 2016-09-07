<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Member;
use DateTime;

class MemberController extends Controller
{
    public function getList () {
        return Member::orderBy('id','ASC')->get();
    }

    public function getAdd (Request $request) {
        $member             = new Member;
        $member->name       = $request->name;
        $member->age        = $request->age;
        $member->address    = $request->address;

        $photo = time().".jpg";
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file->move('img',$photo);
            $member->image = $photo;
            //$member->image = "got photo";
        }//ma am ???
        else{
            $member->image = "nophoto.jpg";
        }
        $member->save();
        //--- End of upload file
        //return $member;
    }

    public function getEdit ($id) {
        return Member::findOrFail($id);
    }

    public function postEdit (Request $request,$id) {
        $member = Member::findOrFail($id);
        $member->name       = $request->name;
        $member->age        = $request->age;
        $member->address      = $request->address;

        $photo = time().".jpg";
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file->move('img',$photo);
            $member->image = $photo;
        }//Khi edit, n?u không s?a ?nh th? cho qua

        $member->save();
        return "Edit done";
    }

    public function getDelete ($id) {
        $member = Member::findOrFail($id);
        $member->delete();
        return "Xóa thành công";
    }
}
