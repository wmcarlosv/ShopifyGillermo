<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Auth;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
       Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            // Add some items to the menu...
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add(
                [
                    'text'=>'Dashboard',
                    'url'=>route('dashboard'),
                    'icon'=>'fas fa-tachometer-alt'
                ],
                [
                    'text'=>'profile',
                    'url'=>route('profile'),
                    'icon'=>'fas fa-user'
                ],
                [
                    'text'=>'Users',
                    'route'=>'users.index',
                    'icon'=>'fas fa-users'
                ],
                [
                    'text'=>'Orders',
                    'route'=>'orders.index',
                    'icon'=>'fas fa-file-contract'
                ]
            );
        });
    }
}
