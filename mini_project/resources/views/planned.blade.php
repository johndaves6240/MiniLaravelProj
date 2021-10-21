@extends('layout.layout')

@section('content')
<form action="back" method="POST">
@csrf
<button type="submit" class="btn btn-primary">Go Back</button>
</form>

<br><br>
    @forelse($event as $value)



        <h1>{{$value['name']}}<h1>
        <h1>{{$value['date']}}</h1>
        <h1>{{$value['description']}}</h1>
        <form action="delete" method="POST">
        @csrf
            <input type="hidden" value="{{$value['id']}}" name="id">
            <input type="submit" value="Delete">
        </form>
        <br><br>
        <form action="update" method="POST">
        @csrf
            <input type="hidden" value="{{$value['id']}}" name="id">
            <input type="text" name="name" value="{{$value['name']}}" class="form-control" >
            <input type="text" name="date" value="{{$value['date']}}" class="form-control">
            <input type="text" name="description" value="{{$value['description']}}" class="form-control">
            <input type="submit" value="Update">
        </form>

        <br><br>

        
        @empty
         <h5>No Planned Events</h5>

    @endforelse








@endsection