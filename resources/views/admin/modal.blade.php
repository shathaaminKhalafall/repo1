<link href="{{assets('admin')}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
      type="text/css"/>

<link href="{{assets('admin')}}/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
<link href="{{assets('admin')}}/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet"
      type="text/css"/>
<link href="{{assets('admin')}}/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet"
      type="text/css"/>


<div class="modal fade bs-modal-lg" id="{{$modal_id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"> {!! $modal_title !!}</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="portlet-body form">
                            {!! Form::open(['method'=>$form['method'],'id'=>$form['form_id'],'class'=>'form-horizontal form','url'=>$form['url'] ,'files'=>true]) !!}
                            <div class="alert alert-danger" role="alert" style="display: none"></div>

                            <div class="form-body">
                                @foreach($form['fields'] as $key => $fields)
                                    @if($fields == 'image' || $fields == 'video')
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-9">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                         style="width: 200px; height: 150px;">
                                                        @if(isset($form['values']))
                                                            @if($fields == 'video')
                                                                <video src="{{$form['values'][$key]}}" controls
                                                                       width="200"></video>
                                                            @else
                                                                <img src="{{$form['values'][$key]}}">

                                                            @endif
                                                        @else
                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                                 alt=""/>

                                                        @endif
                                                    </div>
                                                    <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> Select </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="{{$key}}"
                                                                       id="{{$key}}"> </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists"
                                                           data-dismiss="fileinput">
                                                            Remove </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    @endif

                                    @if($fields == 'file')
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-9">
                                                <input type="file" name="{{$key}}" id="{{$key}}" class="form-control"
                                                       placeholder="{{$form['fields_name'][$key]}}">
                                            </div>
                                        </div>
                                    @endif

                                    @if($fields == 'text')
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-9">
                                                <input type="text" name="{{$key}}" id="{{$key}}" class="form-control"
                                                       placeholder="{{$form['fields_name'][$key]}}"
                                                       @if(isset($form['values'])) value="{{$form['values'][$key]}}" @endif>
                                            </div>
                                        </div>
                                    @endif
                                    @if($fields == 'number')
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-9">
                                                <input type="number" name="{{$key}}" id="{{$key}}"
                                                       class="form-control"
                                                       placeholder="{{$form['fields_name'][$key]}}"
                                                       @if(isset($form['values'])) value="{{$form['values'][$key]}}" @endif>
                                            </div>
                                        </div>
                                    @endif
                                    @if($fields == 'text_dis')
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-9">
                                                <input type="text" name="{{$key}}" id="{{$key}}" class="form-control"
                                                       placeholder="{{$form['fields_name'][$key]}}" disabled
                                                       @if(isset($form['values'])) value="{{$form['values'][$key]}}" @endif>
                                            </div>
                                        </div>
                                    @endif
                                    @if($fields == 'time')
                                        <div class="form-group">
                                            <label class="control-label col-md-3">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-3">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" name="{{$key}}" id="{{$key}}"
                                                           class="form-control timepicker timepicker-24"
                                                           @if(isset($form['values'])) value="{{$form['values'][$key]}}" @endif>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($fields == 'email')
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-9">
                                                <input type="email" name="{{$key}}" id="{{$key}}"
                                                       class="form-control"
                                                       placeholder="{{$form['fields_name'][$key]}}"
                                                       @if(isset($form['values'])) value="{{$form['values'][$key]}}" @endif>
                                            </div>
                                        </div>
                                    @endif
                                    @if($fields == 'checkbox')
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-9">

                                                <div class="md-checkbox"><input type="checkbox" name="{{$key}}"
                                                                                id="checkbox1"
                                                                                class="md-check is_correct"
                                                                                @if(isset($form['values']) && $form['values'][$key]) checked @endif><label
                                                        for="checkbox1"><span></span><span
                                                            class="check"></span><span class="box"></span> </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($fields == 'password')
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-9">
                                                <input type="password" name="{{$key}}" id="{{$key}}"
                                                       class="form-control"
                                                       placeholder="{{$form['fields_name'][$key]}}">
                                            </div>
                                        </div>
                                    @endif
                                    @if($fields == 'textarea')
                                        <div class="form-group">

                                            @if($modal_id == 'edit-article' || $modal_id == 'add-article'|| $modal_id == 'edit-role' || $modal_id == 'add-role')
                                                <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>

                                                <div class="col-md-9">
                                                <textarea name="{{$key}}" id="{{$key}}" rows="5"
                                                          placeholder="{{$form['fields_name'][$key]}}"
                                                          class="form-control">@if(isset($form['values'])){{$form['values'][$key]}}@endif</textarea>
                                                </div>
                                            @else
                                                <div class="col-md-12">
                                                <textarea name="{{$key}}" id="{{$key}}" rows="5"
                                                          placeholder="{{$form['fields_name'][$key]}}"
                                                          class="form-control">@if(isset($form['values'])){{$form['values'][$key]}}@endif</textarea>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    @if($fields == 'ckeditor')
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>

                                            <div class="col-md-9">
                                                <textarea name="{{$key}}" id="{{$key}}" rows="5"
                                                          placeholder="{{$form['fields_name'][$key]}}"
                                                          class="form-control {{$fields}}">@if(isset($form['values'])){{$form['values'][$key]}}@endif</textarea>
                                            </div>

                                            <script>
                                                CKEDITOR.replace('{{$key}}');
                                            </script>
                                        </div>
                                    @endif

                                    @if(is_array($fields))
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-9">
                                                <div class="input-icon">
                                                    <select class="form-control select2 {{$key}}" name="{{$key}}"
                                                            @if(strpos($key,'[]') !== false && ($modal_id == 'add-admin' || $modal_id == 'edit-admin'))
                                                            multiple
                                                            @endif
                                                            data-placeholder="Choose {{$form['fields_name'][$key]}}..."
                                                            id="{{$key}}">
                                                        @foreach($fields as $k=> $field)
                                                            <option value="{{$k}}"
                                                                    @if(isset($form['values']) && $form['values'][$key] == $k) selected @endif>{{ucfirst($field)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(is_object($fields) && strpos($key,'[]') !== false)
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-9">
                                                <div class="input-icon">
                                                    <select class="form-control select2 {{$key}}" name="{{$key}}"
                                                            @if(strpos($key,'[]') !== false) multiple
                                                            @endif data-placeholder="Choose {{$form['fields_name'][$key]}} ..."
                                                            id="{{$key}}"
                                                            style="    padding: 0;">
                                                        <option></option>

                                                        @if(strpos($key,'[]') !== false && isset($form['values'][$key]))
                                                            @foreach($form['values'][$key] as $item)
                                                                <option value="{{$item->id}}"
                                                                        @if(in_array($item->id,$roles_id)) selected @endif>{{ucfirst($item->display_name)}}</option>

                                                            @endforeach
                                                            @foreach($fields as  $k => $field)

                                                                @if(in_array($field->id,$form['values']['role_res[]'])) @continue @endif
                                                                <option value="{{$field->id}}">{{ucfirst($field->display_name)}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($fields as $field)
                                                                <option value="{{$field->id}}"
                                                                        @if(isset($form['values']) && $form['values'][$key] == $field->id) selected @endif>{{ucfirst($field->display_name)}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(is_object($fields) && strpos($key,'[]') === false)
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{ucfirst($form['fields_name'][$key])}}</label>
                                            <div class="col-md-9">
                                                <div class="input-icon">
                                                    <select class="form-control select2 {{$key}}" name="{{$key}}"
                                                            @if(strpos($key,'[]') !== false) multiple
                                                            @endif data-placeholder="Choose {{$form['fields_name'][$key]}} ..."
                                                            id="{{$key}}"
                                                            style="    padding: 0;">
                                                        <option></option>

                                                        @foreach($fields as $k =>$field)
                                                            @if($key == 'category_id')
                                                                <option value="{{$field->id}}"
                                                                        @if(isset($form['values']) && $form['values'][$key] == $field->id) selected @endif>{{ucfirst($field->category_text)}}</option>
                                                            @elseif($key == 'type_id')
                                                                <option value="{{$field->id}}"
                                                                        @if(isset($form['values']) && $form['values'][$key] == $field->id) selected @endif>{{ucfirst($field->type_text)}}</option>
                                                            @elseif($key == 'cat_id')
                                                                <option value="{{$field->category_id}}"
                                                                        @if(isset($form['values']) && $form['values'][$key] == $field->category_id) selected @endif>{{ucfirst($field->name)}}</option>
                                                            @else
                                                                <option value="{{$field->id}}"
                                                                        @if(isset($form['values']) && $form['values'][$key] == $field->id) selected @endif>{{ucfirst($field->title)}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{$form['fields_name'][$key]}}</label>
                                            <div class="col-md-12" style="padding: 0">
                                                <div class="input-icon">
                                                    <div class="col-md-12" style="padding: 0">
                                                        <label class="m-checkbox m-checkbox--state-primary">
                                                            <input   id="checkAll" type="checkbox"> تحديد الكل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                    <div class="m-checkbox-inline">
                                                        <?php $category=[]; ?>
                                                        @foreach($fields as $k=> $field)
                                                            @if(!in_array($field->category,$category))
                                                                <div class="col-md-12 role_brea" style="padding: 0">
                                                                    <label class=" role_lbl m-checkbox m-checkbox--state-primary">
                                                                        <input   class="all_category" data-category="{{$field->category}}"  type="checkbox">{{trans('app.'.$field->category)}}
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                                <h5 class="role_lbl">{{trans('app.'.$field->category)}}</h5>
                                                            @endif
                                                            <?php $category[]= $field->category ;?>
                                                            <label  class="m-checkbox m-checkbox--state-success " style="margin-left: 25px">
                                                                <input class="{{$field->category}}" @if(isset($form['values']) && $form['values'][$key]->hasPermissionTo($field->name)) checked @endif name="permissions[]" value="{{$field->id}}" type="checkbox"> {{($field->name_ar)}}
                                                                <span></span>
                                                            </label>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                @endforeach



                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-circle green btn-md save"><i
                                                    class="fa fa-check"></i>
                                                Save
                                            </button>
                                            <button type="button" class="btn btn-circle btn-md red"
                                                    data-dismiss="modal">
                                                <i class="fa fa-times"></i>
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<script src="{{assets('admin')}}/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="{{assets('admin')}}/pages/scripts/components-select2.min.js" type="text/javascript"></script>

<script src="{{assets('admin')}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
        type="text/javascript"></script>
<script src="{{assets('admin')}}/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="{{assets('admin')}}/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"
        type="text/javascript"></script>

<script src="{{assets('admin')}}/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
        type="text/javascript"></script>
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{assets('admin')}}/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{assets('admin')}}/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
    //    $(document).ready(function () {
    //        $('.select2').select2();
    $(".select2").select2({
        dir: "rtl",
    });
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};

    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);

    });

    $(".all_category").click(function () {
        var data_category = $(this).attr('data-category');
        $('input:checkbox.'+data_category).not(this).prop('checked', this.checked);

    });
    //    });
</script>
