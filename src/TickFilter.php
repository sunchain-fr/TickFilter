<?php

namespace SunchainFr\TickFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class TickFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'tick-filter';

    /**
     * @var string
     */
//    public $noneLabel = 'All';

    /**
     * TickFilter constructor.
     */
    public function __construct()
    {
        $this->withMeta([
            'showSelectNoneButton' => true,
            'single' => false,
            'mode' => 'wrap',
//            'noneLabel' => $this->getNoneLabel()
        ]);
    }

    public function getNoneLabel(): string
    {
        return $this->noneLabel;
    }

    /**
     * Apply the filter to the given query.
     *
     * @param Request $request
     * @param Builder $query
     * @param mixed $value
     *
     * @return Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @param Request $request
     *
     * @return array
     */
    public function options(Request $request)
    {
        return [];
    }

    public function dragMode(): self
    {
        return $this->withMeta([ 'mode' => 'drag' ]);
    }

    public function single(): self
    {
        return $this->withMeta([ 'single' => true ]);
    }

    public function noneLabel(string $label): self
    {
        return $this->withMeta([ 'noneLabel' => $label ]);
    }

    public function hideSelectNoneButton()
    {
        return $this->withMeta([ 'showSelectNoneButton' => false ]);
    }
}
