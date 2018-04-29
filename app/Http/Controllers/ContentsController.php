<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgeGroup as AgeGroups;

class ContentsController extends Controller
{
    //
    public function index()
    {
        return view('contents/index');
    }

    public function diagnose(AgeGroups $groups)
    {
        $data = [];
        $data['groups'] = $groups->all();
        return view('contents/diagnose', $data);
    }

    public function survey(AgeGroups $age_groups)
    {
        $data['groups'] = $age_groups->all();
        return view('contents/survey', $data);
    }
}
