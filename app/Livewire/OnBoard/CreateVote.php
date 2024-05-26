<?php

namespace App\Livewire\OnBoard;

use Livewire\Component;

class CreateVote extends Component
{

    /**
    * @var string
    *
    * if user has not provided Or Edited The Poll name Then it will saved as New Poll By Default.
    */
    public $pollName = "New Poll";

    /**
     * @var int
     * 
     * TO perform one-page submition, we will destruct the pages in some steps
     * 
     * 0: Name the poll
     * 1: Let users Make custom fields
     * 2: Submit and Make a entry in the DB
     * 3: ask user to continute to make account or not
     * 4: if user aborted to create account, then start creating poll
     */
    public $onBoardSession = 0;


    /**
     * @var string
     * change the title of page Every time when the onboard session updates
     */
    public $onBoardTitle;

    public $fieldName = [];

    public $fields = 1;

    public function mount()
    {
        $this->onBoardTitle = match($this->onBoardSession){
            0 => $this->obBoardSessionTitleFor0(),

            1 => $this->onBoardSessionTitleFor1(),
        };

        $this->fieldName[0] = [];
    }

    public function render()
    {
        return view('livewire.on-board.create-vote');
    }

    public function createPoll(): void
    {
        sleep(1);

        // CHange title
        $this->onBoardTitle = $this->onBoardSessionTitleFor1();
        
        // CHange Session
        $this->onBoardSession = 1;
    }

    public function submitPoll()
    {
        foreach ($this->fieldName as $key => $value) {
            if(empty($value)){
                $this->fieldName[$key] = 'Unknown Field';
            }
        }

        // CHange title
        $this->onBoardTitle = $this->onBoardSessionTitleFor3();

        $this->onBoardSession = 3;
        // dd($this->fieldName);
    }

    public function incrementFields()
    {
        sleep(0.4);

       $this->fields++;

       $this->fieldName[] = 'Unknown Field';
    }

    public function abortMakeAccount()
    {
        $this->onBoardSession = 4;
        
        // $this->onBoardTitle = $this->onBoardSessionTitleFor1();
    }

    /**
     * Declare Onboard title for 0 step
     */
    private function obBoardSessionTitleFor0()
    {
        return <<<HTML
                <div>
                    <h2><i class="text-danger fa-solid fa-paperclip px-1"></i> Name Your Poll.</h2>
                </div>
            HTML;
    }

    /**
     * Declare Onboard title for 1 step
     */

    private function onBoardSessionTitleFor1()
    {
        return <<<HTML
                <div>
                    <h2><i class="text-danger fa-solid fa-location-arrow px-1"></i>Add fields To The Poll.</h2>
                </div>
            HTML;
    }

    /**
     * Declare Onboard title for 3 step
     */

     private function onBoardSessionTitleFor3()
     {
         return <<<HTML
                <div>
                    <h2><i class="text-danger fa-solid fa-question px-1"></i>Do you want to Make a Account</h2>
                    <p>Make account On Votter To Achive more customization Options</p>
                </div>
            HTML;
     }
}
