<?php

namespace App\Http\Controllers\Admin\Cards;

use App\Components\UploadedFile;
use App\Http\Requests\CardCreateRequest;
use App\Http\Requests\CardUpdateRequest;
use App\Models\Card;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = (int)$request->input('lang');
        $lang = Language::findOrFail($lang);

        return view('admin.cards.card.index', compact('lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $lang = (int)$request->input('lang');
        $lang = Language::findOrFail($lang);
        return view('admin.cards.card.create', compact('lang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardCreateRequest $request)
    {
        $data = $request->all();

        $imgFront = $this->saveMedia('img_front');
        $sound = $this->saveMedia('sound');

        $type = $request->input('media');
        $back = $this->saveMedia($type);

        $data['img_front'] = $imgFront;
        $data['sound'] = $sound;
        $data[$type] = $back;

        $item = Card::create($data);
        $item->save();


        if ($item) {
            return redirect()
                ->route('admin.cards.card.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $card = Card::findOrFail($id);

        return view('admin.cards.card.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardUpdateRequest $request, $id)
    {
        /**
         * @var $item Card
         */
        $item = Card::findOrFail($id);
        $data = $request->all();


        if ($request->file('sound')) {
            $sound = $this->saveMedia('sound');
            $data['sound'] = $sound;
        }

        if ($request->file('img_front')) {
            $imgFront = $this->saveMedia('img_front');
            $data['img_front'] = $imgFront;
        }

        if ($request->file('img_back') || $request->file('video')) {
            $item->video = null;
            $item->img_back = null;

            $type = $request->input('media');
            $back = $this->saveMedia($type);
            $data[$type] = $back;
        }

        $item->fill($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('admin.cards.card.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Card::findOrFail($id);
        $lang = $card->language_id;
        $result = $card->delete();

        if ($result) {
            return redirect()
                ->route('admin.cards.card.index', ['lang' => $lang])
                ->with(['success' => "Карточка id[$id] удалена"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления'])
                ->withInput();
        }
    }

    private function saveMedia($type) {

        $dir = '/media' . '/' . $type;
        $path =  public_path() . $dir;
        $file = UploadedFile::getInstance($type);
        if (!$file) {
            return null;
        }
        return '/public/media/' . $type . '/' . $file->saveAs($path);
    }

}
