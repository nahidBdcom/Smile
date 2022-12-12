<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
@foreach ($items as $item)
    <a class="dropdown-item " href="{{$item->link()}}">{{$item->title}}</a>
@endforeach
</div>
