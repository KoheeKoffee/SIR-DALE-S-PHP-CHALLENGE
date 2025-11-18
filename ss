$addons = $_POST["addons"] ?? [];
$a_list = implode(", ", $addons);

$addons_p [
    "Welkin" => 250,
    "Battle Pass" => 500
];

$a_total = 0;
foreach($addons as $a){
    $a_total += $addons_p[$a];
}