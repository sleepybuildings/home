<?php

namespace App\Domains\Divoom;

use Illuminate\Http\Client\Response;

class DeviceResult
{
    /**
     * @param  array<mixed>|null  $value
     */
    private function __construct(
        public readonly ?array $value = null,
        public readonly ?string $error = null,
    ) {}

    public static function fromResponse(Response $response): DeviceResult
    {
        return self::fromArray((array) $response->json());
    }

    /**
     * @param  array<mixed, mixed>  $response
     */
    public static function fromArray(array $response): DeviceResult
    {
        $errorCode = intval(data_get($response, 'error_code', 0));
        if ($errorCode > 0) {
            return new self(error: sprintf('Error code returned from device: %d', $errorCode));
        }

        return new self(value: $response);
    }

    public function failed(): bool
    {
        return filled($this->error);
    }

    public function success(): bool
    {
        return ! $this->failed();
    }
}
