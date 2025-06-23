@extends('layouts.main')

@section('content_backend')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-semibold fs-4 text-dark">Profile</h2>
        </div>
    </div>

    <div class="row gy-4">
        <!-- Update Profile Information Form -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <!-- Update Password Form -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <!-- Delete User Form -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
