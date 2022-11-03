@php
    if(!isset($innerLoop)){
        $menuLevel = 1; 
    }else{
        $menuLevel = $menuLevel + 1;
    }   
@endphp

@if(!isset($innerLoop))
<ul class="navbar-nav ml-auto mb-2 mb-lg-0 ">
@else
<ul class="dropdown-menu dropdown-menu-smile-dark shadow ">
@endif

@foreach ($items as $item)

    @php

        $originalItem = $item;

        if(!isset($innerLoop)){
            
            $listAncorClass ="nav-link ";
        }else{
            
            $listAncorClass = "dropdown-item ";
        }
        $listItemClass = "nav-item ";
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
                $listItemClass .= 'dropdown toplevel';
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

    <li class="{{ $listItemClass }}">
        <a class="{{ $listAncorClass }}" href="{{ url($item->link()) }}"  {!! $linkAttributes ?? '' !!}>
            {!! $icon !!}
            <span>{{ $item->title }}</span>
            {!! $caret !!}
        </a>
        @if(!$originalItem->children->isEmpty())
        @include('voyager::menus.smile_topmenu_bootstrap', ['items' => $originalItem->children, 'options' => $options, 'innerLoop' => true, 'menuLevel' => $menuLevel])
        @endif
    </li>
@endforeach

</ul>

@if(setting('site.show_con_link_main_menu'))
<div class="d-flex justify-content-center align-items-center main_menu_con_block">
    <a class="d-flex justify-content-center align-items-center" href="{{url(setting('site.show_con_link_mm_link'))}}">{{setting('site.show_con_link_mm_text')}}</a>
</div>
@endif
