@extends('layouts.app')

@section('content')
<div class="container py-4 text-white">

    {{-- Top Bar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="#" class="text-success me-3 text-decoration-none">Save</a>
            <a href="#" class="text-danger text-decoration-none">Discard</a>
        </div>
        <div>
            <a href="#" class="text-white text-decoration-underline me-4">Swap request</a>
            <a href="#" class="text-white text-decoration-underline me-4">Home</a>
            <img src="{{ asset('images/user.png') }}" alt="Profile" class="rounded-circle" width="45" height="45">
        </div>
    </div>

    <form action="{{ route('UpdateProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Name & Location --}}
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Location</label>
                <input type="text" name="location" value="{{ old('location', $user->location) }}" class="form-control">
            </div>
        </div>

        {{-- Skills Offered & Skills Wanted --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Skills Offered</label>
                   <select name="skills_offered[]" multiple class="form-control">
    @foreach($allSkills as $skill)
        <option value="{{ $skill->id }}"
            @if($user->skills_offered->contains('id', $skill->id)) selected @endif>
            {{ $skill->name }}
        </option>
    @endforeach
</select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Skills Wanted</label>
           <select name="skills_wanted[]" multiple class="form-control">
    @foreach($allSkills as $skill)
        <option value="{{ $skill->id }}"
            @if($user->skills_wanted->contains('id', $skill->id)) selected @endif>
            {{ $skill->name }}
        </option>
    @endforeach
</select>
            </div>
        </div>

        {{-- Availability & Profile Visibility --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Availability</label>
                <input type="text" name="availability" value="{{ old('availability', $user->availability) }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Profile</label>
                <select name="visibility" class="form-select">
                    <option value="public" {{ $user->visibility == 'public' ? 'selected' : '' }}>Public</option>
                    <option value="private" {{ $user->visibility == 'private' ? 'selected' : '' }}>Private</option>
                </select>
            </div>
        </div>

        {{-- Profile Photo --}}
        <div class="mb-4 text-center">
            <div class="d-inline-block position-relative">
                <img src="{{ asset($user->profile_photo ?? 'images/default-avatar.png') }}" class="rounded-circle" width="100" height="100">
                <div class="mt-2">
                    <input type="file" name="profile_photo" class="form-control mt-2">
                    {{-- <a href="{{ route('profile.removePhoto') }}" class="text-danger small text-decoration-none">Remove</a> --}}
                </div>
            </div>
        </div>

        {{-- Submit --}}
        <div class="text-center">
            <button class="btn btn-success px-5">Save Profile</button>
        </div>
    </form>
</div>
@endsection
