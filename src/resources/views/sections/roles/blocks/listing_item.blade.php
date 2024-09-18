<tr>
    <td>
        {{ $role->name }}

        @if($role->description != null)
            <br><span class="text-muted font-size-12">{{ $role->description }}</span>
        @endif
    </td>
    <td>Permissions</td>
    <td>Users</td>
    <td class="text-center">
        <div class="btn-group dropleft">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="las la-cog"></i></button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('roles.edit', $role) }}"><i class="ri-pencil-line"></i> Edit</a>

                <a class="dropdown-item" href="#"><i class="ri-delete-bin-line"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>
