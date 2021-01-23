<style>
    .voice {
        border-radius: 10px;
        bottom: 0;
        position: absolute;
        width: 100%;
        height: 100px;
        z-index: 1;
        background: linear-gradient(180deg, hsla(0, 0%, 100%, 0) 109.04%, rgba(0, 0, 0, .2) 0);
    }

    ._3jdDJU6XmpGqrVzta2K-wC {
        font-size: 40px;
        bottom: 30px;
        left: 30px;
        z-index: 2;
        -webkit-animation: _3uIxtd9wA2boeV19AwsOg4 .25s ease-in-out forwards;
        animation: _3uIxtd9wA2boeV19AwsOg4 .25s ease-in-out forwards;

        color: #fff;
        position: absolute;
        -webkit-filter: drop-shadow(0 6px 22px rgba(0, 0, 0, .3));
        filter: drop-shadow(0 6px 22px rgba(0, 0, 0, .3));
        transition-duration: 5s;
    }

    ._3jdDJU6XmpGqrVzta2K-wC:hover {
        cursor: pointer;
    }
</style>
<div class="modal fade bs-modal-lg" id="requestIdMdl" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"> Request Message</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="portlet-body form">
                            <div class="alert alert-danger" role="alert" style="display: none"></div>

                            <div class="form-body">

                                <div class="row">
                                    @if(isset($request->client_video))
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                {{--                                        <video src="{{$request->client_video->video}}" controls--}}
                                                {{--                                               height="340"--}}
                                                {{--                                               poster="{{$request->client_video->thumb}}"--}}
                                                {{--                                               width="100%"></video>--}}
                                                <div class="video wow fadeIn inline-video-wrap">
                                                    {{--                        <video autoplay="" data-testid="profile-bio-video" loop="" muted="" playsinline="" id="profile-bio-video" preload="none" style="width: 100%; height: 100%; max-height: 450px; min-height: 450px; border-radius: 10px; display: block; position: relative; visibility: initial; object-fit: cover;"><source src="https://d3el26csp1xekx.cloudfront.net/v/no-wm-JvlpbHEWhh.mp4" type="video/mp4"></video>--}}
                                                    {{--                        <img src="{{$talent->thumb800}}" class="thumb" width="800" height="400"/>--}}

                                                    <video autoplay="" data-testid="client-request-video" loop=""
                                                           muted=""
                                                           playsinline=""
                                                           id="client-request-video" preload="none"
                                                           style="width: 100%; height: 100%; max-height: 600px; min-height: 450px; border-radius: 10px; display: block; position: relative; visibility: initial; object-fit: cover;">
                                                        <source src="{{$request->client_video->video ?? ''}}"
                                                                type="video/mp4">
                                                    </video>
                                                    <div
                                                        style="position:absolute;left:0;right:0;bottom:0;text-align:center;height:80px">
                                                        <div style="width:100%;height:100%;position:relative"><i
                                                                class="_3jdDJU6XmpGqrVzta2K-wC fa fa-volume-off"
                                                                aria-hidden="true"></i></div>
                                                    </div>
                                                    {{--                                            <a href="#" class="play-video inline-play"><img--}}
                                                    {{--                                                    src="{{url('assets/site/')}}/images/fonts/play-video-2.svg"/></a>--}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-8">

                                        <div class="form-group ">
                                            <p>{!! smart_wordwrap($request->message,15) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-circle btn-md red close-modal">
                                            <i class="fa fa-times"></i>
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
