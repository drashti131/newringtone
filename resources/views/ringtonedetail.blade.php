@extends('app')
@section('body')

<style>
.play {
  background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMiAyNHYtMjRsMjAgMTItMjAgMTJ6Ii8+PC9zdmc+);
}
.pause {
   background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMTAgMjRoLTZ2LTI0aDZ2MjR6bTEwLTI0aC02djI0aDZ2LTI0eiIvPjwvc3ZnPg==)!important;
   background-position-x:10px !important;
}

</style>

@if(!isset($label))
<div class="content" style="padding: 0px 16px 10px">
    <div class="item-detail-wrap">
        <div class="like-share-report-icon">
            <div class="like-icon icons " data-eid="7ijwip2w">
                <svg class="icon">
                    <use xlink:href="#favorite"></use>
                </svg>
            </div>
            <div class="share-icon icons"
                data-share-url="https%3A%2F%2Fmobcup.net%2Fringtone%2Fiphone-14-pro-max-alarm-7ijwip2w"
                data-share-title="Iphone 14 Pro Max Alarm | iPhone 14 Pro Max Ringtone - MobCup">
                <svg class="icon">
                    <use xlink:href="#share"></use>
                </svg>
            </div>
            <div class="report-icon icons toggle-modal" data-modal="report-item" data-id="7ijwip2w">
                <svg class="icon">
                    <use xlink:href="#report"></use>
                </svg>
            </div>
        </div>

          <div class="item-detail">
            <div class="title">
                {{$ringtonedata->name}}
            </div>
            <div class="info">
                <a class="author" href="#">
                    @ {{$ringtonedata->authorname}}
                </a>
                <div class="downloads">
                    <svg class="icon">
                        <use xlink:href="#arrow_down"></use>
                    </svg>
                    <span class="downloadcount">{{ $ringtonedata->download_count }}</span>
                </div>
            </div>



            <div id="player-container">
                <div class="rectangle_d bg-gradient-{{mt_rand(0,9)}}">
                    <div class="circle_d play newcls" id="{{$ringtonedata->r_id}}" src="{{asset('public/Assets')}}/Admin/Ringtones/Android/{{$ringtonedata->audio_file}}"></div>
                </div>
            </div>
            <div>{{$ringtonedata->time}} Sec</div>
            @php
            $labelsarray = explode(',', $ringtonedata->labels);
        @endphp
            <div class="tags">
                @if(isset($labelsarray))
                    @foreach ($labelsarray as $l)
                        <a class="tag" href="{{url('labels')}}/{{str_replace(' ', '-', $l)}}"
                        rel="tag">{{$l}}</a>
                    @endforeach
                @endif
            </div>
            <div class="download-btn-wrap">
                    <a target="_blank" href="#" rel="nofollow" class="download-btn setas">Set as ringtone</a>
                    <a href="{{ asset('public/Assets') }}/Admin/Ringtones/Android/{{ $ringtonedata->audio_file }}"
                        rel="nofollow" class="download-btn download" download data="{{$ringtonedata->r_id}}">Download .mp3 for Android</a>
                    <a href="{{ asset('public/Assets') }}/Admin/Ringtones/IOS/{{ $ringtonedata->iphone_audio_file }}"
                        rel="nofollow" class="download-btn iphone download" download data="{{$ringtonedata->r_id}}">Download .m4r for iPhone</a>
                </div>
        </div>
    </div>
</div>
@endif

@if(isset($rdata) && count($rdata)>0)
<div class="content mt-30">
    @if(isset($url))
<h1>{{$url}} Ringtones</h1>
@endif
    <div class="ringtone-list">
        @foreach ($rdata as $key=>$value)
            <div class="ringtone ">
                <div class="details">


                    <div id="player-container">
                    <div class="rectangle bg-gradient-{{mt_rand(0,9)}}">
                        <div class="circle play newcls" id="{{$value['r_id']}}" src="{{asset('public/Assets')}}/Admin/Ringtones/Android/{{$value['audio_file']}}"></div>
                    </div>
                        <!-- <div class="newcls">

                        </div> -->

                    </div>

                    <!-- <div class="controls">
                        <div class="control bg-gradient-3">
                    <div class="controls">
                        <div class="control bg-gradient-3" data-id="01f5dzvi" data-f="Eed253231d4611226da6062dcc735cbb6">

                            <div class="play play-icon">
                                <svg class="icon">
                                    <use xlink:href="#play-icon"></use>
                                </svg>
                            </div>
                            <div class="pause pause-icon">
                                <svg class="icon">
                                    <use xlink:href="#pause-icon"></use>
                                </svg>
                            </div>
                            <div class="spinner-border">
                                <div class="spinner"></div>
                            </div>
                        </div>

                    </div>  -->

                    <a href="{{url('/')}}/{{$value['url']}}" class="title">{{$value['name']}}</a>
                    <div class="like-share-icon">

                        <div class="like-icon " data-eid="01f5dzvi">
                            <svg class="icon">
                                <use xlink:href="#favorite"></use>
                            </svg>
                        </div>
                        <div class="share-icon"
                            data-share-url="https%3A%2F%2Fmobcup.net%2Fringtone%2Foii-message-tone-01f5dzvi"
                            data-share-title="iPhone Message Tone Ringtone - MobCup">
                            <svg class="icon">
                                <use xlink:href="#share"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="duration">{{$value['time']}}</div>
                    <div class="username">@ {{$value['authorname']}}</div>
                    <div class="downloads">
                        <svg class="icon">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                        {{$value['download_count']}}
                    </div>
                </div>
                @php
                    $labelsarray = explode(',', $value['labels']);
                @endphp
                <div class="tags">
                @if(isset($labelsarray))
                    @foreach ($labelsarray as $l)
                        <a class="ringtone-tag" href="{{url('labels')}}/{{str_replace(' ', '-', $l)}}"
                        rel="tag">{{$l}}</a>
                    @endforeach
                @endif
                </div>
                <a class="btn btn-success downloadbtn bg-download-button-{{mt_rand(0,9)}}" href="{{url('/')}}/{{$value['url']}}">
                        <svg class="icon">
                            <use xlink:href="#download-icon"></use>
                        </svg>
                        Download
                </a>
            </div>
        @endforeach
    </div>
</div>
@endif


@endsection

@section('script')
<script type="text/javascript">
    $(document).ready( function() {

        var track      = document.createElement('audio');
        track.id       = 'audio-player';
        track.controls = 'controls';

        track.type     = 'audio/mpeg';
        $('.newcls').click(function(){
            track.src      = $(this).attr('src');
            var id=$(this).attr('id')
            if ($(this).hasClass('play')) {
                track.play();
                //controlBtn.textContent = "Pause";
                $(this).removeClass('play')
                $(this).addClass('pause')
            } else {
                track.pause();
                //controlBtn.textContent = "Play";
                $(this).addClass('play')
                $(this).removeClass('pause')
            }

            track.addEventListener('ended', function() {
                $('#'+id).removeClass('pause')
                $('#'+id).addClass('play')
            });
        });
    });
</script>

<script>
        $(document).ready(function() {
            $(function() {
                $('.download').on('click', function() {
                    var r_id=$(this).attr('data');
                    $.ajax({
                        method: 'get',
                        url: "{{url('downloadringtone')}}"+"/"+ r_id,
                        success: function(data) {
                            $(".downloadcount").html(data);
                        },
                    });
                });
            });
        });
    </script>
@endsection

