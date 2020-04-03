<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  {{-- bootstrap css CDN --}}
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  {{-- bootstrap js CDN --}}
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>ToDoList</title>
</head>
<body>

<style>
    body {
        background-color:navajowhite;
        margin-top: 100px;
    }

    h1 {
        text-align: center;
    }

    ul {
        list-style-type:none; 
        display: flex;
        flex-direction: row;
    }

    ul > li {
        margin-top: 25px;
        margin-left: 30px;
        font-size: 20px;
    }

    .btn {
        border-radius: 5px;
        padding-left: 20px;
        padding-right: 20px;
    }

</style>
<div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="row">
      <h1>Todo List</h1>
    </div>


    {{-- display error message --}}
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
            <h2>Error:</h2>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="row" style='margin-top: 10px; margin-bottom: 10px;'>
      <form action="{{ route('task.store') }}" style="text-align: center" method='POST'>
      {{ csrf_field() }}

        <div class="col-md-6">
          <input type="text" name='newTaskName' class='form-control'>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <div class='input-group date' id='datetimepicker5'>
                    <input type='text' name='newDate' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
          <input type="submit" class='btn btn-success btn-block' value='Add your task'>
        </div>

        
      </form>
    </div>

    {{-- display stored tasks --}}
    @if (count($storedTasks) > 0)
      <table class="table">
        <thead>
          <th>Task #</th>
          <th>What must do to</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>

        <tbody>
          @foreach ($storedTasks as $storedTask)
            <tr>
              <th>{{ $storedTask->id }}</th>
              <td>{{ $storedTask->name }}</td>
              <td><a href="{{ route('task.edit', ['task'=>$storedTask->id]) }}" class='btn btn-warning'>Edit</a></td>
              <td>
                <form action="{{ route('task.destroy', ['task'=>$storedTask->id]) }}" method='POST'>
                  {{ csrf_field() }}
                  <input type="hidden" name='_method' value='DELETE'>

                  <input type="submit" class='btn btn-danger' value='Delete'>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif

    <div class="row text-center">
      {{ $storedTasks->links() }}
    </div>

  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
</body>
</html>