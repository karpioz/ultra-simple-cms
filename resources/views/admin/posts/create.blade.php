<x-admin-main>
    @section('content')

    <h1>Create Post</h1>
   
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-form-label" for="title">Post Title</label>
                <input
                 type="text" 
                 class="form-control"  placeholder="Post title"
                 id="title"
                 name="post_title"
                value="" />
           
              </div>
                  
                  <div class="form-group">
                    <label for="body">Post Body</label>
                  <textarea class="form-control" id="body" name="post_body" rows="5"></textarea>
                  </div>

                  <div class="form-group">
                      <label for="file">Upload File</label>
                      <input type="file" class="form-control-file" name="post_image" id="post_image">
                  </div>
                  
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        

    @endsection
</x-admin-main>