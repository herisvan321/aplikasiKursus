@extends('layouts.othertempdash')

@section('content')
    <section class="event-details-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 event-details-right">
                    @include('pages.other.dashboard.include.menu')
                </div>
                <div class="col-lg-8 event-details-left">
                    @if ($skondisi == 0)
                        Text
                    @elseif($skondisi == 1)
                        @foreach($dataSubMenu as $key => $dat)
                        <a href="{{ route("other.dashboard.page.tema", [$idkursus, $idsubkursus, $idsubmenukursus, base64_encode($dat->id_data_tema)]) }}" style="text-decoration: none; color : #000">
                            <div class="details-content">
                                <section class="popular-courses-area courses-page">
                                    <div class="container">
                                        <div class="card">
                                            <div class="container ">
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p> Tema {{ $key + 1 }} <a href="#" class="genric-btn primary-border small circle">Overdue</a> </p>
                                                        <h5>{{ $dat->judul_data_tema }} {{ $dat->id_data_tema }}</h5>
        
                                                    </div>
                                                    {{-- <div class="col-md-4">
                                                        <p><b>Estimated Time: 1h</b></p>
                                                    </div> --}}
                                                    {{-- <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Option</p>
                                                                <ul class="unordered-list">
                                                                    <li><a href="videos.html">Videos</a></li>
                                                                    <li><a href="readings.html">Readings</a></li>
                                                                    <li><a href="#">Practice Exercises</a>
                                                                        <!-- <ul>
                                                                            <li>Addiction When Gambling Becomes
                                                                                <ul>
                                                                                    <li>Protective Preventative Maintenance</li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul> -->
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>Peer-graded Assignment</p>
                                                                <ul class="unordered-list">
                                                                    <li class="justify-content-between d-flex"><span>Memo Writing <br> <span style="color:#dfdfdf">Applying Codes</span></span><span>45 Min</span></li>
                                                                    <li class="justify-content-between d-flex"><span>Memo Writing <br> <span style="color:#dfdfdf">Applying Codes</span></span><span>45 Min</span></li>
                                                                    <li class="justify-content-between d-flex"><span>Memo Writing <br> <span style="color:#dfdfdf">Applying Codes</span></span><span>45 Min</span></li>
                                                                </ul>
                                                            </div>
        
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </a>
                          <br> 
                        @endforeach
                    @elseif($skondisi == 2)
                        Forum
                    @elseif($skondisi == 3)
                        Message
                    @elseif($skondisi == 4)
                        Ratings
                    @elseif($skondisi == 5)
                        File
                    @elseif($skondisi == 6)
                        Sub
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
