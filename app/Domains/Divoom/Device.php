<?php

namespace App\Domains\Divoom;

use App\Domains\Divoom\Drawing\Canvas;
use App\Domains\Divoom\Requests\GetPicId;
use App\Domains\Divoom\Requests\ResetGifId;
use App\Domains\Divoom\Requests\SentGif;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelData\Data;

class Device
{
    public int $picId = 0;

    private bool $deviceInitialized = false;

    public function __construct(
        private readonly string $ipAddress
    ) {}

    public function resetPicId(): void
    {
        if ($this->post(new ResetGifId)->success()) {
            $this->picId = 0;
        }
    }

    public function sendCanvas(Canvas $canvas): DeviceResult
    {
        // http://doc.divoom-gz.com/web/#/12?page_id=93
        // https://github.com/SomethingWithComputers/pixoo/blob/main/src/pixoo/objects/pixoo.py

        $result = $this->post(new SentGif(
            PicNum: 1,
            PicID: $this->picId,
            PicSpeed: 1,
            PicData: $canvas->toBase64(),
            PicOffset: 0,
        ));

        if ($result->success()) {
            $this->picId++;
        }

        return $result;
    }

    private function initialize(): void
    {
        if ($this->deviceInitialized) {
            return;
        }

        $this->deviceInitialized = true;
        $this->resetPicId();
        $this->picId = intval(data_get($this->post(new GetPicId)->value ?? [], 'PicId'));
    }

    /** @noinspection HttpUrlsUsage */
    public function post(Data $data): DeviceResult
    {
        $this->initialize();

        // Darn JSON_UNESCAPED_SLASHES is not working for our slashes...
        $dataSent = $data->toJson();
        $dataSent = str_replace("\/", '/', $dataSent);

        logger()->info('Posting data', [
            'data' => $data->toArray(),
        ]);

        return transform(
            value: Http::acceptJson()
                ->withBody($dataSent, 'application/json')
                ->post('http://'.$this->ipAddress.'/post'),
            callback: DeviceResult::fromResponse(...)
        );
    }
}
