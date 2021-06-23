<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use Livewire\WithPagination;

class CategoriesTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.categories.categories-table');
    }
}
