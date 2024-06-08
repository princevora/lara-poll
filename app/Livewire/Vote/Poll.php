<?php

namespace App\Livewire\Vote;

use App\Http\Controllers\Polls\PollResultController;
use App\Models\Polls;
use App\Models\Votes;
use Livewire\Component;
use App\Traits\MessageTrait;
use Illuminate\Http\Request;

class Poll extends Component
{
    use MessageTrait;

    public $poll_id;

    public $polldata;

    public $votes;

    public $vote_field = 0;

    public $poll_data;

    public function mount(PollResultController $pollData, Request $request)
    {
        $this->poll_id = $request->poll_id;

        $data = Polls::query()->where('poll_id', $this->poll_id);

        $response = @$pollData->fieldsData($this->poll_id);
        
        if(!is_null($this->poll_data)){
            $this->poll_data = $response[0];
        }

        try {

            if ($data->exists()) {

                // Get Json Data
                $jsonData = $data->first()->poll_fields;

                // Change to an Array
                $this->polldata = json_decode($jsonData, true);
            }
        } catch (\Throwable $th) {
            $this->polldata = [];
        }
    }

    public function render()
    {
        return view('livewire.vote.poll');
    }

    public function save()
    {

        /**
         * array_key_exists will check the requested vote field is exists in the collection of the poll fields
         * either it will return true if exists or false if dosent exists.
         */
        if (!array_key_exists($this->vote_field, $this->polldata)) {
            return $this->sendError("Unable To Find Selected Field");
        }

        try {

            // Create an entry for vote. And Save poll Id And Vote Field
            $save = Votes::query()->create([
                'poll_id' => $this->poll_id,
                'vote_ip' => request()->ip(),
                'vote_field' => $this->vote_field,
            ]);

            if ($save) {
                return $this->sendSuccess("Successfully Voted.");
            }
        } catch (\Throwable $th) {
            return $this->sendInfo("Something went wrong {$th->getCode()}");
        }
    }
}
