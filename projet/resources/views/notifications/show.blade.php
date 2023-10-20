<!-- resources/views/notifications.blade.php -->

@if (auth()->check())
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="notificationsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notifications
        </button>
        <div class="dropdown-menu" aria-labelledby="notificationsDropdown">
            @forelse(auth()->user()->unreadNotifications as $notification)
                <a class="dropdown-item" href="{{ route('notifications.show', $notification->id) }}">
                    {{ $notification->data['message'] }}
                </a>
            @empty
                <div class="dropdown-item">Aucune nouvelle notification</div>
            @endforelse
        </div>
    </div>
@endif
