<div>
    @if(session('message_destroyed'))
        <x-alerts.warning>{{ session()->pull('message_destroyed') }}</x-alerts.warning>
    @endif
</div>