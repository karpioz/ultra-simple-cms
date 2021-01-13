<x-home-main>

    
    @section('content')
    
       <h1 class="my-4"><small>Please check latest posts</small>
          </h1>
  
          <!-- Blog Post -->

          @foreach($posts as $post)
          <div class="card mb-4">
            
            @if($post->post_image == 'https://karpinski-dev.duckdns.org/storage')
            <img class="card-img-top" src="https://karpinski-dev.duckdns.org/storage/img/dummy_pic.jpg" alt="Card image cap">
            @else
            <img class="card-img-top" src="{{ $post->post_image }}" alt="Card image cap">
            @endif
        
            <div class="card-body">
              <h2 class="card-title">{{ $post->post_title }}</h2>
              <p class="card-text">{{ Str::limit($post->post_body, '75', '...') }}</p>
              <a href="{{ route('post', $post->id) }}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on {{ $post->created_at->diffForHumans() }} 
              by <a href="#">{{$post->user->name}}</a>
            </div>
          </div>
  
          @endforeach

          <!-- Pagination -->
          <div class="d-flex justify-content-center">
            {!! $posts->links() !!}
        </div>

    @endsection
    
</x-home-main>