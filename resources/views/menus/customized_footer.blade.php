
@foreach ($items as $item)
   <li>
    <a href="{{ url($item->link()) }}">{{ $item->title }}</a>
   </li>
@endforeach




