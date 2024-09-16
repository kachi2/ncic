<?php

namespace App\Http\Controllers;

use App\Mail\FormCreationEmail;
use App\Models\FormApplicants;
use App\Models\SubMenu;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
            'name' => $request->name,
            'phone' => $request->phone,
            'date_signed' => Carbon::now(),
            'parent_date_signed' => Carbon::now(),
        ]);
        $data['breadcrums'] = SubMenu::where('id', 25)->first();
        $data['email'] =$user['email'];
        $data['name'] = $user['name'];
        $data['date_signed'] = $user['date_signed'];
        $data['parent_date_signed'] = $user['parent_date_signed'];

       return view('frontend.memphies',$data);
    }

    public function UpdateForm(Request $request)
    {
        $user = FormApplicants::where('email', $request->email)->first();
        $validate = Validator::make($request->all(), [
                        'resume' => 'required',
                        'personal_statment' => 'required',
                        'parent_signature' => 'mimes:jpg,png,jpeg',
                        'student_signature' => 'mimes:jpg,png,jpeg',
        ]);
        if($validate->fails())
        {
            Session::flash('message', 'Captcha does not match, try again');
            Session::flash('alert', 'danger');
            $data['breadcrums'] = SubMenu::where('id', 25)->first();
            $data['email'] =$user['email'];
            $data['name'] = $user['name']; 
            $data['date_signed'] = $user['date_signed'];
            $data['parent_date_signed'] = $user['parent_date_signed'];
              return view('frontend.memphies',$data); 
        }
        $capt = captcha_check($request->captcha);
        if($capt){
            Session::flash('message', 'Captcha does not match, try again');
            Session::flash('alert', 'danger');
            $data['breadcrums'] = SubMenu::where('id', 25)->first();
            $data['email'] =$user['email'];
            $data['name'] = $user['name']; 
            $data['date_signed'] = $user['date_signed'];
            $data['parent_date_signed'] = $user['parent_date_signed'];
         return view('frontend.memphies',$data);
           
        }
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
        if($request->personal_statment){
            $image = $request->file('personal_statment');
            $ext = $image->getClientOriginalExtension();
            $personal_statment = time().'.'.$ext;
            $image->move('images',$personal_statment);
        }
        if($request->resume){
            $image = $request->file('resume');
            $ext = $image->getClientOriginalExtension();
            $resume = time().'.'.$ext;
            $image->move('images',$resume);
        }
        $data = [
            'date_signed' => $request->date_signed??Carbon::now(),
            'student_signature' => $student_signature??'',
            'parent_name' => $request->parent_name,
            'parent_date_signed'  => $request->date_signed??Carbon::now(),
            'parent_signature' => $parent_signature??null,
            'document' => $fileName??null,
            'resume' => $resume??null,
            'personal_statement' => $personal_statment??null,
        ];
        $user->update([$data]);
        $data['name'] = $user['name'];
        $data['email'] = $user['email'];
        $data['phone'] = $user['phone'];
        Mail::to('info@otegeeconcepts.com.ng')->send(new FormCreationEmail($data));

        Session::flash('alert', 'success');
        Session::flash('message', "Registration completed successfully");
        $data['breadcrums'] = SubMenu::where('id', 25)->first();
        $data['email'] =$user['email'];
        $data['name'] = $user['name']; 
        $data['date_signed'] = $user['date_signed'];
        $data['parent_date_signed'] = $user['parent_date_signed'];
     return view('frontend.memphies',$data);
    }
}
