<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Listeners\SendChapterAssignedEmail;
use App\Listeners\SendWelcomeEmaillistner;
use App\Events\ChaperAssigned;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ChaperAssigned::class => [
            SendChapterAssignedEmail::class,
        ],
        UserRegistered::class => [
            SendWelcomeEmaillistner::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    // public function shouldDiscoverEvents(): bool
    // {
    //     return false;
    // }

	// /**
	//  * The event to listener mappings for the application.
	//  *
	//  * @return array<class-string, array<int, class-string>>
	//  */
	// public function getListen() {
	// 	return $this->listen;
	// }

	// /**
	//  * The event to listener mappings for the application.
	//  *
	//  * @param array<class-string, array<int, class-string>> $listen The event to listener mappings for the application.
	//  * @return self
	//  */
	// public function setListen($listen): self {
	// 	$this->listen = $listen;
	// 	return $this;
	// }

	/**
	 * The event to listener mappings for the application.
	 *
	 * @return array<class-string, array<int, class-string>>
	 */
}
