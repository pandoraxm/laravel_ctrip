@foreach( $list_lbt as $v=>$l )
<?php $v = 1 ?>
@for ( $i = 0; $i < $v; $i++ )
    <a href="javascript:;"></a>
@endfor
@endforeach
</div>
<div class="banner_pic" id="banner_pic">
@foreach( $list_lbt as $v=>$l )
<a href="">
    <img src="picture/{{ $l -> pname }}" style="width:1600px;heigth:560px;">
</a>
@endforeach