@foreach ($items as $item)
    @php
        $dropdown = !$item->children->isEmpty() ? 'dropdown' : '';
        $link = !$item->children->isEmpty() ? '#' : $item->link();
    @endphp
    <li class="nav-item {{$dropdown}}">
        @if($link == '#')
            <a class="nav-link dropdown-toggle" href="{{$link}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{$item->title}} </a>
            @include('menus.smile_mobile_topmenu_bootstrap_second', ['items' => $item->children])
            {{--  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="standard-package.html">Standard</a>
                <a class="dropdown-item" href="ek-desh-ek-rate.html">Ek Desh Ek Rate</a>
            </div>  --}}
        @else
            <a class="nav-link" href="{{$link}}">{{$item->title}}</a>
        @endif
        <span class="cus-bor"></span>
    </li>
@endforeach
