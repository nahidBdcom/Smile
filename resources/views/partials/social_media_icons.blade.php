@foreach ($socialMedias as $socialMedia)
<a href="{{ $socialMedia->url }}">
    <span class="fa-stack fa-lg">
       <i class="fa fa-square fa-stack-2x fa-3x"></i>
       <i class="fa {{$socialMedia->icon_class}} fa-stack-1x fa-inverse"></i>
    </span>
 </a>    
@endforeach