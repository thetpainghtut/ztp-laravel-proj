@extends('backend.layout')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Create Employee Form</h1>
    <form class="row g-3" method="POST" action="{{route('employee.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="col-md-4">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="inputName" required>
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-4">
        <label for="inputPhoneno" class="form-label">Phone No</label>
        <input type="text" name="phoneno" class="form-control" id="inputPhoneno">
      </div>
      <div class="col-md-4">
        <label for="inputProfile" class="form-label">Profile</label>
        <input type="file" name="profile" class="form-control" id="inputProfile" required>
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <textarea name="address" class="form-control" id="inputAddress" placeholder="1234 Main St"></textarea>
      </div>
      <div class="col-md-6">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail">
      </div>
      <div class="col-md-4">
        <label for="inputNrc" class="form-label">NRC</label>
        <input type="text" name="nrc" class="form-control" id="inputNrc">
      </div>
      <div class="col-md-2">
        <label for="inputSalary" class="form-label">Salary</label>
        <input type="number" name="salary" class="form-control" id="inpinputSalaryutZip">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary float-end">Create</button>
      </div>
    </form>
</div>
@endsection