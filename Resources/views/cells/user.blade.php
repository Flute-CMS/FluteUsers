<a href="{{ url('profile/' . $row->getUrl()) }}" data-user-card hx-boost="true" hx-target="#main"
    hx-swap="outerHTML transition:true" yoyo:ignore class="flute-user">
    <img src="{{ $row->avatar ?? asset(config('profile.default_avatar')) }}" alt="{{ $row->name }}" loading="lazy">

    <span class="flute-user__text">
        <span>{{ $row->name }}</span>
    </span>
</a>
