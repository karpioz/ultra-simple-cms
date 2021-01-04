<x-admin-main>
    @section('content')
        <h2>Hello <strong>{{ $user->name }}</strong></h2>

        <div class="row mt-3">
            <div class="col-sm-6 mt-3">
                <h4 class="mb-3 text-danger">Update User Information</h4>
                <form class="mt-3" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name=email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name=password">
                    </div>
                    <div class="form-group">
                        <label for="password-conf">Confirm Password</label>
                        <input type="password" class="form-control" id="password-conf" name=password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="photo">User Photo</label>
                        <input class="form-control" type="file" name="photo" id="photo">
                    </div>
                    <div class="form-grou">
                        <button type="submit" class="btn btn-warning mt-3">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
</x-admin-main>