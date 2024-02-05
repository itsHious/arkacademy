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

     <div class="card-head">
        <h4>Edit Team</h4>
     </div>
      <div class="card-body">
           
        <form class="" action="{{ route('update.team') }}" method="post" >
            @csrf
            <div class="col-lg-4 mx-auto">
              <div class="form-group">
                <label for="">Team Name</label>
                <input type="text" class="form-control" value="{{ $team->name }}" name="team" required>
              </div>
            </div>



            <div class="text-center mt-4">
              <button class="btn btn-success btn-sm col-lg-5">Update Team</button>
            </div>
        </form>

       
      </div>

    </div>
  </div><!-- End Recent Sales -->
</section>
@endsection