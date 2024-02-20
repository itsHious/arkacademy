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
        <h4>Edit Team Member</h4>
     </div>
      <div class="card-body">
            <form class="" action="{{ route('update.team.member',$mem->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
            
                <div class="row">
                    <div class="col-lg">
                        <div class="form-group mt-2">
                            <label for="">Surname</label>
                            <input type="text" name="surname" class="form-control" value="{{ $mem->surname }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Other Names</label>
                            <input type="text" name="name" class="form-control" value="{{ $mem->name }}" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Residential Address</label>
                            <input type="text" name="residence" class="form-control" value="{{ $mem->residence }}" >
                        </div>
                        <div class="form-group mt-2">
                            <label for="">House no.</label>
                            <input type="text" name="house" class="form-control" value="{{ $mem->house }}" >
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Weight(kg)</label>
                            <input type="number" name="weight" class="form-control" value="{{ $mem->weight }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">allergies</label>
                            <input type="text" name="allergy" class="form-control" value="{{ $mem->allergy }}" >
                        </div>
                        
                    </div>

                    <div class="col-lg">
                        <div class="form-group mt-2">
                            <label for="">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="{{ $mem->dob }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Trade/Occupation</label>
                            <input type="text" name="trade" class="form-control" value="{{ $mem->trade }}" >
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Postal Address</label>
                            <input type="text" name="postal" class="form-control" value="{{ $mem->postal }}" >
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ $mem->phone }}" >
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Parent/Guardian</label>
                            <input type="text" name="parent" class="form-control" value="{{ $mem->parent }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Parent/Guardian Contact</label>
                            <input type="text" name="parent_phone" class="form-control" value="{{ $mem->parent_phone }}" required>
                        </div>
                    </div>

                    <div class="col-lg">
                        <div class="form-group mt-2">
                            <label for="">Position</label>
                            <input type="text" name="position" class="form-control" value="{{ $mem->position }}" >
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Educational Background</label>
                            <input type="text" name="edu" class="form-control" value="{{ $mem->edu }}" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ $mem->email }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Height(ft)</label>
                            <input type="number" name="height_one" class="form-control" value="{{ $mem->height_one }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Height(in)</label>
                            <input type="number" name="height_two" class="form-control" value="{{ $mem->height_two }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Member Photo</label>
                            <input type="file" name="image" class="form-control"  >
                            <small>{{ $mem->image }}</small>
                        </div>

                        <div class="form-group">
                            <label for="Comment">Comment</label>
                            <textarea name="comment" class="form-control" cols="30" rows="10">{{ $r->comment }}</textarea>
                          </div>
                    </div>
                </div>



                <div class="text-center mt-4">
                  <button class="btn btn-success btn-sm col-lg-5">Update Team Member</button>
                </div>
            </form>
        

       
      </div>

    </div>
  </div><!-- End Recent Sales -->
</section>
@endsection