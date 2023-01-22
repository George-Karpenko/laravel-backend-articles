<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticlesFormComponent extends Component
{
    public Article $article;
    public $title;
    public $text;
    public $categories;
    public $show = false;

    public function mount()
    {
        $this->categories = Category::select('title as name', 'id as value')->get()->toArray();
        array_unshift($this->categories, [
            'name' => __('No category'),
            'value' => null
        ]);
        if (isset($this->article)) {
            $this->title = "Updated article :D";
            $this->text = 'The article "' . $this->article->title . '" has been updated!';
        } else {
            $this->article = new Article();
            $this->title = "New article :D";
            $this->text = "A new article has been created!";
        }
    }

    public function render()
    {
        return view('livewire.articles-form-component')->layout(
            'articles-form',
            [
                'title' => $this->article->id ? __('Update article') : __('Create article'),
            ]
        );
    }

    public function rules()
    {
        return [
            'article.title' => [
                'required', 'min:6', 'max:255',
                Rule::unique('articles', 'title')->ignore($this->article->id),
            ],
            'article.category_id' => [
                'required'
            ],
            'article.content' => [
                'required',
            ],
            'article.posted_at' => [
                'date', 'after:start_date',
            ]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeOrEdit()
    {
        $this->validate();
        Auth::user()->author->articles()->save($this->article);

        session()->flash('event-notification', [
            "title" => $this->title,
            "text" => $this->text
        ]);

        return redirect()->route('articles');
    }

    public function uploadUrl(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);
            $url = asset('media/' . $fileName);
            return response()->json([
                'fileName' => $fileName,
                'uploaded' => 1,
                'url' => $url
            ]);
        }
    }
}
