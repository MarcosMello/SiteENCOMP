<?php

namespace App\Repository;

use App\Models\CoffeeBreak;
use App\Repository\Interfaces\CoffeeBreakRepositoryInterface;
use JetBrains\PhpStorm\Pure;

class CoffeeBreakRepository extends BaseRepository implements CoffeeBreakRepositoryInterface
{
    #[Pure]
    public function __construct(CoffeeBreak $coffeeBreak)
    {
        parent::__construct($coffeeBreak);
    }
}
