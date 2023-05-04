<div>
    @if(session('message_success'))
        <x-alerts.success>{{ session()->pull('message_success') }}</x-alerts.success>
    @endif
</div>