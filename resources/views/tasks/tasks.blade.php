@include('header')

 
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

    @include('tasks.tasks_table')
     