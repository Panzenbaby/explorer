<?php

declare(strict_types=1);

namespace App\Http\Livewire\Concerns;

use App\Enums\OrderingDirectionEnum;
use App\Enums\OrderingTypeEnum;
use App\Models\Scopes\OrderByAddressAscScope;
use App\Models\Scopes\OrderByAddressDescScope;
use App\Models\Scopes\OrderByBalanceAscScope;
use App\Models\Scopes\OrderByBalanceDescScope;
use App\Models\Scopes\OrderBySupplyAscScope;
use App\Models\Scopes\OrderBySupplyDescScope;

trait WalletsOrdering
{
    use Ordering;

    public string $ordering          = OrderingTypeEnum::BALANCE;

    public string $orderingDirection = OrderingDirectionEnum::DESC;

    public function orderWalletsBy(string $value): void
    {
        $this->ordering = $value;

        $this->orderingDirection = $this->orderingDirection === OrderingDirectionEnum::DESC ? OrderingDirectionEnum::ASC : OrderingDirectionEnum::DESC;
    }

    private function getOrderingScope(): string
    {
        $scopes = [
            'address' => ['asc' => OrderByAddressAscScope::class, 'desc' => OrderByAddressDescScope::class],
            'balance' => ['asc' => OrderByBalanceAscScope::class, 'desc' => OrderByBalanceDescScope::class],
            'supply'  => ['asc' => OrderBySupplyAscScope::class, 'desc' => OrderBySupplyDescScope::class],
        ];

        return $scopes[$this->ordering][$this->orderingDirection];
    }
}
