<?php

namespace App\Containers\Event\UI\API\Controllers;

use App\Containers\Event\UI\API\Requests\CreateEventRequest;
use App\Containers\Event\UI\API\Requests\DeleteEventRequest;
use App\Containers\Event\UI\API\Requests\GetAllEventsRequest;
use App\Containers\Event\UI\API\Requests\FindEventByIdRequest;
use App\Containers\Event\UI\API\Requests\UpdateEventRequest;
use App\Containers\Event\UI\API\Transformers\EventTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Event\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateEventRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createEvent(CreateEventRequest $request)
    {
        $event = Apiato::call('Event@CreateEventAction', [$request]);

        $this->uploadMedia( $event, "image", true );
        $this->uploadMedia( $event, "gallery" );
        $this->uploadMedia( $event, "file" );

        return $this->created($this->transform($event, EventTransformer::class));
    }

    /**
     * @param FindEventByIdRequest $request
     * @return array
     */
    public function findEventById(FindEventByIdRequest $request)
    {
        $event = Apiato::call('Event@FindEventByIdAction', [$request]);

        return $this->transform($event, EventTransformer::class);
    }

    /**
     * @param GetAllEventsRequest $request
     * @return array
     */
    public function getAllEvents(GetAllEventsRequest $request)
    {
        $events = Apiato::call('Event@GetAllEventsAction', [$request]);

        return $this->transform($events, EventTransformer::class);
    }

    /**
     * @param UpdateEventRequest $request
     * @return array
     */
    public function updateEvent(UpdateEventRequest $request)
    {
        $event = Apiato::call('Event@UpdateEventAction', [$request]);

        $this->uploadMedia( $event, "image", true );
        $this->uploadMedia( $event, "gallery" );
        $this->uploadMedia( $event, "file" );

        return $this->transform($event, EventTransformer::class);
    }

    /**
     * @param DeleteEventRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEvent(DeleteEventRequest $request)
    {
        Apiato::call('Event@DeleteEventAction', [$request]);

        return $this->noContent();
    }
}
