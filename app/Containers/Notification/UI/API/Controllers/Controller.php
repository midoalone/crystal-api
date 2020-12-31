<?php

namespace App\Containers\Notification\UI\API\Controllers;

use App\Containers\Notification\UI\API\Requests\CreateNotificationRequest;
use App\Containers\Notification\UI\API\Requests\DeleteNotificationRequest;
use App\Containers\Notification\UI\API\Requests\GetAllNotificationsRequest;
use App\Containers\Notification\UI\API\Requests\FindNotificationByIdRequest;
use App\Containers\Notification\UI\API\Requests\UpdateNotificationRequest;
use App\Containers\Notification\UI\API\Transformers\NotificationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Notification\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateNotificationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createNotification(CreateNotificationRequest $request)
    {
        $notification = Apiato::call('Notification@CreateNotificationAction', [$request]);

        $this->uploadMedia( $notification, "image", true );
        $this->uploadMedia( $notification, "gallery" );
        $this->uploadMedia( $notification, "file" );

        return $this->created($this->transform($notification, NotificationTransformer::class));
    }

    /**
     * @param FindNotificationByIdRequest $request
     * @return array
     */
    public function findNotificationById(FindNotificationByIdRequest $request)
    {
        $notification = Apiato::call('Notification@FindNotificationByIdAction', [$request]);

        return $this->transform($notification, NotificationTransformer::class);
    }

    /**
     * @param GetAllNotificationsRequest $request
     * @return array
     */
    public function getAllNotifications(GetAllNotificationsRequest $request)
    {
        $notifications = Apiato::call('Notification@GetAllNotificationsAction', [$request]);

        return $this->transform($notifications, NotificationTransformer::class);
    }

    /**
     * @param UpdateNotificationRequest $request
     * @return array
     */
    public function updateNotification(UpdateNotificationRequest $request)
    {
        $notification = Apiato::call('Notification@UpdateNotificationAction', [$request]);

        $this->uploadMedia( $notification, "image", true );
        $this->uploadMedia( $notification, "gallery" );
        $this->uploadMedia( $notification, "file" );

        return $this->transform($notification, NotificationTransformer::class);
    }

    /**
     * @param DeleteNotificationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteNotification(DeleteNotificationRequest $request)
    {
        Apiato::call('Notification@DeleteNotificationAction', [$request]);

        return $this->noContent();
    }
}
