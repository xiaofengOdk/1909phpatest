@extends("admin.layout.public")
@section("content")
     <div class="content-wrapper">
            <iframe width="100%" id="iframe" name="iframe"  onload="SetIFrameHeight()" 
                    frameborder="0" src="/static/admin/home.html"></iframe>
 
        </div>
@endsection