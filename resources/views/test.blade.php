@section('title','VAST Tester')
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @include('layouts.message')
            <div class="card">
                <div class="card-header">Test VAST</div>
                <div class="row">
                  <div class="col-md-12"><div id="player"></div></div>
                  <div class="col-md-12">
                  <div class="form-group" style="padding: 10px">
  <div class="form-group">
    <div class="input-group mb-3">
      <input type="text" class="form-control" id="urltest" placeholder="https://example.com/xxx.xml">
      <div class="input-group-append">
        <a href="#" class="btn btn-info" id="check">Check</a>
      </div>
    </div>
  </div>
</div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript" src="//ssl.p.jwpcdn.com/player/v/8.0.12/jwplayer.js"></script>
<script type="text/javascript">
  function vastester(e) {
    e = JSON.parse(e), jwplayer.key = "XSuP4qMl+9tK17QNb+4+th2Pm9AWgMO/cYH8CI0HGGr7bdjo";
    var t = jwplayer("player");
    t.setup({
        id: "player",
        file: e.file,
        type: "video/mp4",
        image: e.img,
        flashplayer:"//ssl.p.jwpcdn.com/player/v/8.1.1/jwplayer.flash.swf",
        controls: "true",
        displaytitle: "true",
        width: "100%",
        height: "100%",
        aspectratio: "16:9",
        primary:'html5',
        fullscreen: "true",
        autostart: true,
        playbackRateControls: [0.5, 0.75, 1, 1.25, 1.5, 2],
    sharing: { link: 'http://localhost/vmap.xml' },
        title:"VAST Testing",
        abouttext: "Tester VAST",
        aboutlink: "/",
      advertising: {
        "tag": e.urltest, // Kode Iklan VAST
        "client": "vast", // Client vast IMA / SDK
        "vpaidmode": "insecure" // Mode non/Secure
      },
        skin: {
            name: "glow"
        },
        captions: {
            color: "#FFFFFF",
            fontSize: 20,
            backgroundOpacity: 20
        }
    })
}
$('#check').click(function(){
vastester('{"file":"https://video.h-cdn.com/static/mp4/tears_of_steel_360p_MP4.mp4","urltest":"'+$('#urltest').val()+'"}');
});
</script>
@endsection