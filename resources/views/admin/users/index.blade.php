<x-admin-main>
    @section('content')

    <h1>All Users</h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All registered users</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Photo</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Photo</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>

                    @foreach($users as $user)

                  <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td><img height="75px" src="{{asset($user->photo)}}" alt=""></td>
                      <td>{{$user->created_at->diffForHumans()}}</td>
                      <td>
                        <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        </form>
                        <a class="btn btn-warning" href="{{ route('users.user-profile.show', auth()->user()) }}"><i class="fa fa-pen-square" aria-hidden="true"></i></a>
                      </td>
                  </tr>

                  @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>

    @endsection
    @section('scripts')

      <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('js/datatables-demo.js') }}"></script>

    @endsection
</x-admin-main>