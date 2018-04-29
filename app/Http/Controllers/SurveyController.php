<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey as Survey;
use App\SurveyResultAnalyzer as Results;

class SurveyController extends Controller
{
    //
    public function survey(Survey $survey, Request $request)
    {
        $data = [];
        $group = ['Younger than 21', '21-30', '31-40', '41-50', '51-60', 'Older than 60'];
        $offset = (int) $request->input('group');
        $data['gender'] = $request->input('gender');
        $data['group'] = $group[$offset-1];
        $request->session()->put('gender', $data['gender']);
        $request->session()->put('group',  $request->input('group'));
        $data['questions'] = $survey->all();
        return view('survey/take', $data);
    }

    public function submit(Request $request, Results $results)
    {
        $inputs = [];
        $inputs = $request->all();
        array_pull($inputs, '_token');
        $results->updateDatabase($inputs, $request->session()->get('gender'), $request->session()->get('group'));
    }

    public function test(Results $results)
    {
        $data = ['a', 'na', 'na', 'a', 'a', 'na', 'a', 'a', 'd', 'na', 'a', 'a', 'na', 'a', 'a', 'na', 'na', 'a', 'a', 'a'];
        $gender = "male";
        $group = '1';
        $results->updateDatabase($data, $gender, $group);
    }

}
