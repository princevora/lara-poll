<?php

namespace App\Livewire\OnBoard;

use Livewire\Component;

class NamePoll extends Component
{
    public $onBoardTitle;

    public $pollName;

    public function mount()
    {
        $this->pollName = 'New Poll';

        $this->onBoardTitle = <<<HTML
                <div>
                    <h2><i class="text-danger fa-solid fa-paperclip px-1"></i> Name Your Poll.</h2>
                </div>
            HTML;
    }

    public function render()
    {
        return view('livewire.on-board.name-poll');
    }

    public function createPoll()
    {
        sleep(1);

        // CHange title

        session()->put([
            'name_expiers' => time() + 60,
            'name' => $this->pollName,
        ]);

        $this->redirectRoute('vote.add-fields', true, navigate: true);
    }
}
