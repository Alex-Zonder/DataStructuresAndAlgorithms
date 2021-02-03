# Алгоритмы и структуры данных #

# Установка пакетом через composer #
composer.json
```json
"repositories":[
    {
        "type": "vcs",
        "url": "git@github.com:Alex-Zonder/DataStructuresAndAlgorithms.git"
    }
],
"require": {
    "structures/algorithms": "*"
}
```
# Тестовый index.php #
```php
require 'vendor/autoload.php';

use Algorithms\Sort\MergeSort;
use Algorithms\Backpack\Backpack;

$sort = new MergeSort();
$backpack = new Backpack($sort);

$maxWeight = 10;
$items = [
    ["weight" => 4, "price" => 3],
    ["weight" => 3, "price" => 4],
    ["weight" => 2, "price" => 3],
    ["weight" => 2, "price" => 2]
];
echo $backpack->calcPriceGreedy($maxWeight, $items)."\n";
echo $backpack->calcPriceBruteForce($maxWeight, $items)."\n";
echo $backpack->calcPriceBranchAndBound($maxWeight, $items)."\n";
```
