<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TerritoryController extends Controller
{
    public function popular()
    {
        $politicians = DB::select("SELECT
    t.name AS territory_name,
    COUNT(ip.id) AS total_mentions
FROM
    territories t
JOIN
    politicians p ON t.id = p.territory_id
JOIN
    interviewees_politicians ip ON p.id = ip.politician_id
GROUP BY
    t.id, t.name
ORDER BY
    total_mentions DESC;
");

        return $politicians;
    }
}
