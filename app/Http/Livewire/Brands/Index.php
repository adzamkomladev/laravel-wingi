<?php

namespace App\Http\Livewire\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'brandCreated' => 'refreshTable',
        'brandUpdated' => 'refreshTable'
    ];

    public function render()
    {
        return view('livewire.brands.index', [
            'brands' => Brand::paginate(8),
        ]);
    }

    public function refreshTable()
    {
        $this->resetPage();
    }

    public function delete(Brand $brand)
    {
        $brand->delete();

        $this->resetPage();
    }
}
