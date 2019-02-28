<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class ArticleController extends Controller
{
    //

    public function __construct(){

    }

    public function index(){
      $article = Article::all();

      return $article;
    }
}
