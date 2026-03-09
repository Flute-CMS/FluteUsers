@if ($row->socialNetworks)
    <div class="flute-user__socials">
        @foreach ($row->socialNetworks as $social)
            @if (!$social->hidden || (user()->isLoggedIn() && (user()->can('admin.users') || user()->id === $row->id)))
                <a href="{{ $social->url }}" class="flute-user__socials-item" target="_blank"
                    data-tooltip="{{ $social->name }}" rel="noopener">
                    <div class="flute-user__socials-item-icon">
                        <x-icon path="{{ $social->socialNetwork->icon }}" />
                    </div>
                </a>
            @endif
        @endforeach
    </div>
@endif
