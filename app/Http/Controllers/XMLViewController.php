<?php

namespace App\Http\Controllers;
use App\Vast;
use App\Media;
use Illuminate\Http\Request;

class XMLViewController extends Controller
{
    public function show($name){
    	$creatives = [];
    	$vast = Vast::where('name',$name)->first();
    	if(!empty($vast)){
    	$explode = explode(',',$vast->media_data);
    	foreach ($explode as $value) {
    		$media = Media::where('id',$value)->first();
    		if($media){
    			if(strpos($media->vidurl,'drive.google.com')){
    			$vidurl = 'https://www.googleapis.com/drive/v3/files/'.explode("/",parse_url($media->vidurl)['path'])[3].'?alt=media&key=AIzaSyCvcwcm-G8C9tHYoCMNHCf6iZfgGCHrsvk';
    			}else{
    			$vidurl = $media->vidurl;
    			}
    		$creatives[] = '<Creatives> <Creative sequence="1" AdID="'.$value.'"> <Linear> <Duration>00:00:'.$vast->duration.'</Duration> <AdParameters></AdParameters> <VideoClicks> <ClickThrough><![CDATA['.$vast->url.']]></ClickThrough></VideoClicks> <MediaFiles> <MediaFile id="'.$value.'" delivery="progressive" type="video/mp4" bitrate="0" width="640" height="360"><![CDATA['.$vidurl.']]></MediaFile> </MediaFiles> </Linear> </Creative> </Creatives>';
    	}
    	}
    	$template  = '<VAST version="2.0" xmlns:xsi="//www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="vast.xsd"> <Ad id="232859236"> <InLine> <AdSystem version="2.0">'.$vast->title.'</AdSystem> <AdTitle></AdTitle> <Description></Description> <Survey></Survey> '.implode('\n',$creatives).' </InLine> </Ad> </VAST>';
            return response()
                    ->make($template)->header('Content-Type', 'application/xml')->header('Access-Control-Allow-Origin','*');
    	}else{
    		abort(404);
    	}
    }
}
