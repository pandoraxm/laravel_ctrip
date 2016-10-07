    @foreach( $users as $k )
    <dl class="dest_detail">
        <dt>
            <a href="/home/class/{{ $k->id }}">{{ $k -> name }}</a>
        </dt>
        <dd>
        @foreach( $users_er as $w )
        @if($w->pid == $k->id)
            <a href="/home/class/{{ $w->id }}">{{ $w->name }}</a>
        @endif
        @endforeach
        </dd>
    </dl>
    @endforeach