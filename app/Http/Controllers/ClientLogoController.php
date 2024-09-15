<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientLogo;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ClientLogoController extends Controller
{
    //

    public function Index(){
        return view('admin.settings.logo_index', [
            'logos' => ClientLogo::latest()->get()
        ])
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings');
    }
    public function Create(){
        return view('admin.settings.logo_create')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings');
    }

    public function Store(Request $request){
        $request->validate([
            'image' => 'required',
        ]);

        if($request->file('image')){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            Image::make($image)->resize(234,80)->save('images/'.$fileName);
            // $image->move('images',$fileName);
    }
    $link = route('subpages', encrypt($request->link));
        $data = [
            'image' =>   $fileName
        ];

        ClientLogo::create($data);
        \Session::flash('alert', 'success');
        \Session::flash('message', 'Logo Added Successfully');
        return back();
    }

    public function Delete($id){
        $logo = ClientLogo::where('id', decrypt($id))->first();
        if($logo->delete()){
        \Session::flash('alert', 'error');
        \Session::flash('message', 'Logo Deleted Successfully');
        return back();
        }
    }
}
