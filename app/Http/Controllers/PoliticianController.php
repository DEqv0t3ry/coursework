<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliticianController extends Controller
{
    public function popular()
    {
        $interviewees = DB::select("SELECT
    p.id AS politician_id,
    CONCAT(p.first_name, ' ', p.second_name) AS politician_name,
    COUNT(ip.id) AS mention_count
FROM
    interviewees_politicians ip
JOIN
    politicians p ON ip.politician_id = p.id
GROUP BY
    p.id, p.first_name, p.second_name
ORDER BY
    mention_count DESC
LIMIT 5;");

        return $interviewees;
    }

    public function popularByAge()
    {
        $politicians = DB::select("SELECT
    p.id AS politician_id,
    CONCAT(p.first_name, ' ', p.second_name) AS politician_name,
    COUNT(ip.id) AS mention_count
FROM
    interviewees_politicians ip
JOIN
    politicians p ON ip.politician_id = p.id
JOIN
    interviewees i ON ip.interviewee_id = i.id
WHERE
    i.age < 20
GROUP BY
    p.id, p.first_name, p.second_name
ORDER BY
    mention_count DESC;");

        return $politicians;
    }

    public function popularByGender()
    {
        $politicians = DB::select("SELECT
    p.id AS politician_id,
    CONCAT(p.first_name, ' ', p.second_name) AS politician_name
FROM
    politicians p
JOIN
    interviewees_politicians ip ON p.id = ip.politician_id
JOIN
    interviewees i ON ip.interviewee_id = i.id
GROUP BY
    p.id, p.first_name, p.second_name
HAVING
    COUNT(CASE WHEN i.sex = 'male' THEN 1 END) = COUNT(CASE WHEN i.sex = 'female' THEN 1 END);
");

        return $politicians;
    }

    public function popularByOrders()
    {
        $politicians = DB::select("SELECT
    p.id AS politician_id,
    CONCAT(p.first_name, ' ', p.second_name) AS politician_name,
    COUNT(DISTINCT po.order_id) AS fulfilled_orders_count,
    COUNT(ip.id) AS mention_count
FROM
    politicians p
LEFT JOIN
    politicians_orders po ON p.id = po.politician_id
LEFT JOIN
    orders o ON po.order_id = o.id
LEFT JOIN
    interviewees_politicians ip ON p.id = ip.politician_id
GROUP BY
    p.id, p.first_name, p.second_name
ORDER BY
    fulfilled_orders_count DESC, mention_count DESC;
");

        return $politicians;
    }

    public function firstPlaceInInterview()
    {
        $politicians = DB::select("SELECT
    p.id AS politician_id,
    CONCAT(p.first_name, ' ', p.second_name) AS politician_name,
    COUNT(ip.id) AS first_priority_count
FROM
    interviewees_politicians ip
JOIN
    politicians p ON ip.politician_id = p.id
WHERE
    ip.priority = 1
GROUP BY
    p.id, p.first_name, p.second_name
ORDER BY
    first_priority_count DESC;
");

        return $politicians;
    }

    public function withEveryAgeGroups()
    {
        $politicians = DB::select("SELECT
    p.id AS politician_id,
    CONCAT(p.first_name, ' ', p.second_name) AS politician_name
FROM
    politicians p
JOIN
    interviewees_politicians ip ON p.id = ip.politician_id
JOIN
    interviewees i ON ip.interviewee_id = i.id
GROUP BY
    p.id, p.first_name, p.second_name
HAVING
    COUNT(DISTINCT CASE
                   WHEN i.age < 20 THEN 'group_1'
                   WHEN i.age BETWEEN 20 AND 40 THEN 'group_2'
                   WHEN i.age BETWEEN 40 AND 60 THEN 'group_3'
                   WHEN i.age > 60 THEN 'group_4'
                   END) = 4;
");

        return $politicians;
    }
}
