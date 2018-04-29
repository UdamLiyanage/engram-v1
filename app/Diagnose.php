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
