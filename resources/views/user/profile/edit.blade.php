@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        <form id="update-profile-form">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-2">
                                <label for="name">User Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group mb-2">
                                <label for="department">Department</label>
                                <input id="department" type="text" class="form-control" name="department" value="{{ $userProfile->department }}">
                            </div>

                            <!-- Other form fields (phone_number, date_of_birth, etc.) -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('update-profile-form');

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                axios.put('{{ route('user.profile.update') }}', new FormData(form))
                    .then(function (response) {
                        alert(response.data.message);
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            });
        });
    </script>
@endsection
