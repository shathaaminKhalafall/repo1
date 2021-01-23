@extends(admin_layout_vw().'.index')

@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="{{$icon}} font-dark sbold"></i> <span
                                class="caption-subject font-dark sbold uppercase">{{$title}}</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::open(['method'=>'PUT','url'=>url(admin_terms_url().'/edit'),'class'=>'form-horizontal','id'=>'formAdd']) !!}
                        <div class="form-group">

                            <div class="col-md-12">
                                <label>Title (English)...</label>
                                <input type="text" class="form-control" name="title_en"
                                       id="title_en"
                                       placeholder="Title (English)..." value="{{$about->title_en}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Title (Arabic)...</label>
                                <input type="text" class="form-control" name="title_ar"
                                       id="title_ar"
                                       placeholder="Title (Arabic)..." value="{{$about->title_ar}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Description (English)...</label>
                                <textarea type="text" class="form-control ckeditor" name="description_en"
                                          id="description_en"
                                          placeholder="Description (English)...">{!! $about->description_en !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Description (Arabic)...</label>

                                <textarea type="text" class="form-control ckeditor" name="description_ar"
                                          id="description_ar"
                                          placeholder="Description (Arabic)...">{!! $about->description_ar !!}</textarea>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn green save"><i class="fa fa-check"></i> Save</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{--    <script src="{{url('/')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>--}}
    <script src="{{url('/')}}/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/global/scripts/app.min.js" type="text/javascript"></script>
    {{--    <script src="{{url('/')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>--}}
    <script src="{{url('/')}}/assets/js/setting.js" type="text/javascript"></script>
    <script>
        CKEDITOR.replace('description_ar');
        CKEDITOR.replace('description_en');
    </script>
@stop
