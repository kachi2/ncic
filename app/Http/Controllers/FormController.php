<?php

namespace App\Http\Controllers;

use App\Models\FormApplicants;
use App\Models\SubMenu;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    //


    public function viewForm(Request $request)
    {


        $check = FormApplicants::where('email', $request->email)->first();
        if($check)
        {
            Session::flash('alert', 'danger');
            Session::flash('message', "email already registered");

            return back()->withInput($request->all());
        }
        $user = FormApplicants::create([
            'email' => $request->email,
            'name' => $request->name
        ]);
        $data['breadcrums'] = SubMenu::where('id', 25)->first();
        $data['email'] =$user['email'];
        $data['name'] = $user['name'];

       return view('frontend.memphies',$data);
    }

    public function UpdateForm(Request $request)
    {
        $user = FormApplicants::where('email', $request->email)->first();
        $capt = captcha_check($request->captcha);
        if($capt){
            Session::flash('message', 'Captcha does not match, try again');
            Session::flash('alert', 'danger');
            $data['breadcrums'] = SubMenu::where('id', 25)->first();
            $data['email'] =$user['email'];
            $data['name'] = $user['name']; 
         return view('frontend.memphies',$data);
           
        }
        $user = FormApplicants::where('email', $request->email)->first();
          if($request->document){
            $image = $request->file('document');
            $ext = $image->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $image->move('images',$fileName);
        }
        if($request->parent_signature){
            $image = $request->file('parent_signature');
            $ext = $image->getClientOriginalExtension();
            $parent_signature = time().'.'.$ext;
            $image->move('images',$parent_signature);
        }
        if($request->student_signature){
            $image = $request->file('student_signature');
            $ext = $image->getClientOriginalExtension();
            $student_signature = time().'.'.$ext;
            $image->move('images',$student_signature);
        }
        $user->update([
            'date_signed' => $request->date_signed??Carbon::now(),
            'student_signature' => $student_signature??'',
            'parent_name' => $request->parent_name,
            'parent_date_signed'  => $request->date_signed??Carbon::now(),
            'parent_signature' => $parent_signature??null,
            'document' => $fileName??null

        ]);




        Session::flash('alert', 'success');
        Session::flash('message', "Registration completed successfully");
        $data['breadcrums'] = SubMenu::where('id', 25)->first();
        $data['email'] =$user['email'];
        $data['name'] = $user['name']; 
     return view('frontend.memphies',$data);
    }
}
