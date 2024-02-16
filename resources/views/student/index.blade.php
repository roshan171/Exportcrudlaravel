@extends('layout.main')
 
@section('title')
    Student Data
@endsection
 
@section('content')
<div class="container mt-3">
    <div class="card shadow m-2">

    @if ($message = session('success'))
    <div class="alert alert-success mx-1" role="alert">
        {{ $message }}
    </div>
     @endif
    <h2 class=" text-center mt-2">Student Data</h2>
    <div class="mt-5">

         <a href="{{ route('student.export') }}" class="btn btn-success m-2">
             Export Data
        </a>

        <a href="{{ route('student.create') }}" class="btn btn-primary">
            Add Data
         </a>
  
    </div>
    
    <div class="col-md-6 ml-auto m-2">
        
            <form action="{{ route('student.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Choose Excel File</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-info m-2 text-white">Import</button>
    </form>
                 </div>

                 <form action="{{ route('student.index') }}" method="get">
                  <div class="row m-2">
        <div class="col-md-4">
            <input type="text" name="name" class="form-control" placeholder="Search by Name" value="{{ request()->input('name') }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="city" class="form-control" placeholder="Search by City" value="{{ request()->input('city') }}">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>


     

    <table class="table  mt-5" id="student-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1 @endphp
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $i++ }}</td>
                      <td>{{ $student->name }}</td>
                      <td>{{ $student->email }}</td>
                      <td>{{ $student->city }}</td>
                      <td>
                            <form action="{{ route('student.destroy',$student->id) }}" method="Post">
                                <a class="btn btn-warning text-white" href="{{ route('student.edit',$student->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="alert('Are you Sure to delete this Record ?');">Delete</button>
                            </form>
                        </td>
                  </tr>
            @endforeach
        </tbody> 
    </table> 
    <div class="mt-5">
        {{ $students->links() }}
    </div> 
</div>  </div>
@endsection


