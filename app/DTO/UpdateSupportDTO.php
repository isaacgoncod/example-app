<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateRequest;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public string $status,
        public string $body
    ) {
        $this->subject = $subject;
        $this->status = $status;
        $this->body = $body;
    }

    public static function makeFromRequest(StoreUpdateRequest $request): self
    {
        return new self(
            $request->id,
            $request->subject,
            'a',
            $request->body
        );
    }
}
