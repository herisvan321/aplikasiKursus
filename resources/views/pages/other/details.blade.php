@extends('layouts.othertemp')

@section('content')
@include('layouts.include.other.banner1')
<section class="course-details-area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-contents">
                <h2>{{ $data->judul }}</h2>
                @if($kondisi == 1)
                <p>{{ $data->child->judul_sub_kursus }}</p>
                @endif
                <div class="main-image">
                    <center><img class="img-fluid" src="{{ asset("assets/dist/img/".$data->image) }}" alt="" ></center>
                </div>
                <div class="jq-tab-wrapper" id="horizontalTab">
                    <div class="jq-tab-menu">
                        @if($kondisi == 1)
                        <div class="jq-tab-title " data-tab="10">Child Desc</div>
                        @endif
                        <div class="jq-tab-title active" data-tab="1">Introduction</div>
                        <div class="jq-tab-title" data-tab="2">Eligibility</div>
                        <!-- <div class="jq-tab-title" data-tab="2">Silabus</div>
                        <div class="jq-tab-title" data-tab="2">Materials</div> -->
                        <div class="jq-tab-title" data-tab="3">Course Outline</div>
                        <!-- <div class="jq-tab-title" data-tab="4">Comments</div>-->
                        <div class="jq-tab-title" data-tab="5">Reviews</div> 
                    </div>
                    <div class="jq-tab-content-wrapper">
                        @if($kondisi == 1)
                        <div class="jq-tab-content " data-tab="10">
                            {!! $data->child->deskripsi !!}
                        </div>
                        @endif
                        <div class="jq-tab-content active" data-tab="1">
                            {!! $data->introduction !!}
                        </div>
                        <div class="jq-tab-content" data-tab="2">
                            {!! $data->ellgibilitty !!}
                        </div>
                        <div class="jq-tab-content" data-tab="3">
                            <ul class="course-list">
                               
                                @foreach($data->sub as $key => $dat)
                                <li class="justify-content-between d-flex">
                                    <p>{{ $dat->judul_sub_kursus }}</p>
                                    <a class="primary-btn text-uppercase" href="{{ route('other.details.child', [base64_encode($dat->id_sub_kursus), "child"]) }}">View Details</a>
                                </li>
                                @endforeach
                               
                            </ul>
                        </div>
                        <div class="jq-tab-content comment-wrap" data-tab="4">
                            <div class="comments-area">
                                <h4>05 Comments</h4>
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/xc1.jpg.pagespeed.ic.I-Tr4yOV9A.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Emilly Blunt</a></h5>
                                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                                <p class="comment">
                                                    Never say goodbye till the end comes!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-list left-padding">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/xc2.jpg.pagespeed.ic.Yh29qf7VIw.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Elsie Cunningham</a></h5>
                                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                                <p class="comment">
                                                    Never say goodbye till the end comes!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/xc4.jpg.pagespeed.ic.wTHgL1J_uk.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Maria Luna</a></h5>
                                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                                <p class="comment">
                                                    Never say goodbye till the end comes!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-form">
                                <h4>Leave a Comment</h4>
                                <form>
                                    <div class="form-group form-inline">
                                        <div class="form-group col-lg-6 col-md-12 name">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Enter Name" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Name'">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12 email">
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter email address" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter email address'">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control mb-10" rows="5" name="message"
                                            placeholder="Messege" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Messege'" required></textarea>
                                    </div>
                                    <a href="#" class="mt-40 text-uppercase genric-btn primary text-center">Post
                                        Comment</a>
                                </form>
                            </div>
                        </div>
                        <div class="jq-tab-content" data-tab="5">
                            <div class="review-top row pt-40">
                                <div class="col-lg-3">
                                    <div class="avg-review">
                                        Average <br>
                                        <span>5.0</span> <br>
                                        (3 Ratings)
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <h4 class="mb-20">Provide Your Rating</h4>
                                    <div class="d-flex flex-row reviews">
                                        <span>Quality</span>
                                        <div class="star">
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <span>Outstanding</span>
                                    </div>
                                    <div class="d-flex flex-row reviews">
                                        <span>Puncuality</span>
                                        <div class="star">
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <span>Outstanding</span>
                                    </div>
                                    <div class="d-flex flex-row reviews">
                                        <span>Quality</span>
                                        <div class="star">
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <span>Outstanding</span>
                                    </div>
                                </div>
                            </div>
                            <div class="feedeback">
                                <h4 class="pb-20">Your Feedback</h4>
                                <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                                <a href="#" class="mt-20 primary-btn text-right text-uppercase">Submit</a>
                            </div>
                            <!-- <div class="comments-area mb-30">
                                <div class="comment-list">
                                    <div class="single-comment single-reviews justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/xc1.jpg.pagespeed.ic.I-Tr4yOV9A.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Emilly Blunt</a>
                                                    <div class="star">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    </div>
                                                </h5>
                                                <p class="comment">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut
                                                    sed, dolorum asperiores perspiciatis provident, odit maxime
                                                    doloremque aliquam.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-list">
                                    <div class="single-comment single-reviews justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/xc2.jpg.pagespeed.ic.Yh29qf7VIw.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Elsie Cunningham</a>
                                                    <div class="star">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    </div>
                                                </h5>
                                                <p class="comment">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut
                                                    sed, dolorum asperiores perspiciatis provident, odit maxime
                                                    doloremque aliquam.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-list">
                                    <div class="single-comment single-reviews justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/xc3.jpg.pagespeed.ic.SQQrMySO5O.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Maria Luna</a>
                                                    <div class="star">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    </div>
                                                </h5>
                                                <p class="comment">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut
                                                    sed, dolorum asperiores perspiciatis provident, odit maxime
                                                    doloremque aliquam.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-list">
                                    <div class="single-comment single-reviews justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/xc4.jpg.pagespeed.ic.wTHgL1J_uk.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Maria Luna</a>
                                                    <div class="star">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    </div>
                                                </h5>
                                                <p class="comment">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut
                                                    sed, dolorum asperiores perspiciatis provident, odit maxime
                                                    doloremque aliquam.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 right-contents">
                <ul>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Trainer’s Name</p>
                            <span class="or">Sri Imelwaty</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Course Fee </p>
                            <span>$230</span>
                        </a>
                    </li> -->
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Available Seats </p>
                            <span>15</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Schedule </p>
                            <span>2.00 pm to 4.00 pm</span>
                        </a>
                    </li>
                </ul>
                @if(@count($data->sub) > 0)
                    @if($kondisi == 0)
                    <a href="{{ route("other.dashboard", [base64_encode($data->id_kursus)]) }}" class="primary-btn text-uppercase">Start course</a>
                    @elseif($kondisi == 1)
                    <a href="{{ route("other.dashboard.child", [base64_encode($data->id_kursus), base64_encode($data->child->id_sub_kursus)]) }}" class="primary-btn text-uppercase">Start course</a>
                    @endif
                @else
                <a href="#" class="primary-btn text-uppercase">Masih Kosong</a>
                @endif
            </div>
        </div>
    </div>
</section>
@include('layouts.include.other.banner2')
@endsection
