<div class="single-event-details" style="background: #f1f1f1fd">
    <h4>Dashboard </h4><br>
    <div class="accordion-left">

        <dl class="accordion">
            @foreach (menuHome::get_menu_tema(base64_encode($diddatatema)) as $key => $dat)
                <dt>
                    <a href="#" class="{{ $key == 0 ? 'active' : '' }}">{{ $dat->judul_menu_tema }}</a>
                </dt>
                @if (@count($dat->sub) > 0)
                    <dd style="display: block;">
                        <ul class="mt-12">
                            @foreach($dat->sub as $key1 => $datt)
                            @php
                            $step = DB::table('step_tema')->where('id_peserta', auth()->guard('peserta')->user()->id_peserta)->where('id_sub_menu_tema', $datt->id_sub_menu_tema)->count();
                  
                            @endphp
                            <li class="justify-content-between d-flex">
                              @if($step > 0)
                                <a href="{{ route("other.dashboard.page.tema.ex", [$idkursus, $idsubkursus, $idsubmenukursus, base64_encode($diddatatema), base64_encode($datt->id_sub_menu_tema)]) }}" style="text-decoration: none; color : #000"><span>{{ $datt->judul_sub_menu_tema }} <br> <b>time:</b>{{ $datt->menit }} menit</span></a>
                              @else
                              <a href="#" style="text-decoration: none; color : #dfdfdf"><span>{{ $datt->judul_sub_menu_tema }} <br> <b>time:</b>{{ $datt->menit }} menit</span></a>
                              @endif
                            </li>
                            @endforeach
                        </ul>
                    </dd>
                @endif
            @endforeach
        </dl>

    </div>

</div>
