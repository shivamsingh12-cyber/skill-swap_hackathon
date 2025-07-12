@extends('layouts.app') {{-- This assumes you have a reusable layout --}}

@section('content')
<div class="container py-4">
    {{-- Header Section --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Skill Swap Platform</h3>
        <div class="d-flex align-items-center">
           <a href="#" class="text-white text-decoration-underline me-3">Swap request </a>
           <a href="{{route('showProfile')}}">  <img src="{{ asset('images/user.png') }}" alt="User Avatar" class="rounded-circle" width="40" height="40"></a>
        </div>
    </div>

    {{-- Filter and Search --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div class="mb-2">
            <select class="form-select">
                <option selected disabled>Availability</option>
                <option value="available">Available</option>
                <option value="unavailable">Unavailable</option>
            </select>
        </div>
        <div class="d-flex mb-2">
            <input type="text" class="form-control me-2" placeholder="Search skills...">
            <button class="btn btn-outline-light">Search</button>
        </div>
    </div>

    {{-- User Cards --}}
    @foreach($users as $user)
        <div class="card bg-dark text-white mb-4 border-light rounded-3">
            <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    {{-- Profile photo placeholder --}}
                    <div class="me-3">
                        <div class="rounded-circle bg-secondary text-center text-white d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                            Profile Photo
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-1">{{ $user->name }}</h5>

                        <div class="text-success small mb-1">
                            Skills Offered ⇒
                            @foreach($user->skills_offered as $skill)
                                <span class="badge bg-light text-dark">{{ $skill->name }}</span>
                            @endforeach
                        </div>

                        <div class="text-info small">
                            Skill Wanted ⇒
                            @foreach($user->skills_wanted as $skill)
                                <span class="badge bg-light text-dark">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="text-end mt-3 mt-md-0">
                    <div class="mb-2">
                        <span class="text-muted small">Rating</span><br>
                        <strong>{{ $user->rating ?? 'N/A' }}/5</strong>
                    </div>
                    <a href="#" class="btn btn-info">Request</a>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        {{-- {{ $users->links() }} --}}
    </div>
</div>
@endsection
