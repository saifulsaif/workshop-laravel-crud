<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="{{url('/')}}">Logo</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Registration</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Student List</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <h3>Brand / Logo</h3>
  <p>The .navbar-brand class is used to highlight the brand/logo/project name of your page.</p>
</div>
 <div class="row">
      <div class="col-md-4">
        <div class="content">
    <h3>Student Registraion Form</h3>
 <form action="{{route('update')}}" method="post">
  {{csrf_field()}}
 <div class="form-row">
   <div class="form-group col-md-6">
     <label for="inputEmail4">First Name</label>
     <input type="text" name="first_name" value="{{$student->first_name}}" class="form-control" id="inputEmail4" >
   </div>
   <div class="form-group col-md-6">
     <label for="inputPassword4">Last Name</label>
     <input type="text" name="last_name" value="{{$student->last_name}}"  class="form-control" id="inputPassword4">
   </div>
 </div> 
 
 <div class="form-row">
   <div class="form-group col-md-6">
     <label for="inputCity">Email</label>
     <input type="text" name="email" value="{{$student->email}}"  class="form-control" id="inputCity">
     <input type="hidden" name="id" value="{{$student->id}}"  class="form-control" id="inputCity">
   </div>
   <div class="form-group col-md-6">
     <label for="inputState">Department</label>
     <select id="inputState" class="form-control" name="department">
       <option selected>Choose...</option>
       <option value="{{$student->department}}">{{$student->department}}</option>
       <option value="SWE">SWE</option>
       <option value="CSC">CSC</option>
       <option value="MCT">MCT</option>
     </select>
   </div>
 </div>
 <div class="form-group">
   <label for="inputAddress">Present Address</label>
   <input type="text" name="present_address" value="{{$student->present_address}}"  class="form-control" id="inputAddress" placeholder="1234 Main St">
 </div>
 <div class="form-group">
   <label for="inputAddress2">Permanent Address </label>
   <input type="text" name="permanent_address" value="{{$student->permanent_address}}"  class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
 </div>
 <div class="form-group">
   <div class="form-check">
     <input class="form-check-input" type="checkbox" id="gridCheck">
     <label class="form-check-label" for="gridCheck">
       Check me out
     </label>
   </div>
 </div>
 <button type="submit" class="btn btn-primary">Update</button>
</form class="from-control">
        </div>
      </div>
        <div class="col-md-8">
        <div class="content">

    <h3>Student List</h3>
     @if (Session::has('danger'))
                           <div class="alert alert-danger">
                             <p>{{Session::get('danger')}}</p>
                           </div>
                         @endif
                         @if (Session::has('success'))
                           <div class="alert alert-success">
                             <p>{{Session::get('success')}}</p>
                           </div>
                         @endif
          <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Department</th>
      <th scope="col">Email</th>
      <th scope="col">Present Adderss</th>
      <th scope="col">Permanet Adderss</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
    @foreach($student_list as $row)
    <tr>
      <th scope="row">1</th>
      <td>{{$row->first_name}}</td>
      <td>{{$row->last_name}}</td>
      <td>{{$row->department}}</td>
      <td>{{$row->email}}</td>
      <td>{{$row->present_address}}</td>
      <td>{{$row->permanent_address}}</td>
      <td>
       <a href="{{ url('edit/'.$row->id)}}"> <button class="from-control btn btn-primary">Edit</button></a>
        <a  class="from-control btn btn-danger" href="#"> Delete</a>
      </td>
     
    </tr>
  @endforeach
  </tbody>
</table>
        </div>
        </div>
</body>
</html>