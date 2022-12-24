@foreach($diskusiPembelajaran as $item)
    <div class="alert alert-light border-bottom mb-0 d-flex" role="alert">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <a @if (Auth::user()->id != $item->user_id)
                href="{{ route('diskusi-pembelajaran.vote', ['id' => $item->id]) }}"
                @endif  
            class="nav-link">
                <i class="fas fa-chevron-up"></i>
            </a>
            <h6>{{ $item->like }}</h5>
            <a @if (Auth::user()->id != $item->user_id)
                href="{{ route('diskusi-pembelajaran.unvote', ['id' => $item->id]) }}"
                @endif   class="nav-link">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
        <div>
            <small class="py-4 ml-1">{{ $item->created_at }}</small>
            <div class="d-flex align-items-center my-1">
                <img class="img-profile rounded-circle" src="{{ asset('/img/user.png') }}" width="30px" height="30px">
                <h6 class="m-0 font-weight-bold text-gray-800 ml-3"> 
                    {{ $item->user->siswa->nama ?? $item->user->guru->nama }} 
                </h6>
            </div>
            {!! $item->komentar !!}
        </div>
    </div> 
@endforeach