<?php

namespace App\Http\Livewire\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateModal extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $description;
    public $brand;

    protected $rules = [
        'name' => 'required',
    ];

    protected $listeners = [
        'updateModalOpened' => 'initializeBrand',
    ];

    public function render()
    {
        return view('livewire.brands.update-modal');
    }

    public function initializeBrand(Brand $brand)
    {
        $this->brand = $brand;
        $this->name = $this->brand->name;
        $this->description = $this->brand->description;
    }

    public function getImageUrlProperty(): string
    {
        return $this->image ? $this->image->temporaryUrl() : $this->brand->image;
    }

    public function submit()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        $imageUrl = $this->image ? $this->image->store('brands') : $this->brand->image;

        $this->brand->update([
            'name' => $this->name,
            'image' => $imageUrl,
            'description' => $this->description
        ]);

        $this->resetFields();

        $this->emitUp('brandUpdated');
        $this->dispatchBrowserEvent('brand-updated');
    }

    private function resetFields()
    {
        $this->name = '';
        $this->image = null;
        $this->description = '';
    }
}
