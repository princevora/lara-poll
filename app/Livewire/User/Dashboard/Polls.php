<?php
namespace App\Livewire\User\Dashboard;

use App\Models\Poll;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;

use function Laravel\Prompts\select;

class Polls extends Component
{
    public $user_id;
    
    #[Url(as: 'query')]
    public $search = '';

    public $timePeriod = '';

    public function mount()
    {
        $this->user_id = auth()->user()->id;
    }

    public function render()
    {
        return view('livewire.user.dashboard.polls', [
            'polls' => $this->initialize()
        ]);
    }

    private function initialize()
    {
        $query = Poll::query()
                ->where('user_id', $this->user_id)
                ->where(function($query){
                    $query->where('polls.poll_id', 'LIKE', "%{$this->search}%");
                    $query->orWhere('poll_fields', 'LIKE', "%{$this->search}%");
                });
        // Get data For last 7 Days If Its 7
        if($this->timePeriod == 7){
            $query->where('created_at','<=', now()->subDays(7));
        }

        // Get data For last Month
        elseif($this->timePeriod == 28){
            $query->whereBetween('created_at', [now()->subMonth(), now()]);
        }

        return $query->get();
    }

    /**
     * @param string $poll_id
     */
    // public function getVoteCount($poll_id)
    // {
    // }
}

