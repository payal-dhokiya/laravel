@extends('layouts.app')

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">Edogaru</span>
                    <span class="text-black-50">edogaru@mail.com.my</span><span> </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <form method="POST" action="{{ route('profile.update', $user->id) }}"  enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="first name" value="{{ $user->name }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Email</label><input type="text" name="email" class="form-control" value="{{ $user->email }}"></div>
                    </div>
                    <div class="row mt-2 col-md-6">
                        <label class="labels">Roles</label>
                        <select id="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                        <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Phone No</label><input type="text" name="phone_no" class="form-control" value="{{  $user->phone_no }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Address</label><input type="text" name="address" class="form-control" value="{{ $user->address }}"></div>
                    </div>
                    <div class="row mt-3 col-md-6">
                        <select id="country" class="form-control @error('country') is-invalid @enderror" name="country">
                            <option value="" disabled>Select Country</option>
                            <option value="USA" {{ $user->country == 'USA' ? 'selected' : '' }}>USA</option>
                            <option value="Canada" {{ $user->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                            <option value="UK" {{ $user->country == 'UK' ? 'selected' : '' }}>UK</option>
                            <option value="America" {{ $user->country == 'America' ? 'selected' : '' }}>America</option>
                            <option value="France" {{ $user->country == 'France' ? 'selected' : '' }}>France</option>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Gender</label><br>
                            <input type="radio" name="gender" value="male" {{ $user->gender == 'Male' ? 'checked' : '' }}> Male<br>
                            <input type="radio" name="gender" value="female" {{ $user->gender == 'Female' ? 'checked' : '' }}> Female<br>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Hobby</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobby1" value="hobby1" {{ in_array('hobby1', explode(',', $user->hobby)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="hobby1">
                                    Hobby 1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobby2" value="hobby2" {{ in_array('hobby2', explode(',', $user->hobby)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="hobby2">
                                    Hobby 2
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobby3" value="hobby3" {{ in_array('hobby3', explode(',', $user->hobby)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="hobby3">
                                    Hobby 3
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobby4" value="hobby4" {{ in_array('hobby4', explode(',', $user->hobby)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="hobby4">
                                    Hobby 4
                                </label>
                            </div>

                        </div>
                    </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Image</label><input type="file" name="profile" class="form-control" value="{{ $user->name }}"></div>
                        </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
