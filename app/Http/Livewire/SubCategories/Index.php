<?php

namespace App\Http\Livewire\SubCategories;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class Index extends Component
{
    public $subCategories;
    public $category;

    protected $listeners = ['subCategoryAdded' => 'refreshCategory'];

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->subCategories = $this->category->subCategories;
    }

    public function render()
    {
        return view('livewire.sub-categories.index');
    }

    public function refreshCategory()
    {
        $this->category->refresh();
        $this->subCategories = $this->category->subCategories;
    }

    public function delete(SubCategory $subCategory)
    {
        $id = $subCategory->id;
        $subCategory->delete();

        $this->subCategories = $this->subCategories->filter(fn ($subCategory) => $subCategory->id != $id);
    }
}
