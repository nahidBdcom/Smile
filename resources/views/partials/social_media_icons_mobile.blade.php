@foreach ($socialMedias as $socialMedia)
<a href="{{ $socialMedia->url }}" class="fa {{$socialMedia->icon_class}}"> </a>    
@endforeach