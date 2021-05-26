<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Card extends Component
{
    use WithPagination;
    public $getQueryString = ['page'];
    public $perPage = 9;
    public $query = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $contacts = Contact::where('name', 'like', "%$this->query%")
                            ->orWhere('phone', 'like', "%$this->query%")
                            ->orWhere('email', 'like', "%$this->query%")
                            ->orderBy('id', 'desc')->paginate($this->perPage);

        $tasks = Task::get();
        $this->page > $contacts->lastPage() ? $this->page = $contacts->lastPage() : true;

        return view('livewire.contact.card', [
            'contacts' => $contacts,
            'tasks' => $tasks,
        ]);
    }
}
