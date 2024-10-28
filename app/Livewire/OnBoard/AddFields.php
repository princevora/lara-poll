<?php

namespace App\Livewire\OnBoard;

use App\Models\Poll;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Traits\MessageTrait;
use Illuminate\Support\Facades\Auth;

class AddFields extends Component
{
    /**
     * Use MessageTrait To send sweet alert messages [Success, error, Info..]
     */
    use MessageTrait;

    /**
     * @var array
     */
    public $fieldName = [];

    /**
     * @var int
     */
    public $fields = 1;

    /**
     * @var string
     */
    public $onBoardTitle;

    /**
     * @var string
     */
    public $poll_name;

    public function mount()
    {
        $this->onBoardTitle = <<<HTML
                <div>
                    <h2><i class="text-danger fa-solid fa-location-arrow px-1"></i>Add fields To The Poll.</h2>
                </div>
            HTML;

        $this->fieldName[0] = [];

        
        if(!$this->checkData()){
            return redirect('/');
        }
        else{
            $this->poll_name = session('name');
        }

    }

    public function render()
    {
        return view('livewire.on-board.add-fields');   
    }

    private function checkData()
    {
        $session = session('name_expiers');
        
        return !$session || $session < time() ? false : true; 
    }

    public function incrementFields()
    {
        $this->fields++;

        $this->fieldName[] = [];
    }

    public function submitPoll()
    {
        sleep(1.4);

        $error = '';

        foreach ($this->fieldName as $key => $value) {
            if(empty($value)){
                $error = "Some of Your field Doesnt Have a field Name";
            }
        }

        if(count($this->fieldName) < 2)
        {
            return $this->sendError("Your Poll Should Have minimum Two Fields");
        }

        if($error !== ''){
            return $this->sendError($error);
        }

        $poll_id = 'poll_' . Str::random(12) . substr(time(), -4);

        /**
         * @var int
         * $userMode will be able to have values : 0 and 1 
         * where 0 = guest mode and 1 = Registered User
         */

         $created_by = 0; 
         
         $userId = null;
         
        if(auth()->check()){
            $created_by = 1;
            
            // if any logged in user has created post
            $userId = auth()->user()->id;
        }


        // Save the Poll TO DB.
        try {

            Poll::create([
                'poll_name'   => $this->poll_name,
                'poll_fields' => json_encode($this->fieldName, JSON_FORCE_OBJECT),
                'poll_id'     => $poll_id,
                'created_by'  => $created_by,
                'status'      => 0,
                'user_id'     => $userId
            ]);

            return $this->redirectRoute('vote.confirm-account', ['poll_id' => $poll_id], navigate: true);

        } catch (\Throwable $th) {
            throw ValidationException::withMessages(['error' => "Error"]);
        }
    }
}
