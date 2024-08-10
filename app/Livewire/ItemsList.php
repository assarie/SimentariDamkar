<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Items;

class ItemsList extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'name';
    public $sortAsc = true;
    public $perPage = 10; // Default pagination size

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatedPerPage()
    {
        $this->resetPage(); // Reset pagination when items per page changes
    }

    public function render()
    {
        return view('livewire.items-list', [
            'items' => Items::query()
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage) // Use the perPage property here
        ]);
    }
}
