@extends('frontend.layout')

@section('content')
    <!-- Start Product Details Area -->
    <section class="htc__product__details bg__white ptb--100">
        <!-- Start Product Details Top -->
        <div class="htc__product__details__top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <h2>Bài viết: <i>{{$data->post_title}}</i></h2>
                        <br>
                        <h5>Tác giả: {{$data->user->user_name}}</h5>
                        <br>
                        <h6>Ngày đăng: 
                            @php
                                $old_date = strtotime($data->created_at);
                                $new_date = date('11/10/2022', $old_date);  
                                echo $new_date
                            @endphp
                        </h6>
                        <br>
                        <hr>
                        <center>
                            <img src="{{$data->post_image}}" alt="" style="width: 80%">
                        </center>
                        <br>
                        {!! $data->post_content !!}
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <center>
                            <div class="fb-comments" data-href="http://127.0.0.1:8000/{{Request::path()}}" data-width="900" data-numposts="5"></div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Details Top -->
    </section>
    <!-- End Product Details Area -->
    
    <!-- Start Product Area -->
    <section class="htc__product__area--2 pb--100 product-details-res">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        @if (count($dataBlog) > 0)
                        <h2 class="title__line">BÀI VIẾT KHÁC</h2>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="product__wrap clearfix">
                    @foreach ($dataBlog as $item)
                    <!-- Start Single Product -->
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6" style="height: 390px; margin-bottom: 50px">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="/blog/{{$item->id}}-{{Str::slug($item->post_title, '-')}}.html">
                                    <img style="max-width: 260px; height: 260px" src="{{$item->post_image}}" alt="{{$item->post_title}}">
                                </a>
                            </div>
                            <div class="fr__product__inner" style="margin-top: -15px">
                                <ul class="fr__pro__prize">
                                    <li><a style="font-size: 10px" href="/shop/blog/{{$item->id}}-{{Str::slug($item->post_title, '-')}}.html">Ngày đăng:
                                        @php
                                            $old_date = strtotime($item->created_at);
                                            $new_date = date('10/11/2022', $old_date);  
                                            echo $new_date
                                        @endphp
                                    </a></li>
                                </ul>
                                <h4><a href="/blog/{{$item->id}}-{{Str::slug($item->post_title, '-')}}.html"><i style="
                                    max-width: 250px;
                                    height: 40px;
                                    line-height: 20px;
                                    word-break: break-all;
                                    display: -webkit-box;
                                    -webkit-box-orient: vertical;
                                    -moz-box-orient: vertical;
                                    -ms-box-orient: vertical;
                                    box-orient: vertical;
                                    -webkit-line-clamp: 2;
                                    -moz-line-clamp: 2;
                                    -ms-line-clamp: 2;
                                    line-clamp: 2;
                                    overflow: hidden;
                                    ">{{$item->post_title}}</i></a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Area -->
@endsection

@section('script')
<div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="" nonce="Jyz5TErv"></script>
@endsection