<?php

namespace App\Http\Controllers\Front;

use App\Models\NewsEvents;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\RolePermission;
use App\Models\RoleHasPermission;

class NewsController extends Controller
{
   public function recruitment()
   {
      $news = NewsEvents::where(['cat' => 'recruitment'])->get();
      return view('front.pages.recruitment', compact('news'));
   }

   public function act()
   {
      return view('front.pages.act');
   }

   public function award()
   {
      $news = NewsEvents::where(['cat' => 'award'])->orderBy('created_at', 'desc')->take(10)->get();
      return view('front.pages.award', compact('news'));
   }

   public function awardAchievements()
   {
      $news = NewsEvents::where(['cat' => 'award'])->orderBy('created_at', 'desc')->get();
      return view('front.pages.award_detail', compact('news'));
   }
   public function ugc()
   {
      $news = NewsEvents::where(['cat' => 'ugc', 'flag' => 0])->orderBy('created_at', 'desc')->get();
      return view('front.pages.ugc', compact('news'));
   }

   public function recognition()
   {
      $recognitions = NewsEvents::where(['cat' => 'recognition', 'flag' => 0])->orderBy('created_at', 'desc')->get();
      return view('front.pages.recognition', compact('recognitions'));
   }
}
