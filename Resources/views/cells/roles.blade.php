<div class="flute-user__roles">
    @forelse ($row->roles as $role)
        <div class="flute-user__role">
            <span class="flute-user__role-square" style="background-color: {{ $role->color }}"></span>
            <span class="flute-user__role-name">{{ $role->name }}</span>
        </div>
    @empty
        <small class="text-muted">{{ __('fluteusers.no_roles') }}</small>
    @endforelse
</div>
