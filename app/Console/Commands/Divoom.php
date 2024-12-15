<?php

namespace App\Console\Commands;

use App\Divoom\Device;
use App\Divoom\Drawing\Canvas;
use App\Divoom\Drawing\Color;
use App\Divoom\Drawing\Components\Window;
use App\Divoom\Drawing\Themes\DefaultTheme;
use App\Divoom\Enums\Channel;
use App\Divoom\Requests\SelectChannel;
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
        $window->at(10, 10);
        $window->size(40, 40);
        $window->drawOn($canvas);

        $window2 = new Window(new DefaultTheme);
        $window2->at(40, 22);
        $window2->size(20, 20);
        $window2->drawOn($canvas);

        $client->post(new SelectChannel(Channel::Black));
        $result = $client->sendCanvas($canvas);
    }
    // http://doc.divoom-gz.com/web/#/12?page_id=219

    // https://github.com/SomethingWithComputers/pixoo/blob/main/src/pixoo/objects/pixoo.py#L43

}
