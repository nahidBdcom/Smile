<ol class="dd-list">

@foreach ($items as $item)

    <li class="dd-item" data-id="{{ $item->id }}">
        <div class="pull-right item_actions">
            <div class="btn btn-sm btn-danger pull-right delete" data-id="{{ $item->id }}">
                <i class="voyager-trash"></i> {{ __('voyager::generic.delete') }}
            </div>
            <div class="btn btn-sm btn-primary pull-right edit"
                data-id="{{ $item->id }}"
                data-package_id="{{ $item->package_id }}"
                data-title="{{ $item->title }}"
                data-description="{{ $item->description }}"
                data-status="{{ $item->status }}"
            >
                <i class="voyager-edit"></i> {{ __('voyager::generic.edit') }}
            </div>
        </div>
        <div class="dd-handle">
            <span>{{ $item->title }}</span> <small class="url">({{ $item->status ? "Active" : "Inactive" }})</small>
        </div>
        @if(!$item->children->isEmpty())
            @include('voyager::packages.partial.admin', ['items' => $item->children])
        @endif
    </li>

@endforeach

</ol>
