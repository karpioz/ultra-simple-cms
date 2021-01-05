<x-admin-main>

    @section('content')

    @if(auth()->user()->userHasRole('Admin'))

    <h1 class="h3 mb-4 text-gray-800">Admin Dashboard</h1>

    @else

    <div class="alert alert-danger" role="alert">
        <h2>You Don't have permission to view this page</h2>
    </div>

    @endif
    
    
    @endsection

</x-admin-main>