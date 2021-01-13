<x-admin-main>
    @section('content')

    <h1>Create Post</h1>
    @if(Session::has('message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Ooops!!!</strong>{{ Session::get('message') }}.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
   
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-form-label" for="title">Post Title</label>
                <input
                 type="text" 
                 class="form-control"  placeholder="Post title"
                 id="title"
                 name="post_title"
                value=""
                required />
           
              </div>
                  
                  <div class="form-group">
                    <label for="body">Post Body</label>
                  <textarea class="form-control" id="body" name="post_body" rows="5" required></textarea>
                  </div>

                  <div class="form-group">
                      <label for="file">Upload File</label>
                      <input type="file" class="form-control-file" name="post_image" id="post_image">
                  </div>
                  
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>

    @endsection
</x-admin-main>