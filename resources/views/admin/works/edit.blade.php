@extends(admin_layout_vw().'.index')

@section('css')

    <link href="{{url(assets('admin'))}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>

@endsection
@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-md-12">


                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-plus font-dark"></i>
                            <span class="caption-subject bold uppercase">Arts work</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        {!! Form::open(['method'=>'put','class'=>'form-horizontal','files'=>true,'id'=>'form']) !!}
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Main image</label>
                                            <div class="col-md-9">
                                                <div class="fileinput fileinput-new"
                                                     data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail"
                                                         data-trigger="fileinput"
                                                         style="width: 200px; height: 150px;">
                                                        <img src="{{$work->main_image ??url('assets/apps/img/unknown.png')}}"
                                                             alt=""/>

                                                    </div>
                                                    <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> choose </span>
                                                                <span class="fileinput-exists"> change </span>
                                                                <input type="file" name="main_image"
                                                                       id="image"> </span>
                                                        <a href="javascript:;"
                                                           class="btn red fileinput-exists"
                                                           data-dismiss="fileinput">
                                                            cancel </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Image1</label>
                                            <div class="col-md-9">
                                                <div class="fileinput fileinput-new"
                                                     data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail"
                                                         data-trigger="fileinput"
                                                         style="width: 200px; height: 150px;">
                                                        <img src="{{$work->image1 ??url('assets/apps/img/unknown.png')}}"
                                                             alt=""/>

                                                    </div>
                                                    <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> choose </span>
                                                                <span class="fileinput-exists"> change </span>
                                                                <input type="file" name="image1"
                                                                       id="image"> </span>
                                                        <a href="javascript:;"
                                                           class="btn red fileinput-exists"
                                                           data-dismiss="fileinput">
                                                            cancel </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Image2</label>
                                            <div class="col-md-9">
                                                <div class="fileinput fileinput-new"
                                                     data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail"
                                                         data-trigger="fileinput"
                                                         style="width: 200px; height: 150px;">
                                                        <img src="{{$work->image2 ??url('assets/apps/img/unknown.png')}}"
                                                             alt=""/>

                                                    </div>
                                                    <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> choose </span>
                                                                <span class="fileinput-exists"> change </span>
                                                                <input type="file" name="image2"
                                                                       id="image"> </span>
                                                        <a href="javascript:;"
                                                           class="btn red fileinput-exists"
                                                           data-dismiss="fileinput">
                                                            cancel </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Image3</label>
                                            <div class="col-md-9">
                                                <div class="fileinput fileinput-new"
                                                     data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail"
                                                         data-trigger="fileinput"
                                                         style="width: 200px; height: 150px;">
                                                        <img src="{{$work->image3 ??url('assets/apps/img/unknown.png')}}"
                                                             alt=""/>

                                                    </div>
                                                    <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> choose </span>
                                                                <span class="fileinput-exists"> change </span>
                                                                <input type="file" name="image3"
                                                                       id="image"> </span>
                                                        <a href="javascript:;"
                                                           class="btn red fileinput-exists"
                                                           data-dismiss="fileinput">
                                                            cancel </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Image4</label>
                                            <div class="col-md-9">
                                                <div class="fileinput fileinput-new"
                                                     data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail"
                                                         data-trigger="fileinput"
                                                         style="width: 200px; height: 150px;">
                                                        <img src="{{$work->image4 ??url('assets/apps/img/unknown.png')}}"
                                                             alt=""/>

                                                    </div>
                                                    <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> choose </span>
                                                                <span class="fileinput-exists"> change </span>
                                                                <input type="file" name="image4"
                                                                       id="image"> </span>
                                                        <a href="javascript:;"
                                                           class="btn red fileinput-exists"
                                                           data-dismiss="fileinput">
                                                            cancel </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="tab-content">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Name :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" id="name"
                                                           class="form-control"
                                                           value="{{$work->name}}"
                                                           placeholder="Add name...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">price1 :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="price1" id="name"
                                                           class="form-control"
                                                           value="{{$work->price1}}"
                                                           placeholder="Add price for image 1...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">price2 :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="price2" id="name"
                                                           class="form-control"
                                                           value="{{$work->price2}}"
                                                           placeholder="Add price for image 2...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">price3 :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="price3" id="name"
                                                           class="form-control"
                                                           value="{{$work->price3}}"
                                                           placeholder="Add price for image 3...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">price4 :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="price4" id="name"
                                                           class="form-control"
                                                           value="{{$work->price4}}"
                                                           placeholder="Add price for image 4...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Job title :</label>
                                                <div class="col-md-9">
                                                                <textarea type="text" name="job_description"
                                                                          id="description"
                                                                          class="ckeditor"
                                                                          rows="5"
                                                                          placeholder="Add job title ...">{{$work->job_description}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">SubDescription :</label>
                                                <div class="col-md-9">
                                                                <textarea type="text" name="small_description"
                                                                          id="description"
                                                                          class="ckeditor"
                                                                          rows="5"
                                                                          placeholder="Add description ...">{{$work->small_description}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Description :</label>
                                                <div class="col-md-9">
                                                                <textarea type="text" name="description"
                                                                          id="description"
                                                                          class="ckeditor"
                                                                          rows="5"
                                                                          placeholder="Add description ...">{{$work->description}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- END FORM-->
                                </div>

                                {{--                                    @endforeach--}}
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit"
                                                class="btn btn-circle green btn-md save">
                                            <i class="fa fa-check"></i>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}


                        <div class="clearfix margin-bottom-20"></div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            </div>
        </div>
    @endsection

    @section('js')
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"
                type="text/javascript"></script>

        <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
                type="text/javascript"></script>


        <script src="{{url(assets('admin'))}}/global/scripts/app.min.js" type="text/javascript"></script>


        {{--            <script src="node_modules/blueimp-file-upload/js/jquery.fileupload.js"></script>--}}

        <!-- END THEME GLOBAL SCRIPTS -->

        <script src="{{url(assets('admin'))}}/js/works.js" type="text/javascript"></script>


@stop
