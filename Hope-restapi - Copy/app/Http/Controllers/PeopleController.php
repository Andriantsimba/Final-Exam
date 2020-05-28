<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = People::all();

        if (count($data) > 0) {
            $res['message'] = "success!!!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['message']= "empty";
            return response($res);
        }
    }

    public function getId($id)
    {
        $data = People::where('id',$id)->get();

        if (count($data) > 0) {
            $res['message'] = "success!!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['message'] ="Failed!!";
            return response($res);
        }
    }
    public function create(Request $request)
    {
        $pl = new People();
        $pl->name=$request->name;
        $pl->email=$request->email;
        $pl->phone=$request->phone;
        $pl->address=$request->address;

        if ($pl->save()) {
            $res['message'] = "Data successfully added";
            $res['value'] = "$pl";
            return response($res);
        }
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;

        $pl = People::find($id);
        $pl->name =$name;
        $pl->email = $email;
        $pl->phone = $phone;
        $pl->address=$address;

        if ($pl->save()) {
            $res['message']= "Datasuccessfully updated!";
            $res['value'] = "$pl";
            return response($res);
        } else {
            $res['message'] = "Failed!!";
            return response($res);
        }
    }

    public function delete($id)
    {
        $pl = People::where('id',$id);

        if ($pl->delete()) {
            $res['message']="Data deleted successfully!!";
            return response($res);
        } else {
            $res['message']= "Failed!!!!";
            return response($res);
        }
    }
}
