
<div class="page-header">
    <h1><center>Volunteers</center></h1>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="well">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>EMAIL</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>ZIP CODE</th>
                        <th>VOLUNTEER HOURS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($volunteers as $volunteer)
                <tr>
                    <td>{{$volunteer->id}}</td>
                    <td>{{$volunteer->email}}</td>
                    <td>{{$volunteer->firstName}}</td>
                    <td>{{$volunteer->lastName}}</td>
                    <td>{{$volunteer->zipCode}}</td>
                    <td>{{$volunteer->trackedHours}}</td>
                    <td class="text-right">
                        <form action="{{ route('admin.panel.volunteer.destroy', $volunteer->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
