@extends('layouts.admin')


@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

         
          
          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="filter p-2">
                <a data-bs-toggle="collapse" href="#addfile" class="btn btn-success btn-sm ">Add Team</a>
              </div>

              <div class="card-body">
                <div id="addfile" class=" jumbotron collapse  p-3">
                    <form class="" action="{{ route('add.team') }}" method="post" >
                        @csrf
                        <div class="col-lg-4 mx-auto">
                          <div class="form-group">
                            <label for="">Team Name</label>
                            <input type="text" class="form-control" name="team" required>
                          </div>
                        </div>


    
                        <div class="text-center mt-4">
                          <button class="btn btn-success btn-sm col-lg-5">Add Team</button>
                        </div>
                    </form>
                </div>
                <h5 class="card-title">Team Info</h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">Team name</th>
                      <th scope="col">No. of Team members</th>
                      <th scope="col">Option</th>
                    </tr>
                  </thead>
                  <tbody>

                    

                    @forelse ($team as $item)
                    <tr>
                        <th scope="row">{{ $item->name }}</th>
                        <td>{{ $item->count }}</td>
                        <td>
                            <a href="{{ route('team.view',$item->id) }}" class="btn btn-sm btn-success">View</a>
                            <a href="{{ route('team.edit',$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('team.delete',$item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                        
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










































        

    </div>
  </section>
@endsection