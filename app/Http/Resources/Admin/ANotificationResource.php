<?php

namespace App\Http\Resources\Admin;

use App\Repositories\Eloquent\NotificationRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class ANotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $notification = new NotificationRepository();
        return[
            'type'=>$notification->checkType($this->sent_as_type),
            'id'=>$this->sent_as_id,
            'content'=>$this->content,
            'created_at'=>$this->created_at,];
    }
}
