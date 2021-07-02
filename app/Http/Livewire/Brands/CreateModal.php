<?php

namespace App\Http\Livewire\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateModal extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $description;

    protected $rules = [
        'name' => 'required',
        'image' => 'required|image'
    ];

    public function render()
    {
        return view('livewire.brands.create-modal');
    }

    public function submit()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        $imageUrl = $this->image->store('brands');

        Brand::create([
            'name' => $this->name,
            'image' => $imageUrl,
            'description' => $this->description
        ]);

        $this->resetFields();

        $this->emitUp('brandCreated');
        $this->dispatchBrowserEvent('brand-created');
    }

    private function resetFields()
    {
        $this->name = '';
        $this->image = null;
        $this->description = '';
    }
}
