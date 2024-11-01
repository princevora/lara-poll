<?php

namespace App\Livewire\User\Dashboard;

use App\Models\Poll;
use App\Traits\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;

class EditPoll extends Component
{
    use MessageTrait;

    /**
     * @var mixed $poll
     */
    public $poll;

    /**
     * @var array<int, string> $fields 
     */
    public $fields;

    /**
     * @var string
     */
    public string $title;

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
        $this->title = $this->poll->poll_name;
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

    public function save()
    {
        $this->validate([
            'title' => 'required'
        ]);

        // Check if there is any field empty
        $emptyFields = array_filter($this->fields, function ($field) {
            return empty($field);
        });

        if(!empty($emptyFields)) {
            $errors = [];
            // Add erorrs for the empty fields.
            foreach ($emptyFields as $key => $value) {
                $errors["error_key_{$key}"] = "The Following Field Cannot Be empty"; 
            }

            throw ValidationException::withMessages($errors);
        }

        // Update poll
        $this->poll->update([
            'poll_fields' => json_encode($this->fields, JSON_FORCE_OBJECT),
            'poll_name'   => $this->title
        ]);

        return $this->sendSuccess('The Poll Has Been Updated');
    }
}
