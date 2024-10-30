<?php
namespace App\Livewire\User\Dashboard;

use App\Models\Poll;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Component;

use function Laravel\Prompts\select;

class Polls extends Component
{
    public $user_id;

    #[Url('query', true, true)]
    public $search = '';

    public $timePeriod = '';

    public $polls;

    public function mount()
    {
        $this->user_id = auth()->user()->id;
        $this->polls = $this->initialize();
    }

    public function updatedSearch()
    {
        $this->polls = $this->initialize() ?? [];
    }

    public function render()
    {
        return view('livewire.user.dashboard.polls');
    }

    public function initialize()
    {

        $query = Poll::query()
            ->where('user_id', $this->user_id)
            ->when(!empty($this->search), function (Builder $query) {
                $query->where('poll_id', 'LIKE', "%{$this->search}%");
                $query->orWhere('poll_fields', 'LIKE', "%{$this->search}%");
            })
            ->when($this->timePeriod == 7, function (Builder $query) {
                $query->where('created_at', '<=', now()->subDays(7));
            })
            ->when($this->timePeriod == 28, function (Builder $query) {
                $query->whereBetween('created_at', [now()->subMonth(), now()]);
            });

        return $query->get();
    }

    /**
     * @param string $poll_id
     */
    // public function getVoteCount($poll_id)
    // {
    // }
}

