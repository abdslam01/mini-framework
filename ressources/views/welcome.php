<h1>Welcome in the Home Page {{$name}}</h1>
<ul>
    @foreach($data as $d)
        <li>{{$d}}</li>
    @endforeach

    @if(1==2)
        <h2>equal</h2>
    @else
        <h2>not equal</h2>
    @endif

    <?php $i=10; ?>
    @while($i--)
        {{$i}}
    @endwhile
</ul>