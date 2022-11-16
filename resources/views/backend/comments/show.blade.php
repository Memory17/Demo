@extends('backend.layout')

@section('content')
<div class="content">
  @include('backend.note')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Chi Tiết Bình Luận</h4>
              {{-- <p class="card-category">Complete your profile</p> --}}
            </div>
            <form action="admin/comments/{{$data->comment_id}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Ảnh sản phẩm</label>
                    <img style="max-width: 250px" src="{{$data->product->product_image}}" alt="">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Bình luận & Đánh giá</label><br>
                    {{-- <input type="text" class="form-control"> --}}
                    <a href="/shop/product/{{$data->product_id}}-{{Str::slug($data->product->product_name)}}">{{$data->user->user_name}} đã đánh giá {{$data->comment_rating}} sao sản phẩm {{$data->product->product_name}}</a> <br>
                    <span>{{$data->comment_customer}}</span>
                  </div>
                  <div class="form-group">
                    <label>Admin trả lời</label><br>
                    <span class="text-primary">{{$data->comment_admin}}</span>
                    <br><hr>
                    <textarea style="background: whitesmoke" name="comment_admin" id="" cols="30" rows="5" class="form-control" placeholder="Admin viết câu trả lời ở đây"></textarea>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Trả lời bình luận</button>
            <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
@endsection

@section('script')
  <script>
    function chosseFile(file){
        if(file && file.files[0]){
            var reader = new FileReader()
            reader.onload = function(e){
                $("#image").attr('src', e.target.result)
            }
            reader.readAsDataURL(file.files[0])
        }
    }
  </script>
@endsection