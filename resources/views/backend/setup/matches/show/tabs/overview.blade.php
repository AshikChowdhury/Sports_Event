<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Event Banner</th>
                <td><img src="{{ "/images/".$module_name_singular->transevent->image }}" class="user-profile-image" width="80px" height="auto"/></td>
            </tr>

            <tr>
                <th>Match</th>
                <td>{{ $module_name_singular->team_1->name }} <h5>Vs</h5> {{ $module_name_singular->team_2->name }}</td>
            </tr>
            <tr>
                <th>Venue</th>
                <td>{{ $module_name_singular->venue }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $module_name_singular->date->format('d M Y') }}</td>
            </tr>

            <tr>
                <th>Time</th>
                <td>{{ $module_name_singular->time->format('h:i A') }}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->