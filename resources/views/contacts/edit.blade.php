@extends('layouts.main')
@section('title' , 'Edit Your Contact Contact')
@section('content')
<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Add New Contact</strong>
            </div>           
            <div class="card-body">
              <form action="{{ route('contacts.update',$contact->id)}}" method="post">
                @csrf
                {{--  IF you Use the Route::resource() YOU MUST USE PUT DIRECTIVE --}}
                @method('PUT')
                @include('contacts._editForm')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection