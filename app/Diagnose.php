<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Phq2Result as Phq2;
use App\Phq9Result as Phq9;

class Diagnose 
{
    //
    public function __construct(Phq2 $phq2Updater, Phq9 $phq9Updater)
    {
        $this->phq2Updater = $phq2Updater;
        $this->phq9Updater = $phq9Updater;
    }

    public function phq2Submit($gender, $group, $answers)
    {
        $points = $this->calculatePhqScore($answers);
        $gender = $gender[0];
        $group = (int) $group;
        $index = 1;   
        foreach($answers as $answer)
        {
            $updateValue = $this->phq2Updater->where('question', $index)
                                         ->where('group', $group)
                                         ->where('gender', $gender)
                                         ->value($answer);

            $updateValue = (int) $updateValue;
            $updateValue++;

            $this->phq2Updater->where('question', $index)
                          ->where('group', $group)
                          ->where('gender', $gender)
                          ->update([$answer => $updateValue]);
            $index++;
        }
        return $points;
    }

    public function phq9Submit($gender, $group, $answers)
    {
        $points = $this->calculatePhqScore($answers);
        $gender = $gender[0];
        $group = (int) $group;
        $index = 1;   
        foreach($answers as $answer)
        {
            $updateValue = $this->phq9Updater->where('question', $index)
                                             ->where('group', $group)
                                             ->where('gender', $gender)
                                             ->value($answer);

            $updateValue = (int) $updateValue;
            $updateValue++;

            $this->phq9Updater->where('question', $index)
                              ->where('group', $group)
                              ->where('gender', $gender)
                              ->update([$answer => $updateValue]);
            $index++;
        }
        return $points;
    }

    public function further_phq9($inputs)
    {
        if($inputs['q1'] == 1 || $inputs['q1'] == 2) $return = "Increase engagement with your environment, do safe aerobic exercises. Also, increase pleasant activities and other positive interactions with your environment. Nothing much. We'll get back to you next month";
        if($inputs['q1'] == 3 && $inputs['q2'] == 1) $return = "You're in partial remission. You'll be okay in no time!";
        if($inputs['q1'] == 3 && $inputs['q2'] == 2) $return = "Antidepressant treatment is recommended. Consult a doctor";
        return $return;
    }

    private function calculatePhqScore($answers)
    {
        $points = 0;
        foreach($answers as $answer)
        {
            if($answer === 'na')         $points = $points;
            else if($answer === 'sd')    $points += 1; 
            else if($answer === 'hd')    $points += 2; 
            else if($answer === 'ne')    $points += 3; 
        }
        return $points;
    }
}
