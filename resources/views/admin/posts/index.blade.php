<x-admin-main>

    @section('content')

    <h1>All posts</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                  <th>Last Update</th>
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
                    <th>Last Update</th>
                </tr>
              </tfoot>
              <tbody>

                    @foreach($posts as $post)

                  <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->user->name}}</td>
                      <td>{{$post->post_title}}</td>
                      <td>{{Str::limit($post->post_body, '100', '...')}}</td>
                      <td><img height="75px" src="{{$post->post_image}}" alt=""></td>
                      <td>{{$post->created_at->diffForHumans()}}</td>
                      <td>{{$post->uptaded_at}}</td>
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