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

    //

    public function tweet(Request $request){

        $this->validate($request,[

            'tweet' => 'required'

        ]);

        //tweet to be uploaded to tweeter
        $newTweet = ['status' => $request->tweet];

       //multiple images will be uplaoded in input field
        if(!empty($request->images)){
            foreach ($request->images as $key => $value){

                $uploadMedia = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);

                if(!empty($uploadMedia)){

                    $newTweet['media_ids'][$uploadMedia->media_id_string] = $uploadMedia->media_id_string;

                }

            }

        }

        $twitter = Twitter::postTweet($newTweet);
        return back();

    }
}
