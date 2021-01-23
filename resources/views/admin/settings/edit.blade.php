@extends(admin_layout_vw().'.index')

@section('css')
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{url('/')}}/assets/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{url('/')}}/assets/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit font-dark sbold"></i> <span
                                class="caption-subject font-dark sbold uppercase">Edit Settings</span>
                    </div>
                </div>

                {{--`name`, `image`, `code`, `calling_code`,--}}

                <div class="portlet-body form">
                    {{--<form class="form-horizontal" role="form">--}}
                    {!! Form::open(['method'=>'PUT','url'=>url(admin_setting_url().'/settings/'.$setting->id),'class'=>'form-horizontal','id'=>'edit-country','files'=>true]) !!}

                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">القيمة</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title" id="title" placeholder="الاسم" value="{{$setting->title ?? ''}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">نوع الحقل</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="field_type" id="field_type" placeholder="نوع الحقل"
                                   value="{{($setting->field_type == 'number')? 'رقم':'نص' ?? ''}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code" class="col-md-2 control-label">التفاصيل</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="description_ar" id="description_ar" placeholder="التفاصيل" rows="10">{{$setting->description_ar ?? ''}}</textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-8 text-center">
                            <button type="submit" class="btn purple"> تعديل<i class="fa fa-edit"></i></button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
@endsection
@section('js')
    <script src="{{url('/')}}/assets/global/scripts/app.min.js" type="text/javascript"></script>=
    <script src="{{url('/')}}/assets/js/setting.js" type="text/javascript"></script>

@stop
