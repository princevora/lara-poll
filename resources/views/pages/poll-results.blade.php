<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poll Result - {{request()->poll_id}}</title>
    <style>
        .highcharts-credits {
            display: none;
        }
    </style>
    @livewireStyles
    @votterStyles
</head>

<body>
    <div class="container-fluid">
        <main class="main-content mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <a href="{{ route('public.poll', ['poll_id' => request()->poll_id]) }}" wire:navigate>
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                            <div class="col-xl-8 col-md-12">
                                <div class="card card-plain">
                                    <div class="card-body border-top border-5 border-info shadow-lg rounded text-center">
                                        <div class="d-flex justify-content-start">
                                            <span class="text-bold">
                                                @php
                                                    $pollData = $fieldData->first();
                                                    $pollName = $pollData->poll_name;
                                                @endphp
                                                
                                                <!-- Poll Name -->
                                                {{$pollName}}

                                            </span> &nbsp;
                                                <!-- SHow Who created The poll -->
                                                by a {{$pollData->created_by == 1 ? 'user' : 'guest'}} · <b>

                                                <!-- SHow when the poll was created -->
                                                &nbsp; {{$pollData->created_at->diffForHumans()}}
                                            </b>
                                        </div>
                                        <div class="row">
                                            <!-- Form column -->
                                            <div class="col-md-6 mt-4">
                                                @foreach ($fieldData as $data)
                                                <!-- Declare A Var And Save Json To An Array -->

                                                    @php
                                                        $fields = json_decode($data->poll_fields, true);
                                                        $totalVotes = $chartData->first()->count();
                                                        $prePer = null;
                                                    @endphp

                                                    @foreach ($fields as $key => $field)
                                                        <div class="mb-3">

                                                            <!-- Save Total Votes For the field in A Var -->
                                                            @php
                                                                $vote = $chartData->where('vote_field','=', $key)->first()->votes;
                                                                $percentage = number_format($vote / $totalVotes * 100);
                                                                $bgClass = ($prePer !== null && $percentage > $prePer) ? 'bg-success' : '';
                                                                $prePer = $percentage;
                                                            @endphp

                                                            <div class="row">
                                                                <div class="d-flex justify-content-start">
                                                                    <label for="" class="form-label">{{$field}}</label>
                                                                </div>
                                                                <div class="d-flex justify-content-end">
                                                                    <label for="" class="form-label">{{ $percentage }} % ({{$vote}} votes) </label>
                                                                </div>
                                                            </div>

                                                            <div class="progress" style="height: 18px">
                                                                <div 
                                                                    class="progress-bar h-auto {{$bgClass}}" 
                                                                    role="progressbar" 
                                                                    style="width: {{$percentage}}%;" 
                                                                    aria-valuenow="{{$percentage}}" 
                                                                    aria-valuemin="0" 
                                                                    aria-valuemax="100"
                                                                ></div>
                                                            </div>
                                                        </div>                                                       
                                                    @endforeach
                                                @endforeach

                                                <hr>

                                                <p>Total votes: <b>{{$totalVotes}}</b></p>

                                                <!-- Total votes -->
                                            </div>
                                            <!-- Chart column -->
                                            <div class="col-md-6">
                                                <!-- Your chart container goes here -->
                                                <div id="container_chart"></div>
                                            </div>
                                        </div>
                                       <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3">
                                                <input type="text" value="{{request()->poll_id}}" id="poll_id" style="display: none">
                                                <input type="text" class="form-control texssd" id="window_url">
                                                <div class="input-group-append"> 
                                                  <button 
                                                        onclick="sharePoll()" 
                                                        class="btn-dark-outline input-group-text text-dark" 
                                                        id="basic-addon2"
                                                        title="Share to anyone" 
                                                        data-toggle="tooltip"
                                                    >
                                                    <i class="fa-solid fa-share"></i> 
                                                </button>
                                                </div>
                                                <div class="input-group-append"> 
                                                    <button 
                                                          onclick="copyPollId()" 
                                                          class="btn-dark-outline input-group-text text-dark" 
                                                          id="basic-addon2"
                                                          title="Click To Copy" 
                                                          data-toggle="tooltip"
                                                      >
                                                      <i class="fa-solid fa-copy" id="copy_btn"></i> 
                                                  </button>
                                                  </div>
                                              </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    
    @votterJs
    @livewireScripts
</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/offline-exporting.js"></script>

<script>

    $(function(){
        let winUrl = $('#window_url');
        winUrl.attr(
            {
                "value" : window.location.href,
                'disabled':  true
            });
    })

    let chartData = {!! $chartData !!};
    let pollData = {!! $fieldData !!};
    const pollName = pollData[0].poll_name;

    Highcharts.chart('container_chart', {
        chart: {
            type: 'pie'
        },
        title: {
            text: pollName
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        tooltip: {
            valueSuffix: '%'
        },
        series: [{
            name: 'Votes',
            colorByPoint: true,
            data: chartData.map(item => {
                return {
                    name: `Option: ${item.vote_field}`,
                    y: item.votes
                }
            })
        }],
    });

    // Handle Ajax Request For refreshPoll()
    // Method Is curently Not In Use.
    function refreshPoll(pollId) {
        $.ajax({
            method: 'POST',
            data: {
                '_token' : '{{csrf_token()}}',
                'poll_id' : pollId,
            },
            success: function(rsp){
                chartData = rsp.poll_data;
                pollData = rsp.fields;
            }
        });
    }

    async function sharePoll(){
        await navigator.share({
            title: 'Vote The Poll - Select Your Option.',
            url: "https://developer.mozilla.org",
        });
    }

    function copyPollId(event){
        const poll_id = $('#poll_id').val();

        navigator.clipboard.writeText(poll_id);

        const copy_btn = $('#copy_btn');

        // Remove Fa-copy Class 
        $(copy_btn).removeClass('fa-copy');
        $(copy_btn).addClass('fa-check');

        setTimeout(() => {

            // Change The CopyBtn To Copied
            
            $(copy_btn).addClass('fa-copy');
            $(copy_btn).removeClass('fa-check');

        }, 1500);
        console.log();
    }
</script>

</html>
