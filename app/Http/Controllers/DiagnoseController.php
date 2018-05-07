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
        {
            return redirect()->route('phq9_get');
        }
        else
        {
            $data['message'] = "No signs of depression detected. All good.";
            $data['points'] = $points;
            return view('result/phq2', $data);
        }
    }

    public function noDepression()
    {
        return view('result/phq2');
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
        $data['points'] = $points;
        if($points >= 0 && $points <= 4)
        {
            $data['message'] = "No signs of depression detected. What you're experiencing right now is normal. No further action recommended. You'll be alright";
        }
        else if($points >=5 && $points <= 9)
        {
            return view('diagnose/further_phq9');
        }
        else if($points >=10 && $points<=14)
        {
            $data['message'] = "Mild depression. You can try to engage more with your environment and socialise a little with close friends. Distance yourself from negative people. Try doing physical activities you love doing. We will get back to you next week";
        }
        else if($points >= 15 && $points <= 19)
        {
            $data['message'] = "Moderate depression. Stop/reduce the daily chores that stress you out. Distance yourself from negativity and stress. A visit to the doctor recommended. We will get back to you next week.";
        }
        else
        {
            $data['message'] = "Use of antidepressant medications and psychotherapy recommended. Consult a doctor immediately.";
        }
        return view('result/phq9', $data);
    }

    public function phq9_further(Request $request, Diagnose $diagnose)
    {
        $inputs = $request->all();
        array_pull($inputs, '_token');
        $data['message'] = $diagnose->further_phq9($inputs);
        return view('result/further_phq9', $data);
    }
}
