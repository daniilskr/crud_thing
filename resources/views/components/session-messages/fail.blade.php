<div>
    @if(session('message_fail'))
        <x-alerts.danger>{{ session()->pull('message_fail') }}</x-alerts.danger>
    @endif
</div>