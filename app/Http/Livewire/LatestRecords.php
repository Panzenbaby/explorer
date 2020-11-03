<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\ManagesLatestBlocks;
use App\Http\Livewire\Concerns\ManagesLatestTransactions;
use App\ViewModels\ViewModelFactory;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

final class LatestRecords extends Component
{
    use ManagesLatestBlocks;
    use ManagesLatestTransactions;

    public array $state = [
        'selected' => 'transactions',
        'type'     => 'all',
    ];

    /** @phpstan-ignore-next-line */
    protected $listeners = ['filterTransactionsByType'];

    private ?Collection $blocks = null;

    private ?Collection $transactions = null;

    public function render(): View
    {
        if ($this->state['selected'] === 'blocks') {
            return $this->renderBlocks();
        }

        return $this->renderTransactions();
    }

    private function renderBlocks(): View
    {
        if (is_null($this->blocks)) {
            $this->blocks = new Collection();
        }

        return view('livewire.latest-records', [
                'blocks' => ViewModelFactory::collection($this->blocks),
            ]);
    }

    private function renderTransactions(): View
    {
        if (is_null($this->transactions)) {
            $this->transactions = new Collection();
        }

        return view('livewire.latest-records', [
            'transactions' => ViewModelFactory::collection($this->transactions),
        ]);
    }
}