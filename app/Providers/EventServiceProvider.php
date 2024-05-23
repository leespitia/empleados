<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Models\MenuOption;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        // Menu
 
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            
            $items = MenuOption::where('activo', true)
                                ->where('menu_option_id', NULL)
                                ->get()->map(function (MenuOption $page) {    
                
                if( auth()->user()->rol->hasPermissionTo($page->permission) || auth()->user()->isAdmin() ){

                    $menu = [
                        'text' => $page['name'],
                        'url' => $page['ruta'],
                        'icon' => $page['icono'],
                        //'icon_color' => 'secondary',
                    ];

                    if($page->hijos->count() > 0){

                        $menu['submenu'] = array();

                        foreach($page->hijos as $hijo){

                            if($hijo->activo && (auth()->user()->rol->hasPermissionTo($hijo->permission) || auth()->user()->isAdmin()) ){

                                $sub_menu = [
                                
                                    'text' => $hijo['name'],
                                    'url' => $hijo['ruta'],
                                    'icon' => $hijo['icono'],
                                    //'icon_color' => 'danger',
    
                                ];
    
                                array_push($menu['submenu'], $sub_menu);

                            }

                        }

                    }

                    return $menu;

                }

            });

            $event->menu->add(...$items);
            
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
