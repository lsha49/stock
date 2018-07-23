<!DOCTYPE html>
<html>

  <body>
      <li>id {{ $users->id }}</li>
      <li>name: {{ $users->name }}</li>

    </ul>
  </body>
</html>


<br>
<a class="btn btn-small btn-info" href="{{ URL::to('users') }}">Back to index</a>
