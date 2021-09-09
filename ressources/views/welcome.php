<?php
use function Abdslam01\MiniFrameworkCore\Helpers\session;
?>

<h1>Welcome in the Home Page {{$name}}</h1>
<ul>
    @foreach($data as $d)
        <li>{{$d}}</li>
    @endforeach

    @if(1>2)
        <h2>1>2</h2>
    @elseif(1< 2)
        <h2>1<2</h2>
    @else
        <h2>1==2</h2>
    @endif

    <?php $i=10; ?>
    @while($i--)
        {{$i}}
    @endwhile
</ul>
<h2>{{"<em>em text</em>"}}</h2>
<h2>{!!"<em>not em text</em>"!!}</h2>

<form method=post action="{{route('index')}}">
    {{$_SERVER['REQUEST_METHOD']}}
    <?php session()->setFlash("success", "hello from session"); ?>
    <pre><?php print_r($_SESSION);?>
    <button name="btn" value="btn">click here</button>
</form>