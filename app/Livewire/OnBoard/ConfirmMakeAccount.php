<?php

namespace App\Livewire\OnBoard;

use App\Models\Poll;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\On;
use Livewire\Component;

class ConfirmMakeAccount extends Component
{
    public $onBoardTitle;
    public $isAborted = false;
    public $poll_id;

    public function mount()
    {
        $this->onBoardTitle = <<<HTML
                <div>
                    <h2><i class="text-danger fa-solid fa-question px-1"></i>Do you want to Make a Account</h2>
                    <p>Make account On Votter To Achive more customization Options</p>
                </div>
            HTML;

        $this->poll_id = request()->poll_id;
    }

    public function render()
    {
        return view('livewire.on-board.confirm-make-account');
    }

    public function abortMakeAccount()
    {
        $this->isAborted = true;

        // activate the poll.
        Poll::where('poll_id', $this->poll_id)
                    ->update(['status' => 1]);

        // Start making the poll
        $this->dispatch('poll:start_making')->self();
    }

    public function continueMakeAccount()
    {
        return redirect()->route('auth.signup', $this->poll_id);
    }

    #[On('poll:start_making')]
    public function makePoll()
    {
        sleep(1);

        $this->isAborted = false;

        $this->redirectRoute('public.poll',['poll_id' => $this->poll_id]);
    }
}
