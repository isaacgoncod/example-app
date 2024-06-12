<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateRequest;

class CreateSupportDTO
{
    public function __construct(
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
            $request->subject,
            'a',
            $request->body
        );
    }
}
