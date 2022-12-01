@extends('backend.layout')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Create User Form</h1>
    <form class="row g-3" method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="col-md-4">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="inputName" required>
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-4">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail">
      </div>
      <div class="col-md-4">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="inputPassword" required>
      </div>
      <div class="col-md-4">
        <label for="inputRole" class="form-label">Roles</label>
        <select name="roles[]" multiple class="form-control" id="inputRole">
          @foreach($roles as $key=>$value)
            <option value="{{$value->id}}">{{$value->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary float-end">Create</button>
      </div>
    </form>
</div>
@endsection