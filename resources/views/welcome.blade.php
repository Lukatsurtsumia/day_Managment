<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">TaskManager</a>
      <div class="ms-auto">
        <a href="/login" class="btn btn-outline-light me-2">Login</a>
        <a href="/registration" class="btn btn-primary">Register</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="text-center py-5">
    <div class="container">
      <h1 class="display-4 fw-bold">Welcome to Task Manager</h1>
      <p class="lead text-muted">Organize your tasks easily and stay productive.</p>
          
 
    @if (Auth::user())
  @auth
<h1>hello {{Auth::user()->name}}</h1>
<div> 
    <a href="{{ route('tasks.store') }}" class="btn btn-primary">Add Task</a>
<form action="{{route('logout')}}" method="post">
    @csrf
    <div style="margin-top: 10%">
   <button type="submit" class="btn btn-danger" >log out</button>
</div>
</form>
                 @endauth
  
                  @else
  <div>
    <a href="/login"><button class="btn btn-primary" >get started</button></a>
  </div>
  
    </div>
  </section>
                  @endif

 


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
