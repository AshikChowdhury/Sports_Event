<div class="col">
    <div class="table-responsive">
        @foreach($event->schedule as $schedule)
        <h5>{{$schedule->date->format('d M Y')}}</h5>
         <table class="table table-hover">
            <tr>
                <th>Name</th>
                <td>{{ $schedule->name }}</td>
            </tr>

            <tr>
                <th>Venue</th>
                <td>{{ $schedule->venue }}</td>
            </tr>

            <tr>
                <th>Start Time</th>
                <td>{{ $schedule->from_time->format('h:i A') }}</td>
            </tr>

             <tr>
                 <th>End Time</th>
                 <td>{{ $schedule->to_time->format('h:i A') }}</td>
             </tr>

        </table>
            <hr>
        @endforeach
    </div>
</div><!--table-responsive-->