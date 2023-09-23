<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class NotificationMenu extends Component
{   
    public $notifications;
    public $newCount;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $user = Auth::guard('admin')->user();
        $this->notifications = $user->notifications()->get();
        $this->newCount = $user->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('dashboard.notification-menu');
    }
}
