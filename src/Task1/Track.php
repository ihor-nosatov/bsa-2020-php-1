<?php

declare(strict_types=1);

namespace App\Task1;

class Track
{
    public function __construct(float $lapLength, int $lapsNumber)
    {
        $this->lapLength = $lapLength;
		$this->lapsNumber = $lapsNumber;
    }

    public function getLapLength(): float
    {
        return $this->lapLength;
    }

    public function getLapsNumber(): int
    {
        return $this->lapsNumber;
    }

    public function add(Car $car): void
    {
        $this->cars[] = $car;
    }

    public function all(): array
    {
        return $this->cars;
    }

    public function run(): Car{
        $carTime = [];
        $cars = $this->all();

        foreach ($cars as $key => $car){
            
            $id = $car->getId();
            $image = $car->getImage();
            $name = $car->getName();

            $carSpeed = $car->getSpeed();

            $fuelTankVolume = $car->getFuelTankVolume();
            $consumption = $car->getFuelConsumption();
            $pitStop = $car->getPitStopTime();

            $road = $this->lapsNumber * $this->lapLength;
            $wastedTime = round($road / $carSpeed,3)*3600;
            
            $wastedTime += $pitStop * (ceil ((( $road * $consumption * 0.01) / $fuelTankVolume))-1);
            $carTime[$key] = $wastedTime;
        }
        return $this->all()[array_search(min($carTime), $carTime)];
    }
}