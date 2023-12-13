<?php

namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface VisitorInterface extends EloquentInterface
{
    /**
     * @return Collection
     */
    public function byHour(): Collection;

    /**
     * @return Collection
     */
    public function byCity(): Collection;

}
