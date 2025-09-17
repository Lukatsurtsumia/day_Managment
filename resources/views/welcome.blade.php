@include('header')
    
      
  <!-- Hero Section -->
  <section class="text-center py-5">
    <div class="container">
      <h1 class="display-4 fw-bold">Welcome to Task Manager</h1>
      <p class="lead text-muted">Organize your tasks easily and stay productive.</p>
          
 
   
  @auth
   {{-- Upload Image --}}
 <div>
    @if (auth()->user()->image)
    <img src="{{asset('storage/' . auth()->user()->image)}}" alt="" style="width: 100px; height:100px; border-radius:50%;">
    @else
    <img src="{{asset('storage/images/default.jpg')}}" alt="" style="width: 100px; height:100px; border-radius:50%;">
    
    @endif
   
<form action="{{route('uploadImg', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<input type="file" name="image"  >
<button type="submit">Upload</button>
</form>
    
 </div>
  @if (Auth::user()->role ==='admin')


      @include('auth/user_table')
  @endif

<div> 
    <a href="{{ route('tasks.store') }}" class="btn btn-primary">Add Task</a>
    @include('tasks.tasks_table')

@else                 
  <div>
    <a href="/login"><button class="btn btn-primary" >get started</button></a>
  </div>
  
    </div>
                 @endauth
  
 
  </section>
                  
 


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
