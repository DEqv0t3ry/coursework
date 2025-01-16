<?php

namespace App\Http\Controllers;

use App\Models\Interviewee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IntervieweeController extends Controller
{
    public function store($request)
    {
        $interviewee = new Interviewee();
        $interviewee->second_name = $request->second_name;
        $interviewee->first_name = $request->first_name;
        $interviewee->age = $request->age;
        $interviewee->gender = $request->gender;
        $interviewee->save();

        return $interviewee;
    }

    public function ageGroups()
    {
        $politicians = DB::select("SELECT
    CASE
        WHEN age < 20 THEN 'Младше 20 лет'
        WHEN age BETWEEN 20 AND 40 THEN 'От 20 до 40 лет'
        WHEN age BETWEEN 40 AND 60 THEN 'От 40 до 60 лет'
        WHEN age > 60 THEN 'Старше 60 лет'
    END AS age_group,
    COUNT(*) AS respondents_count
FROM
    interviewees
GROUP BY
    age_group
ORDER BY
    respondents_count DESC;
");

        return $politicians;
    }
}
