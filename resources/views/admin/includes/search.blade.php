

<form action="{{ route(Route::currentRouteName()) }}" role="search" method="GET">
    <div class="input-group">
        <input type="text" name="term" id="term" class="form-control" value="{{ Request::get('term') }}"placeholder="search..">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
            </button>
        </span>
    </div>
</form>