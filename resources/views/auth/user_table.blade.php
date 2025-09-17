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
   {{-- Upload Image --}}
 
    @if (auth()->user()->image)
    <img src="{{asset('storage/'.auth()->user()->image)}}" alt="" style="width: 100px; height:100px; border-radius:50%;">
    @else
    <img src="{{asset('public/images/default.jpg')}}" alt="" style="width: 100px; height:100px; border-radius:50%;">
    
    @endif
   <div>
<form action="{{route('uploadImg', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<input type="file" name="image"  >
<button type="submit">Upload</button>
</form>
    
 </div>
    <!-- Task Table -->
    <h3 class="mt-5">My Tasks</h3>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th style="width: 15%;">Name</th>
                <th style="width: 20%;">Mail</th>
                <th style="width: 5%;">Role</th>

                <th style="width: 20%;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->role }}</td>
                   
                      
                <td>
                        <form action="{{route('deleteUser', $customer->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button  class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                     
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
