<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\News;

class NewsController extends Controller
{
    //
    public function add()
    {
      return view('admin.news.create');
    }
     public function create(Request $request)
    {
      $this->validate($requwst, News::$rules);
      
      $news = new News;
      $from = $request->all();
      
      if (isset($from['image'])) {
        $path = $request->file('image')->store('public/image');
      } else{
        $news->image_pate = null;
      }
      
      unset($from['_token']);
      unset($from['image']);
      
      $news->fill($from);
      $news->save();
      
      return redirect('admin/news/create');
    }
}
