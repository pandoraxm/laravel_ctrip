@foreach ($list as $p)
@if($p ->class == 1)
<li>
    <div class="pic">
        <img src="picture/{{ $p -> pic_name }}" alt="{{ $p -> name }}" style="width:295px;height:355px;">
        <div class="intro">
            <div class="details">
                <p class="main_det">{{ $p -> name }}</p>
                <p class="sub_det">{{ $p -> name_er }}</p>
            </div>
        </div>
    </div>
    <a class="link" href="">
        <b></b>
        <span>
            <strong>{{ $p -> title }}<br></strong>
            {{ $p -> title_er }}
            <br>
            {{ $p -> title_san }}
            <br>
            {{ $p -> title_si }}
        </span>
    </a>
</li>
@endif
@endforeach