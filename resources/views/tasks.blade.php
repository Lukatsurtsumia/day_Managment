<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container mt-5">
    <h2 class="mb-4">Add a Task</h2>
  {{-- errors --}}
   @include('errors')   
   
    <!-- Task Form -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-2">
                <input type="time" name="time" class="form-control" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="title" class="form-control" placeholder="Task Title" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Add Task</button>
            </div>
        </div>
    </form>

    <!-- Task Table -->
    <h3 class="mt-5">My Tasks</h3>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th style="width: 15%;">Time</th>
                <th style="width: 20%;">Title</th>
                <th style="width: 35%;">Description</th>
                <th style="width: 5%;">Status</th>

                <th style="width: 20%;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->time }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if ($task->status  === 'done')
                            <span class="badge bg-success">Done</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                    </td>
                        <td>
                    @if ($task->status ==='pending')
                        
                            <form action="{{route('tasks.done', $task->id)}}" method="POST" >
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-success">Mark as Done</button>
                            </form>
               
                    @endif
                      
                    
                        <form action="{{route('deleteTask', $task->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button >Delete</button>
                        </form>

                    </td>
                     
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
