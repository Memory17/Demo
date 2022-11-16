@extends('frontend.layout')

@section('content')
    <!-- Start Product Grid -->
    <section class="htc__product__grid bg__white ptb--50">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="htc__product__rightidebar">
                        <!-- Start Product View -->
                        <div class="row">
                            <div class="shop__grid__view__wrap">
                                <div class="single-grid-view tab-pane fade in active clearfix" id="show-filter">
                                    @foreach ($data as $item)
                                        <!-- Start Single Product -->
                                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6" style="height: 390px;">
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
                                                                $new_date = date('21/12/2022', $old_date);  
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
                        <!-- End Product View -->
                    </div>
                    <!-- Start Pagenation -->
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="htc__pagenation">
                                {{$data->render()}}
                            </ul>
                        </div>
                    </div>
                    <!-- End Pagenation -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grid -->
@endsection
