<x-admin-main>

    @section('content')

    <!-- Success Message when post is deleted-->
    @if(Session::has('message'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>All good!!!</strong> {{ Session::get('message') }}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    @endif

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All posts</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Author</th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>Image</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Authot</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Image</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>

                    @foreach($posts as $post)

                  <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->user->name}}</td>
                      <td>{{$post->post_title}}</td>
                      <td>{{Str::limit($post->post_body, '100', '...')}}</td>
                      <td><img height="75px" src="{{asset($post->post_image)}}" alt=""></td>
                      <td>{{$post->created_at->diffForHumans()}}</td>
                      <td>
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        </form>
                        <a class="btn btn-warning" href="{{route('post.edit', $post->id)}}"><i class="fa fa-pen-square" aria-hidden="true"></i></a>
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