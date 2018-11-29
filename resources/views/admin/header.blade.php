@extends('layout.index')
@section('title',$title)
@section('content')
	<div class="box-body">
		@if (count($errors) > 0)
			<div class="callout callout-danger">
            	显示错误信息
                <ul>
                	@foreach ($errors->all() as $error)
                	<li style='font-size:14px'>{{$error}}</li>
                	@endforeach
                </ul>
            </div>
        @endif
          <form id="art_form" role="form" action="/admin/upload" method="post" enctype='multipart/form-data'>
            @php
            $user = DB::table('user')->where('id',session('uid'))->first();
            @endphp
			       <!-- 修改头像 -->
            <div class="form-group">
                  <img src="{{$user->header}}" id='imgs' alt="上传后显示图片" style="max-width:250px;max-height:200px;">
                  <input type="file" name="header" id="file_upload"style=" top: 0px; right: 0px; margin: 0px; ">     
            </div>
       		{{csrf_field()}}
    	   

          </form>
        </div>
@endsection

@section('js')
    <script type="text/javascript">
    $(function () {
        $("#file_upload").change(function () {

            var imgPath = $("#file_upload").val();

          if (imgPath == "") {
              alert("请选择上传图片！");
              return;
          }
          //判断上传文件的后缀名
          var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
          if (strExtension != 'jpg' && strExtension != 'gif'
              && strExtension != 'png' && strExtension != 'bmp') {
              alert("请选择图片文件");
              return;
          }

          var formData = new FormData($('#art_form')[0]);
          $.ajax({
            type: "POST",
            url: "/admin/upload",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#imgs').attr('src',data);
                 setTimeout(function(){
                  location.href = '/admin';
                  },1000)
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
        })
    })
</script>
@stop