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
    public function viewForm(Request $request)
    {
         FormApplicants::create([
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'date_signed' => Carbon::now(),
            'parent_date_signed' => Carbon::now(),
        ]);
        $data['users'] =  FormApplicants::where('email', $request->email)->first();
       return view('frontend.memphies',$data);
    }

    public function UpdateForm(Request $request)
    {
        $user = FormApplicants::where('email', $request->email)->first();
        $validate = Validator::make($request->all(), [
                'resume' => 'required',
                'personal_statement' => 'required',
                'parent_signature' => 'mimes:jpg,png,jpeg',
                'student_signature' => ['required','mimes:jpg,png,jpeg'],
        ]);
        if($validate->fails())
        {
            Session::flash('message', $validate->errors()->first());
            Session::flash('alert', 'danger');
            $valid['breadcrums'] = SubMenu::where('id', 25)->first();
            $valid['users'] = $user;
              return view('frontend.memphies',$valid); 
        }
        $capt = captcha_check($request->captcha);
        // if(!$capt){
        //     Session::flash('message', 'Captcha does not match, try again');
        //     Session::flash('alert', 'danger');
        //     $valid['breadcrums'] = SubMenu::where('id', 25)->first();
        //     $valid['users'] = $user; 
        //  return view('frontend.memphies',$valid);
           
        // }
          if($request->document){
            $image = $request->file('document');
            $fileName = $image->getClientOriginalName();
            $ext = $image->getClientOriginalExtension();
            $consentForm =  $fileName;
            $image->move('images',$fileName);
        }
        if($request->parent_signature){
            $image = $request->file('parent_signature');
            $fileName = $image->getClientOriginalName();
            $ext = $image->getClientOriginalExtension();
            $parent_signature = $fileName;
            $image->move('images',$parent_signature);
        }
        if($request->student_signature){
            $image = $request->file('student_signature');
            $fileName = $image->getClientOriginalName();
            // $ext = $image->getClientOriginalExtension();
            $student_signature = $fileName;
            $image->move('images',$student_signature);
        }
        if($request->personal_statement){
            $image = $request->file('personal_statement');
            $fileName = $image->getClientOriginalName();
            $ext = $image->getClientOriginalExtension();
            $personal_statement = time().'.'.$ext;
            $image->move('images',$personal_statement);
        }
        if($request->resume){
            $image = $request->file('resume');
            $fileName = $image->getClientOriginalName();
            $ext = $image->getClientOriginalExtension();
            $resume = $fileName;
            $image->move('images',$resume);
        }
        $data = [
            'student_signature' => $student_signature??'',
            'parent_name' => $request->parent_name,
            'parent_signature' => $parent_signature??null,
            'document' => $consentForm??null,
            'resume' => $resume??null,
            'personal_statement' => $personal_statement??null,
        ];

        
        $user->update($data);
        $data['name'] = $user['name'];
        $data['email'] = $user['email'];
        $data['phone'] = $user['phone'];
        Mail::to('college-fair@otegeeconcepts.com.ng')->send(new FormCreationEmail($data));
        Session::flash('alert', 'success');
        Session::flash('message', "Registration completed successfully");
        $data['breadcrums'] = SubMenu::where('id', 25)->first();
        $data['users'] =$user;
     return view('frontend.memphies',$data);
    }
}
