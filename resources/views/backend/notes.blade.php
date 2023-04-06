@foreach()
{{-- <li class="media"> --}}
    {{-- <img class="mr-3 rounded-circle" width="50" src="../images/users/{{ $today->user->photo }}" alt="avatar"> --}}
    <img class="mr-3 rounded-circle" width="50" src="../images/users/{{ (is_null($today->user->photo)) ? 'avatar-1.png' : ($today->user->photo) }}" alt="avatar">
    {{-- ../{{ (is_null($td->member->photo)) ? 'assets/admin/img/avatar/avatar-1.png' : ($td->member->photo) }} --}}
    <div class="media-body">
      <div class="float-right text-primary">{{ $today->created_at->diffForHumans() }}</div>
      <div class="media-title">{{ $today->user->nik }}</div>
      <span class="text-small text-muted">{{ \Carbon\Carbon::parse($today->created_at)->format('d M Y')}} | {{ \Carbon\Carbon::parse($today->created_at)->format('H:i:s')}} | {{ $today->nama_lokasi }} </span>
    </div>
  </li>
@endforeach


@foreach($top as $tp)
                      <li class="media" >
                        {{-- <img class="mr-3 rounded-circle" width="50" src="assets/admin/img/avatar/avatar-1.png" alt="avatar"> --}}

                        <div class="media-body">
                          <div class="float-right text-primary">{{ $tp->amount }} Kunjungan</div>
                          <div class="media-title"></div>
                          <i class="fa fa-suitcase"></i> <span class="text-small text-muted"> {{ $tp->nama_lokasi }}</span>
                        </div>
                      </li>
@endforeach
