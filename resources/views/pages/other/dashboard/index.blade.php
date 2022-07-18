@extends('layouts.othertempdash')

@section('content')
<section class="event-details-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 event-details-right">
               @include('pages.other.dashboard.include.menu')
            </div>
            <div class="col-lg-8 event-details-left">
                <div class="main-img">
                    <img class="img-fluid" src="http://www.languageonthemove.com/wp-content/uploads/2013/01/multiculturalism-without-multilingualism.jpg" alt="" style="width: 100%; height: 450px;">
                </div>
                <div class="details-content">
                    <a href="#">
                        <h4>{{ $data->judul_sub_kursus }}</h4>
                    </a>
                    <p>
                       {!! $data->deskripsi !!}
                        
                    </p>
                   
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection