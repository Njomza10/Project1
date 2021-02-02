<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
     $title = "Index";
    return view('pages.index')-> with('title',$title);
    }
    public function about() {
    $title = "About";
    return view('pages.about')-> with('title',$title);
    }
    public function services() {
      $data=array(
      'title' => 'Services',
      'services' => ['Web Design', 'Php','Laravel']
      );
    return view('pages.services')-> with ($data);
    }

    public function posts() {

    }
  public function blog() {
  $data=array(
  'title' =>'Blog',
  'posts' =>[]
  );



 return view('pages.blog')->with($data);
  }
    }

