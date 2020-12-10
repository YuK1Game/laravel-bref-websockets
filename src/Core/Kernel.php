<?php
namespace YuK1\LaravelBrefWebsockets\Core;

use YuK1\LaravelBrefWebsockets\Core\HandlerApplication;

use Illuminate\Contracts\Events\Dispatcher;

use Throwable;

class Kernel implements KernelInterface
{
    /**
     * The bootstrap classes for the application.
     *
     * @var string[]
     */
    protected $bootstrappers = [
        \Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables::class,
        \Illuminate\Foundation\Bootstrap\LoadConfiguration::class,
        \Illuminate\Foundation\Bootstrap\HandleExceptions::class,
        \Illuminate\Foundation\Bootstrap\RegisterFacades::class,
        \Illuminate\Foundation\Bootstrap\SetRequestForConsole::class,
        \Illuminate\Foundation\Bootstrap\RegisterProviders::class,
        \Illuminate\Foundation\Bootstrap\BootProviders::class,
    ];

    protected $handler;

    /**
     * Create a new console kernel instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function __construct(HandlerApplication $app, Dispatcher $events)
    {
        dd($app);
        $this->app = $app;
        $this->events = $events;

        $this->app->booted(function () {
            $this->defineConsoleSchedule();
        });
    }

    public function handle()
    {
        $this->bootstrap();
        return $this->getHandler()->run();
    }

    public function bootstrap() {
        
    }

    protected function getHandler()
    {
        if (is_null($this->handler)) {
            return $this->handler = (new HandlerApplication($this->app, $this->events, $this->app->version()))
                ->resolveCommands($this->commands);
        }

        return $this->handler;
    }

}