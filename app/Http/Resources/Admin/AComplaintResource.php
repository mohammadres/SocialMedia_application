<?php

namespace App\Http\Resources\Admin;

use App\Models\Complaint_Reply;
use App\Repositories\Eloquent\Complaint_ReplyRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class AComplaintResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $complaint_reply = new Complaint_ReplyRepository();
        return [
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'complaintable_id'=>$this->complaintable_id,
            'complaintable_type'=>$this->complaintable_type,
            'text'=>$this->text,
            'processed'=>$complaint_reply->check($this->id)->isEmpty()?false:true,
            'created_at'=>$this->created_at,

        ];
    }
}
