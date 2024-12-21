<?php

namespace App\Console\Commands;

use App\Divoom\Device;
use App\Divoom\Drawing\Canvas;
use App\Divoom\Drawing\Components\Window;
use App\Divoom\Drawing\Sprites\PointerCursor;
use App\Divoom\Drawing\Themes\DefaultTheme;
use Illuminate\Console\Command;

class Divoom extends Command
{
    protected $signature = 'app:divoom';

    protected $description = 'Command description';

    public function handle(): void
    {
        $client = new Device('192.168.1.20');

        $canvas = new Canvas((new DefaultTheme)->desktopBackground);

        // $canvas->setPixel(rand(0, 63), rand(0, 63), Color::white());
        // $canvas->fillPattern(Color::white(), Color::black());
        // $canvas->fill(0, 0, 10, 10, new Color(23, 23, 202));
        //$canvas->rectangle(20, 20, 20, 20, new Color(23, 23, 202));

        //        $canvas->line(
        //            fromX: 10, fromY: 10,
        //            toX: 5, toY: 5,
        //            color: new Color(255, 0, 0)
        //        );

        //$canvas->rectangle(10, 10, 25, 25, new Color(255, 0, 0));

        $window = new Window(new DefaultTheme);
        $window->at(5, 5);
        $window->size(20, 40);
        $window->drawOn($canvas);

        $window2 = new Window(new DefaultTheme);
        $window2->at(40, 24);
        $window2->size(14, 13);
        $window2->drawOn($canvas);

        //        $canvas->setPixel(rand(1, 63), rand(1, 63), Color::black());
        //        $canvas->setPixel(rand(1, 63), rand(1, 63), Color::black());
        //        $canvas->setPixel(rand(1, 63), rand(1, 63), Color::black());

        $cursor = new PointerCursor(new DefaultTheme, rand(1, 63), rand(1, 63));
        $cursor->drawOn($canvas);

        //        dd($client->post(new CommandList([
        //            //new SelectChannel(Channel::Black),
        //            //new SetCustomPageIndex(3),
        //            new SentGif(
        //                PicNum: 1,
        //                PicID: $client->picId,
        //                PicSpeed: 1,
        //                PicData: $canvas->toBase64(),
        //                PicOffset: 0,
        //            )
        //        ])));

        //$client->post(new SelectChannel(Channel::Black));
        // dd($client->post(new SetCustomPageIndex(1)));

        $result = $client->sendCanvas($canvas);

        dump($client->picId);

        dd($result);

    }
    // http://doc.divoom-gz.com/web/#/12?page_id=219

    // https://github.com/SomethingWithComputers/pixoo/blob/main/src/pixoo/objects/pixoo.py#L43

}
