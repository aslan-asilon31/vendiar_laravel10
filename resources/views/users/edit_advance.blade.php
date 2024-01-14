@extends('../layouts/backend_layout')

@section('title','User Edit')

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                @if( !empty($user->name) )
                    {{-- <img class="rounded-circle mt-5" width="150px" src=""> --}}
                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('aslan1.jpeg') }}">
                @else()
                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('aslan1.jpeg') }}">
                @endif
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <strong>User Name:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="User name">
                    @error('name')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row mt-3">
                    <strong>Department:</strong>
                    <input type="text" name="department_name" value="{{ $user->department_name }}" class="form-control" placeholder="department name">
                    @error('department_name')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row mt-3">
                    <strong>Section:</strong>
                    <input type="text" name="section_name" value="{{ $user->section_name }}" class="form-control" placeholder="section name">
                    @error('section_name')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row mt-3">
                    <strong>Date Birth:</strong>
                    <input type="text" name="date_birth" value="{{ $user->date_birth }}" class="form-control" placeholder="Date Birth">
                    @error('date_birth')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row mt-3">
                    <strong>Date Place:</strong>
                    <input type="text" name="place_birth" value="{{ $user->place_birth }}" class="form-control" placeholder="Place Birth">
                    @error('place_birth')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Update Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12">
                    <div class="row mt-3">
                        <strong>Status :</strong>
                        <input type="text" name="status_name" value="{{ $user->status_name }}" class="form-control" placeholder="status name">
                        @error('status_name')
                         <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mt-3">
                        <strong>Email :</strong>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="email">
                        @error('email')
                         <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mt-3">
                        <strong>Phone :</strong>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="phone">
                        @error('phone')
                         <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mt-3">
                        <strong>Gender :</strong>
                        <input type="text" name="gender" value="{{ $user->gender }}" class="form-control" placeholder="Gender">
                        @error('gender')
                         <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mt-3">
                        <strong>Role :</strong>
                        <input type="text" name="role_name" value="{{ $user->role_name }}" class="form-control" placeholder="role name">
                        @error('role_name')
                         <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
</div>
</div>


@endsection

@push('css')
<style>
    
.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
@endpush

@push('js')

@endpush
