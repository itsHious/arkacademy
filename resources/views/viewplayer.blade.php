@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>{{ $mem->surname.' '.$mem->name }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">{{ $mem->surname.' '.$mem->name }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset($mem->image) }}" alt="Profile" class="rounded-circle">
            <h2>{{ $mem->surname.' '.$mem->name }}</h2>
            <h3>{{ $mem->position }}</h3>
          
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              
            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Date of Birth</div>
                  <div class="col-lg-9 col-md-8">{{ date('l d M, Y',strtotime($mem->dob)) }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Trade/Occupation</div>
                  <div class="col-lg-9 col-md-8">{{ $mem->trade??'N/A' }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Educational Background</div>
                  <div class="col-lg-9 col-md-8">{{ $mem->edu??'N/A' }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Residential Address</div>
                  <div class="col-lg-9 col-md-8">{{ $mem->residence??'N/A' }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Date Joined</div>
                  <div class="col-lg-9 col-md-8">{{ $mem->house??'N/A' }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Postal Address</div>
                  <div class="col-lg-9 col-md-8">{{ $mem->postal??'N/A' }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone Number</div>
                  <div class="col-lg-9 col-md-8">{{ $mem->phone??'N/A' }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $mem->email??'N/A' }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Height(m)</div>
                    <div class="col-lg-9 col-md-8">{{ $mem->height_one??'N/A' }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jersey Number</div>
                    <div class="col-lg-9 col-md-8">{{ $mem->height_two??'N/A' }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Weight(kg)</div>
                    <div class="col-lg-9 col-md-8">{{ $mem->weight??'N/A' }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Allergies/Medical Condition</div>
                    <div class="col-lg-9 col-md-8">{{ $mem->allergy??'N/A' }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Parent/Guardian</div>
                    <div class="col-lg-9 col-md-8">{{ $mem->parent??'N/A' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Parent/Guardian Contact</div>
                    <div class="col-lg-9 col-md-8">{{ $mem->parent_phone??'N/A' }}</div>
                  </div>
                  


              </div>

              
















       
             

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection