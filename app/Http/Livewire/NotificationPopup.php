<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationPopup extends Component
{
    public $notificationsToShow = 12;
    public function render()
    {
        $notifications = auth()->user()->notifications();
        return view('livewire.notification-popup', [
            'notifications' => $notifications->paginate($this->notificationsToShow)
        ]);
    }

    public function loadMore() {
        $this->notificationsToShow += 12;
    }

    public function updateAsRead() {
        $notification = auth()->user()->unreadNotifications;
        $notification->markAsRead();
    }
}
