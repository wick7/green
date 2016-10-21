
<div class="page-header">
    <h1><center>Calendar Events</center></h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="well" style="background-color:Gainsboro;">
            <table class="table table-hover table-condensed table-striped info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ORGANIZATION</th>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>DATE</th>
                        <th>START TIME</th>
                        <th>END TIME</th>
                        <th>MAX # Of VOLUNTEERS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($calendar_events as $calendar_event)
                <tr>
                    <td>{{$calendar_event->id}}</td>
                    <td>{{$calendar_event->organization->organization}}</td>
                    <td>{{$calendar_event->title}}</td>
                    <td>{{$calendar_event->description}}</td>
                    <td>{{ date("d-m-Y",strtotime($calendar_event->start)) }}</td>
                    <td>{{ date("g:i a",strtotime($calendar_event->start)) }}</td>
                    <td>{{ date("g:i a",strtotime($calendar_event->end)) }}</td>
                    <td>{{$calendar_event->max_volunteer}}</td>
                    @if(Auth::guard('admin')->user())
                        <td class="text-right">
                            <a class="btn btn-primary" href="{{ route('calendar_events.show', $calendar_event->id) }}">View</a>
                            <a class="btn btn-warning " href="{{ route('calendar_events.edit', $calendar_event->id) }}">Edit</a>
                            <form action="{{ route('admin.panel.event.destroy', $calendar_event->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                        </td>
                    @endif 
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="text-center">
            {!! $calendar_events->links(); !!}
        </div>
    </div>
</div>