<?php

namespace App\Http\Controllers\Polls;

use App\Http\Controllers\Controller;
use App\Models\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollResultController extends Controller
{
    /**
     * @var string
     */
    public $poll_id;

    /**
     * @var mixed|array|object|null
     */
    public $poll_data;

    /**
     * @var mixed|array|object|null
     */
    public $fields;

    /**
     * @param \Illuminate\Http\Request $request
     */

    public function index(Request $request)
    {
        $this->poll_id = $request->poll_id;

        $this->poll_data = $this->getData();

        /**
         * Get Field Data To Show Results
         */
        $this->fields = $this->fieldsData();

        /**
         * Attempt A Conditional Rendering to prevent user to view the page.
         */

        if ($this->poll_data !== null ) {
            return view('pages.poll-results', [
                'chartData' => $this->poll_data["data"],
                'totalVotes' => $this->poll_data["total_votes"],
                'fieldData' => $this->fields
            ]);
        }
         else {
            //Redirect if the poll is null.
            return redirect('/');
        }
    }

    /**
     * @param string|mixed|null   $name 
     * @return mixed
     */
    public function getData($poll_id = null): mixed
    {
        try {

            $query = Votes::query()
                ->where('poll_id', $poll_id !== null ? $poll_id : $this->poll_id);

            $counts = $query->count();

            $data = $query
                ->select('vote_field', DB::raw('COUNT(vote_field) as votes'))
                ->groupBy('vote_field');
            
            if (!empty($data) && $data->exists()) {
                return [
                    "data" => $data->get(),
                    "total_votes" => $counts
                ];
            }

            return null;
        } catch (\Throwable $th) {
            return null;
        }
    }

    /**
     * @param string|mixed|null   $name 
     * @return mixed
     */
    public function fieldsData($poll_id = null): mixed
    {
        try {

            $data = Votes::query()
                ->select('polls.poll_fields', 'polls.poll_name', 'created_by', 'polls.created_at', DB::raw('COUNT(*) as vote_count'))
                ->where('votes.poll_id', $poll_id !== null ? $poll_id : $this->poll_id)
                ->join('polls', 'votes.poll_id', '=', 'polls.poll_id')
                ->groupBy('polls.poll_fields', 'polls.poll_name', 'created_by', 'polls.created_at');

            if (!empty($data) && $data->exists()) {
                return $data->get();
            }

            return null;
        } catch (\Throwable $th) {
            return null;
        }
    }

    /**
     * Refresh All Data By refreshPoll Method
     * ! [Important]: this method is currently Not in use..
     */
    public function refreshPoll(Request $request)
    {
        if ($request->ajax()) {

            $poll_id = $request->poll_id;

            $this->poll_data = $this->getData($poll_id);

            $this->fields = $this->fieldsData($poll_id);

            return response()->json([
                'fields' => $this->fields,
                'poll_data' => $this->poll_data
            ]);
        } else {
            return response()->json(
                [
                    'message' => 'Unable to complete Request',
                    'reason' => [
                        'code' => 405,
                        'text' => 'Method Not Allowed'
                    ],
                ]
            );
        }
    }
}
