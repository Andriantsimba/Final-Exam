<?php

namespace App\Http\Controllers;

use App\Patients;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Patients::all();

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
        $data = Patients::where('id',$id)->get();

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
        $pt = new Patients();
        $pt->Name=$request->Name;
        $pt->email=$request->email;
        $pt->Phone=$request->Phone;
        $pt->departement=$request->departement;

        if ($pt->save()) {
            $res['message'] = "Data successfully added";
            $res['value'] = "$pt";
            return response($res);
        }
    }

    public function update(Request $request, $id)
    {
        $Name = $request->Name;
        $email = $request->email;
        $Phone = $request->Phone;
        $departement = $request->departement;

        $pt = Patients::find($id);
        $pt->Name =$Name;
        $pt->email = $email;
        $pt->Phone = $Phone;
        $pt->departement=$departement;

        if ($pt->save()) {
            $res['message']= "Datasuccessfully updated!";
            $res['value'] = "$pt";
            return response($res);
        } else {
            $res['message'] = "Failed!!";
            return response($res);
        }
        
    }

    public function delete($id)
    {
        $pt = Patients::where('id',$id);

        if ($pt->delete()) {
            $res['message']="Data deleted successfully!!";
            return response($res);
        } else {
            $res['message']= "Failed!!!!";
            return response($res);
        }
        
    }
}
