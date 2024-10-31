<?php

namespace App\Livewire\User\Dashboard;

use App\Models\Poll;
use Illuminate\Http\Request;
use Livewire\Component;

class EditPoll extends Component
{
    /**
     * @var mixed $poll
     */
    public $poll;

    /**
     * @var array<int, string> $fields 
     */
    public $fields;

    /**
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function mount(Request $request)
    {
        try {
            $this->poll = Poll::where('poll_id', $request->poll_id)->firstOrFail();
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, 'Poll not found');
        }

        $this->fields = json_decode($this->poll->poll_fields, true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.user.dashboard.edit-poll');
    }

    /**
     * @param int $key
     * @return void
     */
    public function deleteField(int $key)
    {
        array_splice($this->fields, $key, 1);
    }

    public function addField()
    {
        $this->fields[] = 'This is a ' . count($this->fields) + 1;
    }
}
