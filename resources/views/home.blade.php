@extends('app')
@section('body')
    <section class="content">
        <h1>Trending Ringtones
        </h1>

        @if(isset($ringtonedata) && count($ringtonedata)>0)
        <div class="ringtone-list">
            @foreach ($ringtonedata as $key=>$value)
                <div class="ringtone ">
                    <div class="details">


                        <div id="player-container">
                        <div class="rectangle bg-gradient-{{mt_rand(0,9)}}">
                            <div class="circle play newcls" id="{{$value->r_id}}" src="{{ asset('public/Assets/Admin/Ringtones/Android/'.$value->audio_file) }}"></div>
                        </div>
                        </div>



                        <a href="{{url('/')}}/{{$value->url}}" class="title">{{$value->name}}</a>
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
                        <div class="duration">{{$value->time}}</div>
                        <div class="username">@ {{$value->authorname}}</div>
                        <div class="downloads">
                            <svg class="icon">
                                <use xlink:href="#arrow_down"></use>
                            </svg>
                            {{$value->download_count}}
                        </div>
                    </div>
                    @php
                        $labelsarray = explode(',', $value->labels);
                    @endphp
                    <div class="tags">
                    @if(isset($labelsarray))
                        @foreach ($labelsarray as $l)
                            <a class="ringtone-tag" href="{{url('labels')}}/{{str_replace(' ', '-', $l)}}"
                            rel="tag">{{$l}}</a>
                        @endforeach
                    @endif
                    </div>
                    <a class="btn btn-success downloadbtn bg-download-button-{{mt_rand(0,9)}}" href="{{url('/')}}/{{$value->url}}">
                            <svg class="icon">
                                <use xlink:href="#download-icon"></use>
                            </svg>
                            Download
                    </a>
                </div>
            @endforeach
        </div>
        @endif

    </section>
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
@endsection


