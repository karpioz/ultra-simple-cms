<x-admin-main>

    @section('content')

    @if(auth()->user()->userHasRole('Admin'))

    <h1 class="h3 mb-4 text-gray-800">Admin Dashboard</h1>
    <p>Welcome {{auth()->user()->name}}</p>
    <p>Admin role gives you access to all registered <a class="link" href="{{ route('users.index') }}"><em class="text-danger">users</em></a> and all <a class="link" href="{{ route('post.index') }}"><em class="text-danger">posts</em></a> stored in the database.</p>
    <p>You can remove anything if necessary</p>

    @else

    <h1 class="h3 mb-4 text-gray-800">User Dashboard</h1>
    <p>Welcome {{auth()->user()->name}}</p>
    <p>Please add, edit or remove own posts</p>

    @endif
    
    
    @endsection

</x-admin-main>