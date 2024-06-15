<?php

namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Support;

class CreateSupportDTO
{
    public function __construct(
        public string $subject,
        public SupportStatus $status,
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
            SupportStatus::A,
            $request->body
        );
    }
}
