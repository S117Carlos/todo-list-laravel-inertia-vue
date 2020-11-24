<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Inertia\Inertia;
use Illuminate\Support\Collection;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $avatarImg = 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60';

    private function mapItemResponse (Collection $data) {
        $mapGridFormat = [
            'avatar' => [
                "isAvatar" => true,
                "value" => $this->avatarImg,
                "captionValue" => ''
            ],
            'name' => [
                "isText" => true,
                "value" => 'achu'
            ],
            'checked' => [
                "isCheckbox" => true,
                "label" => 'Is Done?',
                "description" =>  '',
                "value" => true
            ]
            ,'edit' => [
                "isButton" => true,
                "additionalStyleClasses" => 'text-right text-sm font-medium',
                "value" => 'Edit'
            ]
        ];
        $result = $data->map(function($i) use ($mapGridFormat){
            $newItem = [];
            foreach($mapGridFormat as $key => $val) {
                if (isset($i[$key])) {
                    $mapGridFormat[$key]['value'] = $i[$key];
                }
                 // Harcoded, should come from object
                if ($key === 'avatar') {
                    $mapGridFormat[$key]['captionValue'] = (isset($i['name']) ? $i['name'] : '');
                }
                $newItem[$key] = $mapGridFormat[$key];
            }
            return $newItem;
        });
        return [$result, array_keys($mapGridFormat)];
    }

    public function index()
    {
        $data = Item::paginate(3, ['*'], 'page', 1)->toArray();
        $h = $this->mapItemResponse($data['data']);
        return Inertia::render('Todo/Index', [
                'rowsData' => $h[0],
                'headers' => $h[1],
                'pagination' => $data['pagination']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getItemPage(Request $request) {
        $pageSize = $request->get('pageSize');
        $pageNumber = $request->get('pageNumber');
        $data = Item::paginate($pageSize, ['*'], 'page', $pageNumber)->toArray();
        $h = $this->mapItemResponse($data['data']);
        return Inertia::render('Todo/Index', [
                'rowsData' => $h[0],
                'headers' => $h[1],
                'pagination' => $data['pagination']
        ]);
    }

    public function getByQueryString(Request $request) {
        dd($request);
        $query = $request->get('query');
        $items = Item::where('name','like',"%{$query}%")->paginate();
        return Inertia::render('Todo/Index', [
            'items' => $items->items(),
            'links' => $items->links(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
