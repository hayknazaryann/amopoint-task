<?php

namespace App\Repositories\Eloquent;

use App\Models\Visitor;
use App\Repositories\Interfaces\VisitorInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class VisitorRepository extends EloquentRepository implements VisitorInterface
{
    /**
     * VisitorRepository constructor.
     * @param Visitor $visitor
     */
    public function __construct(Visitor $visitor)
    {
        $this->model = $visitor;
    }

    /** @inheritDoc */
    public function create(array $data): Model
    {
        $date = Carbon::parse($data['time'])->format('Y-m-d H:i:s');
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $date, $data['time_zone']);
        $date->setTimezone('UTC');
        $exist = $this->getModel()->query()->where(['ip' => $data['ip']])->whereBetween('date', [
            Carbon::now()->format('Y-m-d H:00:00'),
            Carbon::now()->addHours(1)->format('Y-m-d H:00:00')
        ])->first();

        if ($exist) {
            return $exist;
        }
        return $this->getModel()->query()->create([
            'ip' => $data['ip'],
            'city' => $data['city'],
            'user_agent' => $data['userAgent'],
            'date' => $date
        ]);
    }

    /** @inheritDoc */
    public function byHour(): Collection
    {
        return $this->getModel()->select([
            'id', 'date',
            DB::raw("DATE_FORMAT(date, '%Y-%m-%d %H') as formatted_date"),
            DB::raw("DATE_FORMAT(date, '%Y-%m-%d %H:00') as hour"),
        ])
            ->selectRaw('count(id) as count')
            ->groupBy('formatted_date')
            ->pluck('count', 'hour');
    }

    /** @inheritDoc */
    public function byCity(): Collection
    {
        return $this->getModel()
            ->select([
                'id', 'city',
                DB::raw("COUNT(city) as count"),
            ])
            ->selectRaw('count(id) as count')
            ->groupBy('city')
            ->pluck('count', 'city');
    }


}
