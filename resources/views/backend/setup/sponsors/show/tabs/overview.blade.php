<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Banner</th>
                <td><img src="{{ "/images/".$module_name_singular->banner }}" class="user-profile-image" width="80px" height="auto"/></td>
            </tr>

            <tr>
                <th>Sponsor Name</th>
                <td>{{ $module_name_singular->name }}</td>
            </tr>

            <tr>
                <th>Company Name</th>
                <td>{{ $module_name_singular->company_name }}</td>
            </tr>

            <tr>
                <th>Description</th>
                <td>{{ $module_name_singular->description }}</td>
            </tr>

            <tr>
                <th>Created At</th>
                <td>{{ $module_name_singular->created_at }}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->