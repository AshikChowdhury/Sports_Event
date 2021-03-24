<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Banner</th>
                <td><img src="{{ "/images/".$event->image }}" class="user-profile-image" width="80px" height="auto"/></td>
            </tr>

            <tr>
                <th>Event Name</th>
                <td>{{ $event->name }}</td>
            </tr>

            <tr>
                <th>Event Venue</th>
                <td>{{ $event->venue }}</td>
            </tr>

            <tr>
                <th>Organizer</th>
                <td>{{ $event->organizer }}</td>
            </tr>

            <tr>
                <th>Description</th>
                <td>{{ $event->description }}</td>
            </tr>

            <tr>
                <th>Start Date</th>
                <td>{{ $event->start_date->format('d M Y') }}</td>
            </tr>

            <tr>
                <th>End Date</th>
                <td>{{ $event->end_date->format('d M Y') }}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->