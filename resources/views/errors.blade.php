@if($errors->any())
<div class="alert alert-danger">
    <ul>
@foreach($errors->all() as $err)
 <il>{{$err}}</il>
@endforeach
    </ul>
</div>
@endif