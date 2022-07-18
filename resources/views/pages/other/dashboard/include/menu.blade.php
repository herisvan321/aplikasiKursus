<div class="single-event-details" style="background: #f1f1f1fd">
    <h4>Dashboard </h4><br>
    <div class="accordion-left">

        <dl class="accordion">
            @foreach (menuHome::get_menu(base64_encode($data->id_sub_kursus)) as $key => $dat)
                <dt>
                    <a href="#" class="{{ $key == 0 ? 'active' : '' }}">{{ $dat->judul_menu_kursus }}</a>
                </dt>
                @if (@count($dat->sub) > 0)
                    <dd style="display: block;">
                        <ul class="mt-12">
                            @foreach($dat->sub as $key1 => $datt)
                            <li class="justify-content-between d-flex">
                                <a href="{{ route("other.dashboard.page", [$idkursus, $idsubkursus, base64_encode($datt->id_sub_menu_kursus)]) }}"><span>{{ $datt->judul_sub_menu_kursus }}</span></a>
                            </li>
                            @endforeach
                        </ul>
                    </dd>
                @endif
            @endforeach
        </dl>

    </div>

</div>
