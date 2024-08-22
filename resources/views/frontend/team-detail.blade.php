@extends('../frontend/layouts/layout')

@section('subhead')
    <title>Signature Thailand - Team Detail</title>
@endsection

@section('content')

<section class="Section-DetailTeam">
    <div class="container d-flex flex-column align-items-center">
        <img class="IMG-Profile-Team mb-4" src="{{ asset($user->photo) }}" alt="{{ $user->name }}">
        <p class="Text-Gold-Gardien Text-38 Text-W600 text-center mb-3">{{ $user->name }}</p>
        
        <div class="BoxSocialTeam mb-5">
            <p class="Text-24 Text-W500 mb-0 me-2 ms-2">ช่องทางติดต่อ</p>

            <!-- Facebook -->
            @if($user->facebook)
            <a class="Text-SocialTeam me-2 ms-2" href="{{ $user->facebook }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('frontend/images/footer/ic_facebook.svg') }}" alt="Facebook">
            </a>
            @endif

            <!-- Line -->
            @if($user->line)
            <a class="Text-SocialTeam me-2 ms-2" href="https://line.me/ti/p/{{ $user->line }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('frontend/images/footer/ic_line2.svg') }}" alt="Line">
            </a>
            @endif

            <!-- Instagram -->
            @if($user->ig)
            <a class="Text-SocialTeam me-2 ms-2" href="https://instagram.com/{{ $user->ig }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('frontend/images/footer/ic_ig.svg') }}" alt="Instagram">
            </a>
            @endif

            <!-- Twitter -->
            @if($user->twitter)
            <a class="Text-SocialTeam me-2 ms-2" href="https://twitter.com/{{ $user->twitter }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('frontend/images/footer/ic_tt.svg') }}" alt="Twitter">
            </a>
            @endif
        </div>

        <p class="Text-18 Text-W400">
            {{ $user->description ?? 'No details available.' }}
        </p>
    </div>
</section>

@endsection

@section('script')
<!-- Additional scripts can be added here -->
@endsection
