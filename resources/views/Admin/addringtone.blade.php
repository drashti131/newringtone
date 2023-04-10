@extends('Admin.master')
@section('body')
<style>
    .error{
        color : red !important;
    }
    .image-preview-container {
    width: 30%;
    /* margin: 0 auto; */
    border: 1px solid rgba(0, 0, 0, 0.1);
    padding: 10px;
    border-radius: 20px;
}

.preview{
    display: flex;
    justify-content: center;
}

.image-preview-container img {
    width:50%;
    margin-bottom: 30px;
    display: none;
}
.dflex{
    display: block !important;
}
.image-preview-container input {
    display: none;
}

.image-preview-container label {
    display: block;
    width: 45%;
    height: 45px;
    margin-left: 25%;
    text-align: center;
    background: #8338ec;
    color: #fff;
    font-size: 15px;
    text-transform: Uppercase;
    font-weight: 400;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">{{(isset($edit)?'Edit' : 'Add')}} Ringtone</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{url('dashboard')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{url('ringtone')}}" class="text-muted">Ringtone</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">{{(isset($edit)?'Edit' : 'Add')}} Ringtone</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">{{(isset($edit)?'Edit' : 'Add')}} Ringtone</h3>
                        </div>
                        <!--begin::Form-->
                        @if(isset($edit))
                            <form class="form"  action="{{url('admin/ringtone')}}/{{$edit->r_id}}" enctype="multipart/form-data" method="POST" id="ringtone">
                            @method('PUT')
                        @else
                            <form class="form"  action="{{url('admin/ringtone')}}" enctype="multipart/form-data" method="post" id="ringtone">
                        @endif
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Ringtone Name :</label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Enter Ringtone Name" value="{{isset($edit)?$edit->name:''}}"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Ringtone URL :</label>
                                        <input type="text" id="url" class="form-control" name="url" placeholder="Enter Ringtone URL" value="{{isset($edit)?$edit->url:''}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Time :</label>
                                        <input type="text" class="form-control" name="time" placeholder="Enter Time" value="{{isset($edit)?$edit->time:''}}"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Author Name :</label>
                                        <input type="text" class="form-control" name="authorname" placeholder="Enter Author Name" value="{{isset($edit)?$edit->authorname:''}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label>Labels :</label>
                                        <textarea class="form-control" name="labels" placeholder="Enter Labels">{{isset($edit)?$edit->labels :''}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-lg-12">Audio File :</label>
                                        @if(isset($edit))
                                            <audio controls class="mb-2">
                                                <source src="{{asset('public/Assets/Admin/Ringtones/Android/'.$edit->audio_file)}}" type="audio/mpeg">
                                            </audio>
                                        @endif
                                        <input type="file" class="form-control" name="audio_file" accept="audio/mp3"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-lg-12">IOS Audio File :</label>
                                        @if(isset($edit))
                                            <audio controls class="mb-2">
                                                <source src="{{asset('public/Assets/Admin/Ringtones/IOS/'.$edit->iphone_audio_file)}}" type="audio/mpeg">
                                            </audio>
                                        @endif
                                        <input type="file" class="form-control" name="iphone_audio_file"/>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                                        <a href="{{url('admin/ringtone')}}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
    $('#name').on('keyup', function (e) {
    e.preventDefault();
    var str = $(this).val();
    str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
    str = str.replace(/\W$/, '').toLowerCase();
    $('#url').val(str);
    });

    $(document).ready(function() {
        $("#ringtone").validate({
            rules: {
                name: "required",
                time: "required",
                authorname: "required",
                labels: "required",
                image: "required",

            },
            messages: {
                name: "Name is required",
                time: "Time is required",
                authorname: "Author Name is required",
                image: "Image is required",
            }
        });
    });
</script>
<script>
    const previewImage = (event) => {
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#preview-selected-image");
        imagePreviewElement.src = imageSrc;
        imagePreviewElement.style.display = "block";
    }
};
</script>
@endsection
