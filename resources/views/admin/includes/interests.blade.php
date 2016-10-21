
<div class="page-header">
    <h1><center>Interests</center></h1>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="well">
            <table class="table table-hover table-condensed table-striped info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($interests as $interest)
                <tr>
                    <td>{{$interest->id}}</td>
                    <td>{{$interest->name}}</td>
                    <td class="text-right">
                        <form action="{{ route('admin.panel.interest.destroy', $interest->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('admin.panel.interest.create') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                 <label for="name">Name of Interest</label>
                 <input type="text" name="name" class="form-control" value=""/>
            </div>

        <button type="submit" class="btn btn-success btn-block submit-btn">Create Interest</button>
        </form>
    </div>
</div>