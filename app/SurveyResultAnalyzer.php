<?php

namespace App;

use App\SurveyResult as Updater;

class SurveyResultAnalyzer 
{
    //
    public function __construct(Updater $updater)
    {
        $this->updater = $updater;
    }

    public function updateDatabase($answers, $gender, $group)
    {
        $gender = $gender[0];
        $group = (int) $group;
        $index = 1;
        foreach($answers as $answer)
        {
            $updateValue = $this->updater->where('question', $index)
                                         ->where('group', $group)
                                         ->where('gender', $gender)
                                         ->value($answer);
            
            $updateValue = (int) $updateValue;
            $updateValue++;

            $this->updater->where('question', $index)
                          ->where('group', $group)
                          ->where('gender', $gender)
                          ->update([$answer => $updateValue]);
            $index++;
        }
        echo "Thank You!";
    }
}
