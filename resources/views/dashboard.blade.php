@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <h4 class="text-white">Skill Swap Platform</h4>
        <a href="{{ route('login') }}" class="btn btn-outline-light rounded-pill">Login</a>
    </div>

    {{-- Filter + Search --}}
    <div class="row mb-4 g-2">
        <div class="col-md-3">
            <select class="form-select" name="availability">
                <option selected>Availability</option>
                <option value="immediate">Immediate</option>
                <option value="weekend">Weekend</option>
            </select>
        </div>
        <div class="col-md-7">
            <input type="text" class="form-control" placeholder="Search by skill, name, etc.">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Search</button>
        </div>
    </div>

    {{-- Profiles --}}
    @foreach($users as $user)
    <div class="card bg-dark text-white mb-4 rounded-4 shadow-sm p-3">
        <div class="row align-items-center">
            {{-- Profile photo --}}
            <div class="col-md-2 col-4 text-center">
                <img src="{{ $user->profile_photo_url ?? 'https://via.placeholder.com/80' }}"
                     class="rounded-circle border border-white" width="80" height="80" alt="Profile Photo">
            </div>

            {{-- Info --}}
            <div class="col-md-6 col-8">
                <h5 class="mb-1">{{ $user->name }}</h5>

                <div class="mb-1 text-success">
                    Skills Offered =>
                   @foreach($user->skills_offered as $skill)
                        <span class="badge bg-secondary me-1">{{ $skill->name }}</span>
                    @endforeach
                </div>

                <div class="text-info">
                    Skill Wanted =>
                   @foreach($user->skills_wanted as $skill)
                        <span class="badge bg-secondary me-1">{{ $skill->name }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Request button + Rating --}}
            <div class="col-md-2 col-6 text-md-end text-start mt-3 mt-md-0">
                <a href="#" class="btn btn-info rounded-pill">Request</a>
            </div>
            <div class="col-md-2 col-6 text-end mt-3 mt-md-0">
                <div>Rating: <strong>{{ $user->rating ?? 'N/A' }}/5</strong></div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{-- {{ $users->links('pagination::bootstrap-5') }} --}}
    </div>
</div>
@endsection
