<h1>edit users</h1>

{{ Form::model($user, array('route' => array('ppp', $user->id), 'method' => 'PUT')) }}


    <div class="form-group">
        {{ Form::label('name', 'name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'email') }}
        {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('edit the user!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

    </div>
    </body>
    </html>

    <br>
    <a class="btn btn-small btn-info" href="{{ URL::to('users') }}">Back to index</a>
