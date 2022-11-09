@php
    if(!isset($innerLoop)){
        $menuLevel = 1;
    }else{
        $menuLevel = $menuLevel + 1;
    }
@endphp

@if(!isset($innerLoop))
<ul>
@else
<ul class="submenu ">
@endif

@foreach ($items as $item)

    @php
        $originalItem = $item;
        if(!isset($innerLoop)){
            $listAncorClass ="nav-link1 ";
        }else{
            $listAncorClass = "dropdown-item ";
        }
        $listItemClass = " ";
        $linkAttributes =  null;
        $styles = null;
        $icon = null;
        $caret = null;
        // Background Color or Color
        if (isset($options->color) && $options->color == true) {
            $styles = 'color:'.$item->color;
        }
        if (isset($options->background) && $options->background == true) {
            $styles = 'background-color:'.$item->color;
        }
        // With Children Attributes
        if(!$originalItem->children->isEmpty()) {
            if($menuLevel > 1){
                $listItemClass .= 'dropdown dropend ';
            }else{
                $listItemClass .= 'dropdown ';
                $caret = '<span class="caret"></span>';
            }
            $listAncorClass .= "dropdown-toggle ";
            $linkAttributes =  'data-bs-toggle="dropdown" data-bs-auto-close="outside"';
            $caret = '<span class="caret"></span>';
            if(url($item->link()) == url()->current()){
                $listItemClass .= 'active';
            }
        }elseif(url($item->link()) == url()->current()){
            $listItemClass .= ' active';
        }
        // Set Icon
        if(isset($options->icon) && $options->icon == true){
            $icon = '<i class="' . $item->icon_class . '"></i>';
        }
    @endphp

    <li>
        <a href="{{ url($item->link()) }}" {!! $linkAttributes ?? '' !!}>
            {{--  {!! $icon !!}  --}}
            {{ $item->title }}
            {{--  {!! $caret !!}  --}}
        </a>
        @if(!$originalItem->children->isEmpty())
        @include('voyager::menus.smile_topmenu_bootstrap', ['items' => $originalItem->children, 'options' => $options, 'innerLoop' => true, 'menuLevel' => $menuLevel])
        @endif
    </li>
@endforeach

</ul>