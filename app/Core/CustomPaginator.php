<?php namespace App\Core;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\UrlWindow;
use Illuminate\Support\Collection;

class CustomPaginator extends LengthAwarePaginator{

    public function only(...$attributes)
    {
        return $this->transform(function ($item) use ($attributes) {
            return $item->only($attributes);
        });
    }

    public function transform($callback)
    {
        $this->items->transform($callback);

        return $this;
    }

    public function toArray()
    {
        return [
            'data' => collect($this->items->toArray()),
            'queryString' => request()->get('query',''),
            'links'=> $this->links(),
            'pagination' => [
                'recordsTotal' => $this->total(),
                'pageSize' => $this->perPage(),
                'pageNumber' => $this->currentPage(),
                'pages' => $this->lastPage()
            ]
        ];
    }

    public function links($view = null, $data = [])
    {
        $this->appends(request()->all());

        $window = UrlWindow::make($this);

        $elements = array_filter([
            $window['first'],
            is_array($window['slider']) ? '...' : null,
            $window['slider'],
            is_array($window['last']) ? '...' : null,
            $window['last'],
        ]);

        return Collection::make($elements)->flatMap(function ($item) {
            if (is_array($item)) {
                return Collection::make($item)->map(function ($url, $page) {
                    return [
                        'url' => $url,
                        'label' => $page,
                        'active' => $this->currentPage() === $page,
                    ];
                });
            } else {
                return [
                    [
                        'url' => null,
                        'label' => '...',
                        'active' => false,
                    ],
                ];
            }
        })->prepend([
            'url' => $this->previousPageUrl(),
            'label' => 'Previous',
            'active' => false,
        ])->push([
            'url' => $this->nextPageUrl(),
            'label' => 'Next',
            'active' => false,
        ]);
    }
}