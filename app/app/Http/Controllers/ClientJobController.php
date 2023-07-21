<?php
namespace App\Http\Controllers;

use App\Mail\SendClientEmail;
use App\Mail\SendJobEmail;
use App\Models\AppliedJob;
use Illuminate\Support\Facades\Session;
use App\Models\ClientJob;
use App\Models\Industry;
use App\Mail\RequestServiceMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class ClientJobController extends Controller
{

    public function Details($id){
        $id = explode('-', $id);
        $job = ClientJob::where('id', $id[0])->first();
        $job->update(['views' => $job->views + 1]);
        return view('frontend.jobs_details', [
            'job' => $job,
            'jobs' => ClientJob::take(5)->latest()->get()
        ]);
    }


    public function ApplyJob(Request $request, $id){
    $id = explode('-', $id);
        $jobAp = ClientJob::where('id',$id[0])->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'required',
        ]);
        $capt = captcha_check($request->captcha);
        if(!$capt){
            Session::flash('message', 'Captcha does not match, try again');
            Session::flash('alert', 'danger');
            return back()->withInput($request->all());
           
        }
        $check = AppliedJob::where(['email' => $request->email, 'client_jobs_id' => $jobAp->id])->first();
        if($check){
         Session::flash('message', 'You have previously applied for this job, our team will contact you as soon as possible');
         Session::flash('alert', 'danger');
         return back()->withInput();
        }
        $doc =  $request->file('image');
      // $ext = $doc->getClientOriginalExtension();
       $name = $doc->getClientOriginalName();
       $fileName = \pathinfo($name, PATHINFO_FILENAME);
       $ext = pathinfo($name, PATHINFO_EXTENSION);
       $allow = ['pdf', 'docx', 'PDF', 'docx'];
       if(!in_array($ext, $allow)){
        Session::flash('message', 'File Type not accepted, Only PDF and DOC files are accepts');
        Session::flash('alert', 'danger');
        return back()->withInput();
       } 
       $filename = $fileName.'.'.$ext;
       $doc->move('doc', $filename);
       $message = 'Dear Admin, You have received a new job application for '.$jobAp->title .' Please check the admin dashboard for more details';
        
       $data = [
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'cv' => $filename,
           'client_jobs_id' => $jobAp->id,
           'message' => $message,
           'subject' => $jobAp->title. ' '. 'Application'
       ];
       $sm =  AppliedJob::create($data);
       if($sm) {
         $jobAp->update([
        'applicants' => $jobAp->applicants + 1, 
       ]);

       }
       Mail::to(['info@otegeeconcepts.com.ng'])->send(new SendJobEmail($data));
      
       //Mail::to($request->email)->send(new SendClientEmail($data));
       
        Session::flash('message', 'Application completed successfully');
        Session::flash('alert', 'success');
        return back();
    return back()->with('Job Applied successfully');
     
    }

    public function RequestService(Request $request){

        if(!$request->key){
            return back()->withInput();
        }

       // dd($request->services);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'services' => $request->services
        ];

    $capt = captcha_check($request->captcha);
    if(!$capt){
        Session::flash('message', 'Captcha does not match, try again');
        Session::flash('alert', 'danger');
        return back()->withInput($request->all());
       
    }
        Mail::to(['info@otegeeconcepts.com.ng'])->send(new RequestServiceMail($data));
        Session::flash('message', 'Request Sent successfully');
        Session::flash('alert', 'success');
        return back();
    }
}

