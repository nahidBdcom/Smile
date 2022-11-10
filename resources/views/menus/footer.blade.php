@foreach ($items as $item)
<div class="col-lg-3 foot-g">
    <ul>
       <li>
        <a href="{{ url($item->link()) }}">{{ $item->title }}</a>
       </li>

       
    </ul>
 </div>
@endforeach