<?php

namespace App\Http\Controllers;

use App\Models\FormApplicants;
use Illuminate\Http\Request;

class AdminFormController extends Controller
{
    //


    public function Index()
    {
        $form = FormApplicants::latest()->get();
        return view('admin.form.index')->with('form', $form)
        ->with('bheading', 'Students')
        ->with('breadcrumb', 'Application form');

    }

    public function viewDetails($email)
    {
        $form = FormApplicants::where('email', $email)->first();
        return view('admin.form.details')
        ->with('form', $form)
        ->with('bheading', 'Students')
        ->with('breadcrumb', 'Application form');

    }
}
