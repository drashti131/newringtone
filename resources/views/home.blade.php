@extends('app')
@section('body')
<style>
    /* #player-container .newcls {
    cursor: pointer;
    text-indent: -999999px;
    height:45px;
    width: 45px;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMiAyNHYtMjRsMjAgMTItMjAgMTJ6Ii8+PC9zdmc+),linear-gradient(49.02deg,#fc5c7d -14.03%,#6a82fb 104.22%);
    background-repeat: no-repeat!important;
    background-position: center;
    background-repeat:no-repeat;
    background-position:center;
    border-radius: 4px;
} */
.play {
  background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMiAyNHYtMjRsMjAgMTItMjAgMTJ6Ii8+PC9zdmc+);
}
.pause {
   background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMTAgMjRoLTZ2LTI0aDZ2MjR6bTEwLTI0aC02djI0aDZ2LTI0eiIvPjwvc3ZnPg==)!important;
   background-position-x:10px !important;
}
.rectangle {
    border-radius: 2px;
    display: inline-block;
    margin-right: 2px;
    width: 50px;
    height: 50px;
    position: relative;
    /* background:linear-gradient(49.02deg,#fc5c7d -14.03%,#6a82fb 104.22%) */
}

.rectangle .circle {
    background: #fff;
    border-radius: 100%;
    height: 35px;
    width: 35px;
    position: absolute;
    top: 8px;
    left: 8px;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMiAyNHYtMjRsMjAgMTItMjAgMTJ6Ii8+PC9zdmc+);
    background-repeat: no-repeat!important;
    background-position: center !important;
    background-size:16px;
    background-position-x:11px !important;
    cursor: pointer;
}

.downloadbtn{
    margin-left: auto;
    width: fit-content;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 30px;
    padding: 6px 12px;
    color: #fff;
    font-weight: 700;
    font-size: 12px;
    line-height: 16px;
    cursor: pointer;
    text-decoration: none;
    margin-top:25px
}
.downloadbtn svg{
    width: 14px;
    height: 14px;
    margin-right: 8px;

}
</style>
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
                            <div class="circle play newcls" id="{{$value->r_id}}" src="{{asset('public/Assets')}}/Admin/Ringtones/{{$value->audio_file}}"></div>

                        </div>
                            <!-- <div class="newcls">

                            </div> -->
                            <!-- <div id="{{$value->r_id}}" class="play newcls" src="https://cldup.com/qR72ozoaiQ.mp3">Play</div> -->
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
                            <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/iphone-message-tone.html"
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

            {{-- <div class="ringtone ">
                <div class="details">
                    <div class="controls">
                        <div class="control bg-gradient-2" data-id="itbqz8j7" data-f="Ccc00170de36194d1b497b24796746d14">
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
                    </div>
                    <a href="ringtone/nada-dering-iphone-pangilan-masuk-itbqz8j7.html" class="title">Nada Dering Iphone
                        Pangilan Masuk</a>
                    <div class="like-share-icon">
                        <div class="like-icon " data-eid="itbqz8j7">
                            <svg class="icon">
                                <use xlink:href="#favorite"></use>
                            </svg>
                        </div>
                        <div class="share-icon"
                            data-share-url="https%3A%2F%2Fmobcup.net%2Fringtone%2Fnada-dering-iphone-pangilan-masuk-itbqz8j7"
                            data-share-title="Nada Dering Iphone Pangilan Masuk Ringtone - MobCup">
                            <svg class="icon">
                                <use xlink:href="#share"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="duration">2</div>
                    <div class="username">@ChinmaySharma1</div>
                    <div class="downloads">
                        <svg class="icon">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                        45030
                    </div>
                </div>
                <div class="tags">
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/iphone.html" rel="tag">iphone</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/nada-dering-nada-dering.html"
                        rel="tag">nada dering nada dering</a>
                </div>
                <div class="download-button bg-download-button-2">
                    <svg class="icon">
                        <use xlink:href="#download-icon"></use>
                    </svg>
                    Download
                </div>
            </div>
            <div class="ringtone ">
                <div class="details">
                    <div class="controls">
                        <div class="control bg-gradient-9" data-id="pouysv0j" data-f="ZZEvANj84Ah">
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
                    </div>
                    <a href="ringtone/notification-pouysv0j.html" class="title">notification</a>
                    <div class="like-share-icon">
                        <div class="like-icon " data-eid="pouysv0j">
                            <svg class="icon">
                                <use xlink:href="#favorite"></use>
                            </svg>
                        </div>
                        <div class="share-icon"
                            data-share-url="https%3A%2F%2Fmobcup.net%2Fringtone%2Fnotification-pouysv0j"
                            data-share-title="notification Ringtone - MobCup">
                            <svg class="icon">
                                <use xlink:href="#share"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="username">@bjititio</div>
                    <div class="downloads">
                        <svg class="icon">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                        4486
                    </div>
                </div>
                <div class="tags">
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/other.html" rel="tag">other</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/notification.html"
                        rel="tag">notification</a>
                </div>
                <div class="download-button bg-download-button-9">
                    <svg class="icon">
                        <use xlink:href="#download-icon"></use>
                    </svg>
                    Download
                </div>
            </div>
            <div class="ringtone ">
                <div class="details">
                    <div class="controls">
                        <div class="control bg-gradient-6" data-id="fmd7kjjl" data-f="Dd1003e9bcd7a4a7d3e9ae2aa25cba862">
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
                    </div>
                    <a href="ringtone/nada-pesan-ipone-fmd7kjjl.html" class="title">Nana Dering iPhone || Nada Pesan
                        Iphone</a>
                    <div class="like-share-icon">
                        <div class="like-icon " data-eid="fmd7kjjl">
                            <svg class="icon">
                                <use xlink:href="#favorite"></use>
                            </svg>
                        </div>
                        <div class="share-icon"
                            data-share-url="https%3A%2F%2Fmobcup.net%2Fringtone%2Fnada-pesan-ipone-fmd7kjjl"
                            data-share-title="Nana Dering iPhone || Nada Pesan Iphone Ringtone - MobCup">
                            <svg class="icon">
                                <use xlink:href="#share"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="duration">30</div>
                    <div class="username">@ChinmaySharma1</div>
                    <div class="downloads">
                        <svg class="icon">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                        13844
                    </div>
                </div>
                <div class="tags">
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/nana-dering-iphone.html"
                        rel="tag">nana dering iphone</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/nada-pesan-iphone.html"
                        rel="tag">nada pesan iphone</a>
                </div>
                <div class="download-button bg-download-button-6">
                    <svg class="icon">
                        <use xlink:href="#download-icon"></use>
                    </svg>
                    Download
                </div>
            </div>
            <div class="ringtone ">
                <div class="details">
                    <div class="controls">
                        <div class="control bg-gradient-9" data-id="4vjntmw9" data-f="22a9a35a31bb9cf32e4cb32dd083e30ef">
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
                    </div>
                    <a href="ringtone/hangouts-message-tone-4vjntmw9.html" class="title">Hangouts Message | Hangouts
                        Notification | Notification</a>
                    <div class="like-share-icon">
                        <div class="like-icon " data-eid="4vjntmw9">
                            <svg class="icon">
                                <use xlink:href="#favorite"></use>
                            </svg>
                        </div>
                        <div class="share-icon"
                            data-share-url="https%3A%2F%2Fmobcup.net%2Fringtone%2Fhangouts-message-tone-4vjntmw9"
                            data-share-title="Hangouts Message | Hangouts Notification | Notification Ringtone - MobCup">
                            <svg class="icon">
                                <use xlink:href="#share"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="duration">1</div>
                    <div class="username">@mikeg</div>
                    <div class="downloads">
                        <svg class="icon">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                        2527
                    </div>
                </div>
                <div class="tags">
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/hangouts-message.html"
                        rel="tag">hangouts message</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/hangouts-notification.html"
                        rel="tag">hangouts notification</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/notification.html"
                        rel="tag">notification</a>
                </div>
                <div class="download-button bg-download-button-9">
                    <svg class="icon">
                        <use xlink:href="#download-icon"></use>
                    </svg>
                    Download
                </div>
            </div>
            <div class="ringtone ">
                <div class="details">
                    <div class="controls">
                        <div class="control bg-gradient-5" data-id="z4tgqnhe" data-f="Ddc96f4b04bdaf21656c5427139e662e2">
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
                    </div>
                    <a href="ringtone/nada-dering-pesan-wa-iphone-z4tgqnhe.html" class="title">Nada Dering Pesan Wa
                        Iphone</a>
                    <div class="like-share-icon">
                        <div class="like-icon " data-eid="z4tgqnhe">
                            <svg class="icon">
                                <use xlink:href="#favorite"></use>
                            </svg>
                        </div>
                        <div class="share-icon"
                            data-share-url="https%3A%2F%2Fmobcup.net%2Fringtone%2Fnada-dering-pesan-wa-iphone-z4tgqnhe"
                            data-share-title="Nada Dering Pesan Wa Iphone Ringtone - MobCup">
                            <svg class="icon">
                                <use xlink:href="#share"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="duration">2</div>
                    <div class="username">@ChinmaySharma1</div>
                    <div class="downloads">
                        <svg class="icon">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                        14323
                    </div>
                </div>
                <div class="tags">
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/nada-dering-pesan-wa-iphone.html"
                        rel="tag">nada dering pesan wa iphone</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/message.html"
                        rel="tag">message</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/iphone.html" rel="tag">iphone</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/apple.html" rel="tag">apple</a>
                </div>
                <div class="download-button bg-download-button-5">
                    <svg class="icon">
                        <use xlink:href="#download-icon"></use>
                    </svg>
                    Download
                </div>
            </div>
            <div class="ringtone ">
                <div class="details">
                    <div class="controls">
                        <div class="control bg-gradient-4" data-id="nmvnmj3p" data-f="Ffa3f32c1bf4de3d50fcb4a310d0d45ae">
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
                    </div>
                    <a href="ringtone/teri-baaton-ki-pyari-si-mithi-si-nmvnmj3p.html" class="title">Teri Baaton Ki Pyari
                        Si Mithi Si</a>
                    <div class="like-share-icon">
                        <div class="like-icon " data-eid="nmvnmj3p">
                            <svg class="icon">
                                <use xlink:href="#favorite"></use>
                            </svg>
                        </div>
                        <div class="share-icon"
                            data-share-url="https%3A%2F%2Fmobcup.net%2Fringtone%2Fteri-baaton-ki-pyari-si-mithi-si-nmvnmj3p"
                            data-share-title="Teri Baaton Ki Pyari Si Mithi Si Ringtone - MobCup">
                            <svg class="icon">
                                <use xlink:href="#share"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="duration">35</div>
                    <div class="username">@pritiyadav989</div>
                    <div class="downloads">
                        <svg class="icon">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                        584
                    </div>
                </div>
                <div class="tags">
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/teri-baaton-ki-pyari-si-mithi-si.html"
                        rel="tag">teri baaton ki pyari si mithi si</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/love.html" rel="tag">love</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/romantic.html"
                        rel="tag">romantic</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/yaariyan.html"
                        rel="tag">yaariyan</a>
                    <span>#arijit singh</span>
                </div>
                <div class="download-button bg-download-button-4">
                    <svg class="icon">
                        <use xlink:href="#download-icon"></use>
                    </svg>
                    Download
                </div>
            </div>
            <div class="ringtone ">
                <div class="details">
                    <div class="controls">
                        <div class="control bg-gradient-0" data-id="47vxavq7" data-f="Ddda811cc5d186a441c0db8d5c6ca68d0">
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
                    </div>
                    <a href="ringtone/notification-47vxavq7.html" class="title">Notification</a>
                    <div class="like-share-icon">
                        <div class="like-icon " data-eid="47vxavq7">
                            <svg class="icon">
                                <use xlink:href="#favorite"></use>
                            </svg>
                        </div>
                        <div class="share-icon"
                            data-share-url="https%3A%2F%2Fmobcup.net%2Fringtone%2Fnotification-47vxavq7"
                            data-share-title="Notification Ringtone - MobCup">
                            <svg class="icon">
                                <use xlink:href="#share"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="duration">4</div>
                    <div class="username">@sharmashobhit43210</div>
                    <div class="downloads">
                        <svg class="icon">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                        1478
                    </div>
                </div>
                <div class="tags">
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/notification.html"
                        rel="tag">notification</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/alert.html" rel="tag">alert</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/message-tone.html"
                        rel="tag">message tone</a>
                </div>
                <div class="download-button bg-download-button-0">
                    <svg class="icon">
                        <use xlink:href="#download-icon"></use>
                    </svg>
                    Download
                </div>
            </div>
            <div class="ringtone ">
                <div class="details">
                    <div class="controls">
                        <div class="control bg-gradient-1" data-id="11gew6ch" data-f="667d57dcc0fc629a571c29479a2f89bad">
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
                    </div>
                    <a href="ringtone/nada-dering-nada-dering-11gew6ch.html" class="title">Nada Dering Apple - Nada
                        Dering iPhone</a>
                    <div class="like-share-icon">
                        <div class="like-icon " data-eid="11gew6ch">
                            <svg class="icon">
                                <use xlink:href="#favorite"></use>
                            </svg>
                        </div>
                        <div class="share-icon"
                            data-share-url="https%3A%2F%2Fmobcup.net%2Fringtone%2Fnada-dering-nada-dering-11gew6ch"
                            data-share-title="Nada Dering Apple - Nada Dering iPhone Ringtone - MobCup">
                            <svg class="icon">
                                <use xlink:href="#share"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="duration">27</div>
                    <div class="username">@ChinmaySharma1</div>
                    <div class="downloads">
                        <svg class="icon">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                        27530
                    </div>
                </div>
                <div class="tags">
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/nada-dering-apple.html"
                        rel="tag">nada dering apple</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/nada-dering-iphone.html"
                        rel="tag">nada dering iphone</a>
                </div>
                <div class="download-button bg-download-button-1">
                    <svg class="icon">
                        <use xlink:href="#download-icon"></use>
                    </svg>
                    Download
                </div>
            </div>
            <div class="ringtone ">
                <div class="details">
                    <div class="controls">
                        <div class="control bg-gradient-1" data-id="hydikbrd" data-f="66bc1376772031507104a750e33f0b823">
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
                    </div>
                    <a href="ringtone/notification-hydikbrd.html" class="title">Notification</a>
                    <div class="like-share-icon">
                        <div class="like-icon " data-eid="hydikbrd">
                            <svg class="icon">
                                <use xlink:href="#favorite"></use>
                            </svg>
                        </div>
                        <div class="share-icon"
                            data-share-url="https%3A%2F%2Fmobcup.net%2Fringtone%2Fnotification-hydikbrd"
                            data-share-title="Notification Ringtone - MobCup">
                            <svg class="icon">
                                <use xlink:href="#share"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="duration">1</div>
                    <div class="username">@momdad</div>
                    <div class="downloads">
                        <svg class="icon">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                        80266
                    </div>
                </div>
                <div class="tags">
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/notification.html"
                        rel="tag">notification</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/massage.html"
                        rel="tag">massage</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/toon.html" rel="tag">toon</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/new-notification.html"
                        rel="tag">new notification</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/new.html" rel="tag">new</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/new-massage.html" rel="tag">new
                        massage</a>
                    <a class="ringtone-tag" href="browse/ringtones/mp3/0/downloads/love-notification.html"
                        rel="tag">love notification</a>
                </div>
                <div class="download-button bg-download-button-1">
                    <svg class="icon">
                        <use xlink:href="#download-icon"></use>
                    </svg>
                    Download
                </div>
            </div> --}}
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


