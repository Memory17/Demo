@extends('frontend.layout')

@section('content')
<section class="htc__contact__area ptb--100 bg__white">
    @include('frontend.note')
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                <div class="map-contacts--2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6450.9084129537705!2d108.2502752153832!3d15.975308995445904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421088e365cc75%3A0x6648fdda14970b2c!2zNDcwIMSQxrDhu51uZyBUcuG6p24gxJDhuqFpIE5naMSpYSwgSG_DoCBI4bqjaSwgTmfFqSBIw6BuaCBTxqFuLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1668243821220!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" ></iframe>

                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                <h2 class="title__line--6">LIÊN HỆ</h2>
                <div class="address">
                    <div class="address__icon">
                        <i class="icon-location-pin icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Địa Chỉ</h2>
                        <p>470 Trần Đại Nghĩa, Hòa Hải,Ngũ Hành Sơn, Đà Nẵng</p>
                    </div>
                </div>
                <div class="address">
                    <div class="address__icon">
                        <i class="icon-phone icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Số Điện Thoại</h2>
                        <p>0123.555.767</p>
                    </div>
                </div>
            </div>      
        </div>
        <div class="row">
            <div class="contact-form-wrap mt--60">
                <div class="col-xs-12">
                    <div class="contact-title">
                        <h2 class="title__line--6">GỬI LỜI NHẮN ĐẾN HOUSEW</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <form id="contact-form" action="/contact/send" method="post">
                        @csrf
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" value="{{old('name')}}" name="name" placeholder="Họ Và Tên*"><br>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span><br>
                                @enderror
                                <input type="email" value="{{old('email')}}" name="email" placeholder="Email*"><br>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span><br>
                                @enderror
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box subject">
                                <input type="text" value="{{old('title')}}" name="title" placeholder="Tiêu Đề*">
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <textarea name="value" placeholder="Lời Nhắn">{{old('value')}}</textarea>
                                @error('value')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="contact-btn">
                            <button type="submit" class="fv-btn">Gửi</button>
                        </div>
                    </form>
                    <div class="form-output">
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
@endsection