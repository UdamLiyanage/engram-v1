<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diagnose as Diagnose;
use App\Phq2Question as Phq2;
use App\Phq9Question as Phq9;

class DiagnoseController extends Controller
{
    //
    public function diagnose(Request $request, Phq2 $questions)
    {
        $request->session()->put('gender', $request->input('gender'));
        $request->session()->put('group', $request->input('group'));
        $data['questions'] = $questions->all();
        return view('diagnose/phq2', $data);
    }

    public function phq2(Request $request, Diagnose $inserter)
    {
        $inputs = [];
        $inputs = $request->all();
        array_pull($inputs, '_token');
        $points = $inserter->phq2Submit($request->session()->get('gender'), $request->session()->get('group'), $inputs);
        if($points > 3)
            return redirect()->route('phq9_get');
        else 
            return redirect()->route('no-depression');
    }

    public function noDepression()
    {
        return view('diagnose/no-depression');
    }

    public function phq9Questions(Phq9 $questions)
    {
        $data['questions'] = $questions->all();
        return view('diagnose/phq9', $data);
    }

    public function phq9(Request $request, Diagnose $inserter)
    {
        $inputs = [];
        $inputs = $request->all();
        array_pull($inputs, '_token');
        $points = $inserter->phq9Submit($request->session()->get('gender'), $request->session()->get('group'), $inputs);
        echo "PHQ-9 Score ".$points;
    }
}
