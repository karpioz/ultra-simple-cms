<x-admin-main>
    @section('content')

    <h1>Edit Post</h1>
   
            <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label class="col-form-label" for="title">Post Title</label>
                <input
                 type="text" 
                 class="form-control"  placeholder="Post title"
                 id="title"
                 name="post_title"
                 value="{{ $post->post_title}}" />
           
              </div>
                  
                  <div class="form-group">
                    <label for="body">Post Body</label>
                  <textarea class="form-control" id="body" name="post_body" rows="5">{{ $post->post_body}}</textarea>
                  </div>

                  <div class="form-group">
                      <div><img width="350px" src="{{$post->post_image}}" alt=""></div>
                      <label for="file">Upload File</label>
                      <input type="file" class="form-control-file" name="post_image" id="post_image">
                  </div>
                  
                  
                  <button type="submit" class="btn btn-warning">Update</button>
            </form>
        

    @endsection
</x-admin-main>