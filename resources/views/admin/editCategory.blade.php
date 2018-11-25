@extends('admin.master')
@section('title', 'Admin')

@section('content')
    <script>
        $(document).ready(function(){
            $("#msg").hide();
            //alert("working");
            $("#btn").click(function(){
                $("#msg").show();
                // alert("clicked");
                var cat_name = $("#cat_name").val();
                var token = $("#token").val();
                var id = $("#id").val();
                $.ajax({
                    type: "post",
                    data: "id=" + id + "&cat_name=" + cat_name + "&_token=" + token,
                    url: "<?php echo url('/admin/saveCategory') ?>",
                    success:function(data){
                        $("#msg").html("Categories has been updated");
                        $("#msg").fadeOut(2000);
                    }
                });
            });

            var auto_refresh = setInterval(
                function(){
                    $('#category').load('<?php echo url('admin/categories');?>').fadeIn("slow");
                },100);


        });
    </script>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">

                        <div class="content">
                            <p id="msg" class="alert alert-success"></p>
                            <input type="hidden" value="{{$data[0]->id}}" id="id"/>
                            <input type="hidden" value="{{csrf_token()}}" id="token"/>

                            <h2>Edit category</h2>
                            <input type="text" id="cat_name" value="{{$data[0]->cat_name}}" class="form-control"/>
                            <input type="submit" class="btn btn-success btn-fill" value="Submit" id="btn"/>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
