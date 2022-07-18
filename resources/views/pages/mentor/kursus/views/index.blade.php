@extends('layouts.othertempdash')

@section('content')
    @if ($skondisi == 0)
        @include('pages.mentor.kursus.include.text')
    @elseif($skondisi == 1)
        @if($kondisis == 0)
          @include('pages.mentor.kursus.include.tema')
        @elseif($kondisis == 1)
           @include('pages.mentor.kursus.include.editTema')
        @endif
    @elseif($skondisi == 2)
        @include('pages.mentor.kursus.include.forum')
    @elseif($skondisi == 3)
        @include('pages.mentor.kursus.include.message')
    @elseif($skondisi == 4)
        @include('pages.mentor.kursus.include.rating')
    @elseif($skondisi == 5)
        @include('pages.mentor.kursus.include.file')
    @elseif($skondisi == 6)
        @include('pages.mentor.kursus.include.sub')
    @endif
@endsection
