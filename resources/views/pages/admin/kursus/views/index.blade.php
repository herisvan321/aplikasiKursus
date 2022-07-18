@extends('layouts.template')

@section('content')
    @if ($skondisi == 0)
        @include('pages.admin.kursus.include.text')
    @elseif($skondisi == 1)
        @include('pages.admin.kursus.include.tema')
    @elseif($skondisi == 2)
        @include('pages.admin.kursus.include.forum')
    @elseif($skondisi == 3)
        @include('pages.admin.kursus.include.message')
    @elseif($skondisi == 4)
        @include('pages.admin.kursus.include.rating')
    @elseif($skondisi == 5)
        @include('pages.admin.kursus.include.file')
    @elseif($skondisi == 6)
        @include('pages.admin.kursus.include.sub')
    @endif
@endsection
