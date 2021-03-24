<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Logo</th>
                <td><img src="{{ "/images/".$team->logo }}" class="user-profile-image" width="80px" height="auto"/></td>
            </tr>

            <tr>
                <th>Team Name</th>
                <td>{{ $team->name }}</td>
            </tr>

            <tr>
                <th>Description</th>
                <td>{{ $team->description }}</td>
            </tr>

            <tr>
                <th>Created</th>
                <td>{{ $team->created_at }}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->