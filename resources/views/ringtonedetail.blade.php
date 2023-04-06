@extends('app')
@section('body')
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
                    {{$ringtonedata->download_count}}
                </div>
            </div>
            <div class="controls">
                <div class="control" data-id="7ijwip2w" data-f="88533618ffe6fe8da95f1ca8a96e6ee5d">
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
            <div>{{$ringtonedata->time}}</div>
            @php
            $labelsarray = explode(',', $ringtonedata->labels);
        @endphp
            <div class="tags">
                @if(isset($labelsarray))
                    @foreach ($labelsarray as $l)
                        <a class="tag" href="#"
                        rel="tag">{{$l}}</a>
                    @endforeach
                @endif
            </div>
            <div class="download-btn-wrap">
                <a target="_blank"
                    href="#"
                    rel="nofollow" class="download-btn setas">Set as ringtone</a>
                <a href="{{asset('public/Assets')}}/Admin/Ringtones/{{$ringtonedata->audio_file}}" rel="nofollow"
                    class="download-btn" DOWNLOAD>Download .mp3 for Android</a>
                <a href="#" rel="nofollow"
                    class="download-btn iphone">Download .m4r for iPhone</a>
            </div>
        </div>
    </div>
</div>
@endsection
