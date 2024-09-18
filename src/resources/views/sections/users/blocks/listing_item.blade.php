<tr>
    <td class="text-center">
        <div class="checkbox">
            <input type="checkbox" class="checkbox-input" id="checkbox2">
        </div>
    </td>

    <td class="text-center">
        @if($user->profile->avatar)
            <img class="rounded img-fluid avatar-40" src="{{ Storage::url($user->profile->avatar) }}" alt="profile">
        @else
            <img class="rounded img-fluid avatar-40" src="{{ secure_asset('assets/images/user/default-avatar.jpg') }}" alt="profile">
        @endif
    </td>

    <td>{{ $user->username }}</td>

    <td>{{ $user->profile->firstname }} {{ $user->profile->lastname }}</td>
    <td>{{ $user->email }}</td>
    <td>{!! $user->profile->phone ?? '<span class="badge badge-info">n/a</span>' !!}</td>
    <td><span class="badge bg-primary">Client</span></td>
    <td>Acme Corporation</td>
    <td class="text-center">
        @if($user->is_active == 1)
            <span class="badge badge-success">da</span>
        @else
            <span class="badge badge-danger">nu</span>
        @endif
    </td>
    <td class="text-center">
        <div class="btn-group dropleft">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="las la-cog"></i></button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('users.edit', $user) }}"><i class="ri-pencil-line"></i> Edit</a>

                @if(auth()->id() != $user->id)
                    <a class="dropdown-item" href="#"><i class="las la-ban"></i> Disable</a>
                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-line"></i> Delete</a>
                @endif
            </div>
        </div>
    </td>
</tr>
