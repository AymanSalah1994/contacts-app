@extends('layouts.main')

@section('content')
<main class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">All Contacts</h2>
                  <div class="ml-auto">
                    <a href="{{ route('contacts.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                  </div>
                </div>
              </div>

            <div class="card-body">
              @include('contacts._filter')
              <table class="table table-striped table-hover">
                <thead>
                  @if ($success_message = session('message'))
                   <div class="alert alert-success">
                     {{ $success_message }}
                  </div>
                  @endif

                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Company</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>

                  @if ($companies->count())
                      @foreach ($companies as $index => $company )
                      <tr>
                        <th scope="row">{{ $companies->firstItem() +$index }}</th>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->address }}</td>
                        <td>{{ $company->website }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->name }}</td>
                        <td>
                          {{-- Show  --}}
                          {{-- <a href="{{route('contacts.show',$contact->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a> --}}
                          {{-- EDIT  --}}
                          {{-- <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a> --}}
                          {{-- Delete  --}}
                          {{-- <a href="{{ route('contacts.destroy',$contact->id)}}" class="btn-delete btn btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a> --}}

                        </td>
                      </tr>
                      @endforeach

                      <form id="form-delete" action="" method="post" style="display: none">
                        @csrf
                        @method('DELETE')
                      </form>
                  @endif
                </tbody>
              </table> 

              {{-- {{ $companies->appends(request()->only('company_id'))->links() }} --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection