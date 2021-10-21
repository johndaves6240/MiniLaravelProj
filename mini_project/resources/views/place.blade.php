@extends('layout.layout')

@section('content')

  
<form action="submit" method="POST">
    @csrf
  <div class="form-group">
    <label>Name of the Place you want to visit</label>
    <input type="text" class="form-control" name="name">
   
  </div>

  <div class="form-group">
    <label>Date</label>
    <input type="date" class="form-control" name="date">
  </div>

  <div class="form-group">
    <label >Description why you want to visit the place</label>
    <textarea class="form-control" id="exampleTextarea" rows="3" name="description"></textarea>
  </div>

  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<form action="planned" method="GET">
@csrf
<button type="submit" class="btn btn-primary">Planned Places</button>
</form>
@endsection