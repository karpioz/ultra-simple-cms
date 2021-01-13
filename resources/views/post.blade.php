<x-home-main>

    @section('content')

    <!-- Title -->
    <h1 class="mt-4">{{ $post->post_title }}</h1>

    <!-- Author -->
    <p class="lead">
      by
      <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    @if($post->post_image == 'https://karpinski-dev.duckdns.org/storage')
    <img class="img-fluid rounded" src="https://karpinski-dev.duckdns.org/storage/img/dummy_pic.jpg" alt="">
    @else
    <img class="img-fluid rounded" src="{{ $post->post_image }}" alt="">
    @endif
    <hr>

    <!-- Post Content -->
    <p>{{ $post->post_body }}</p>
   
    <hr>

    <a href="{{ route('home') }}" class="btn btn-primary mb-3">&larr; Back</a>

    @endsection

</x-home-main>