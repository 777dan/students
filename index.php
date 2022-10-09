<?php
echo "<link rel='stylesheet' href='style.css'>";
$students = [
    [
        "name" => "Joan",
        "surname" => "Joanson",
        "year" => 2005,
        "marks" => [
            "PHP" => 4,
            "JS" => 3,
            "HTML" => 5
        ]
    ],
    [
        "name" => "Jack",
        "surname" => "Smith",
        "year" => 2003,
        "marks" => [
            "PHP" => 3,
            "JS" => 3,
            "HTML" => 4
        ]
    ],
    [
        "name" => "Martin",
        "surname" => "Miller",
        "year" => 2004,
        "marks" => [
            "PHP" => 4,
            "JS" => 3,
            "HTML" => 5
        ]
    ],
    [
        "name" => "Henry",
        "surname" => "William",
        "year" => 1999,
        "marks" => [
            "PHP" => 2,
            "JS" => 1,
            "HTML" => 3
        ]
        ],
        [
            "name" => "Peter",
            "surname" => "Watson",
            "year" => 2001,
            "marks" => [
                "PHP" => 5,
                "JS" => 4,
                "HTML" => 5
            ]
        ]

];


//сортировка по именам
// function cmp_name($a, $b)
// {
//     return ($a["name"] <=> $b["name"]);
// }
// uasort($students, "cmp_name");

//сортировка по фамилиям
// function cmp_surname($a, $b)
// {
//     return ($a["surname"] <=> $b["surname"]);
// }
// uasort($students, "cmp_surname");

//сортировка по годам
function cmp_year($a, $b)
{
    return ($a["year"] <=> $b["year"]);
}
uasort($students, "cmp_year");

//сортировка по средним баллам
// function cmp_GPA($a, $b)
// {
//     return (array_sum($a['marks']) / count($a['marks'])) <=> (array_sum($b['marks']) / count($b['marks']));
// }
// uasort($students, "cmp_GPA");

$students1 = array_chunk($students, 1, true);

function try_walk($students1, $value)
{
    echo "<tr>";
    foreach ($students1 as $key1 => $value1) {
        // foreach ($value1 as $key2 => $value2) {
        if (!is_array($value1)) {
            echo "<td>$value1</td>\n";
        }
        // if (is_array($value1)) {
        else {
            // echo "<td>$key1: </td>\n";
            foreach ($value1 as $key2 => $value2) {
                $GPA = round(array_sum($value1) / count($value1));
                echo "<td>\t$value2</td>\n";
            }
            echo "<td>\t$GPA</td>\n";
            echo "</tr>";
            echo "\n";
        }
    }
}

echo "<table>";
echo "<tr><th rowspan='2'>Name</th><th rowspan='2'>Surname</th><th rowspan='2'>Year</th><th colspan='4'>Marks</th></tr>";
echo "<tr><th>PHP</th><th>JS</th><th>HTML</th><th>GPA</th></tr>";

for ($i=0; $i < count($students); $i++) { 
    array_walk($students1[$i], "try_walk");
}
// array_walk($students, "try_walk");
echo "</table>";
