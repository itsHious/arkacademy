@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>{{ $team->name }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">{{ $team->name }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section dashboard">
  <div class="col-12">
    <div class="card recent-sales overflow-auto">

      <div class="filter p-2">
        <a data-bs-toggle="collapse" href="#addfile" class="btn btn-primary btn-sm ">Add Team Member</a>
      </div>

      <div class="card-body">
        <div id="addfile" class=" jumbotron collapse  p-3 mt-5">
            <form class="" action="{{ route('add.team.member',$team->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
            
                <div class="row">
                    <div class="col-lg">
                        <div class="form-group mt-2">
                            <label for="">Surname</label>
                            <input type="text" name="surname" class="form-control" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Other Names</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Residential Address</label>
                            <input type="text" name="residence" class="form-control" >
                        </div>
                        <div class="form-group mt-2">
                            <label for="">House no.</label>
                            <input type="text" name="house" class="form-control" >
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Weight(kg)</label>
                            <input type="number" name="weight" class="form-control" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">allergies</label>
                            <input type="text" name="allergy" class="form-control" >
                        </div>
                        
                    </div>

                    <div class="col-lg">
                        <div class="form-group mt-2">
                            <label for="">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Trade/Occupation</label>
                            <input type="text" name="trade" class="form-control" >
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Postal Address</label>
                            <input type="text" name="postal" class="form-control" >
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone" class="form-control" >
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Parent/Guardian</label>
                            <input type="text" name="parent" class="form-control" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Parent/Guardian Contact</label>
                            <input type="text" name="parent_phone" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-lg">
                        <div class="form-group mt-2">
                            <label for="">Position</label>
                            <input type="text" name="position" class="form-control" >
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Educational Background</label>
                            <input type="text" name="edu" class="form-control" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Height(ft)</label>
                            <input type="number" name="height_one" class="form-control" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Height(in)</label>
                            <input type="number" name="height_two" class="form-control" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Member Photo</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>
                </div>



                <div class="text-center mt-4">
                  <button class="btn btn-success btn-sm col-lg-5">Add Team Member</button>
                </div>
            </form>
        </div>
        <h5 class="card-title">Team Info</h5>

        <table class="table table-borderless datatable">
          <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
              <th scope="col">Position</th>
              
              <th scope="col">Option</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($pl as $item)
            <tr>
                <td><img src="{{ asset($item->image) }}" class="img-fluid rounded" width="90" alt=""></td>
                <th scope="row">{{ $item->surname.' '.$item->name }}</th>
                
                <td>{{ $item->phone }}</td>
                <td>{{ $item->position }}</td>
                <td>
                    <a href="{{ route('team.view.member',$item->id) }}" class="mr-1 btn btn-sm btn-primary">View</a> 
                    <a href="{{ route('team.edit.member',$item->id) }}" class="mr-1 btn btn-sm btn-info">Edit</a> 
                    <a href="{{ route('team.delete.member',$item->id) }}" class="btn btn-sm btn-danger">Delete</a></td>
                
              </tr>
            @empty
            <tr>
                <th colspan="3">No Data Available</th>
                
              </tr>
            @endforelse
            
          </tbody>
        </table>

      </div>

    </div>
  </div><!-- End Recent Sales -->
</section>
@endsection