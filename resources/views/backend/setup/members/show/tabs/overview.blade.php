<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Photo</th>
                <td><img src="{{ "/images/".$member->photo }}" class="user-profile-image" width="80px" height="auto"/></td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $member->name }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ $member->role }}</td>
            </tr>
            <tr>
                <th>Batting Style</th>
                <td>{{ $member->batting_style }}</td>
            </tr>
            <tr>
                <th>Bowling Style</th>
                <td>{{ $member->bowling_Style }}</td>
            </tr>
            <tr>
                <th>About</th>
                <td>{{ $member->about }}</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->