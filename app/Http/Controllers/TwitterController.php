<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import twitter package installed, by thujojohn
use \Twitter;//use this, below will throw error Non-static method Thujohn\Twitter\Twitter::getUserTimeline() should not be called statically,
//use Thujohn\Twitter\Twitter;
use \File;


class TwitterController extends Controller

{
    private $count = 10;
    private $format = 'array';
    //
    public function twitterUserTimeline(){
        $data = Twitter::getUserTimeline(['count' =>$this->count, 'format'=>$this->format]); //look at thujohndocumention github, getuserTimeline is function of package

        return view('twitter',compact('data'));

    }
}
