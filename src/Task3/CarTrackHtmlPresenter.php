<?php

declare(strict_types=1);

namespace App\Task3;

use App\Task1\Car;
use App\Task1\Track;

class CarTrackHtmlPresenter
{
    public function present(Track $track): string
    {
        $cars = $track->all();

        $content .= '<table style="width:100%">';
        $content .= '<tr>';

        foreach ($cars as $car) {
            $content .= '<th>';
            $content .= '<h1 class="carName"> Марка авто:' . $car->getName() . '</h1>';
            $content .= '<img src="' . $car->getImage() . '">';
            $content .= '<p class="carsSpeed">Максимальная скорость: ' . $car->getSpeed() . ' км/ч' . '</p>';
            $content .= '<p class="pitStop">Время Пит-Стоп: ' . $car->getPitStopTime() . ' секунд' . '</p>';
            $content .= '<p class="consumption">Потребление топлива: ' . $car->getFuelConsumption() . ' литров' . '</p>';
            $content .= '<p class="fuel">Объем топливного бака: ' . $car->getFuelTankVolume() . ' литров на  100 км ' . '</p>';
            $content .= '</th>';
        }

        $content .= '</tr>';
        $content .= '</table>';

        return $content;
    }
}