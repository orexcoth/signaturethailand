@extends('../frontend/layouts/layout')

@section('subhead')
    <title>Signature Thailand - ทีมงาน</title>
@endsection

@section('content')
<section class="SectionTeam">
    <div class="container">
        <h1 class="TextHead-Gold text-center">ทีมงาน Signature Thailand</h1>
        <div class="ColTeam">
            <div class="row">
                @forelse($getUsers as $user)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="BoxTeam">
                        <img class="IMG-Team" src="{{ asset($user->photo) }}" alt="{{ $user->name }}">
                        <div class="BoxDetail-Team">
                            <p class="Text-Gold-Gardien Text-24 Text-W600 text-center mb-2">{{ $user->name }}</p>
                            <p class="Text-box-DetailTeam Text-18 Text-W400 text-center mb-2">{{ $user->description }}</p>
                            <a class="btn Button-NoBG" href="{{ route('teamDetailPage', $user->id) }}">ดูเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center">ไม่มีสมาชิกทีม</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<section>
    <div class="BoxLeftBig-Preorder">
        <div class="WarperDiv-Bigpreorder ms-3 me-3">
            <h1 class="TextHead-Gold">สนใจเข้าร่วมทีมงาน Signature Thailand</h1>
            <div class="ms-3 me-3 mt-4">
                <a class="btn ButtonSeemore" href="#">ติดต่อ</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<!-- Add any additional JavaScript here if needed -->
@endsection
