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
        $member->save();
        return "Add done";
    }

    public function getEdit ($id) {
        return Member::findOrFail($id);
    }

    public function postEdit (Request $request,$id) {
        $member = Member::findOrFail($id);
        $member->name       = $request->name;
        $member->age        = $request->age;
        $member->address      = $request->address;
        $member->save();
        return "Edit done";
    }

    public function getDelete ($id) {
        $member = Member::findOrFail($id);
        $member->delete();
        return "Xóa thành công";
    }
}
