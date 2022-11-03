@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural'))

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-list-add"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}
        @can('add',app($dataType->model_name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success">
                <i class="voyager-plus"></i> {{ __('voyager::generic.add_new') }}
            </a>
        @endcan
    </h1>
@stop

@section('content')
    

    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                            <tr>
                                @foreach($dataType->browseRows as $row)
                                <th>{{ $row->display_name }}</th>
                                @endforeach
                                <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($dataTypeContent as $data)
                                <tr>
                                    @foreach($dataType->browseRows as $row)
                                    <td>
                                        @if (isset($row->details->view))
                                            @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $data->{$row->field}, 'action' => 'browse', 'view' => 'browse', 'options' => $row->details])
                                        @elseif($row->type == 'image')
                                            <img src="@if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:100px">
                                        @elseif($row->type == 'relationship')
                                            @include('voyager::formfields.relationship', ['view' => 'browse','options' => $row->details])
                                        @elseif($row->type == 'select_multiple')
                                            @if(property_exists($row->details, 'relationship'))

                                                @foreach($data->{$row->field} as $item)
                                                    {{ $item->{$row->field} }}
                                                @endforeach

                                            @elseif(property_exists($row->details, 'options'))
                                                @if (!empty(json_decode($data->{$row->field})))
                                                    @foreach(json_decode($data->{$row->field}) as $item)
                                                        @if (@$row->details->options->{$item})
                                                            {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    {{ __('voyager::generic.none') }}
                                                @endif
                                            @endif

                                            @elseif($row->type == 'multiple_checkbox' && property_exists($row->details, 'options'))
                                                @if (@count(json_decode($data->{$row->field})) > 0)
                                                    @foreach(json_decode($data->{$row->field}) as $item)
                                                        @if (@$row->details->options->{$item})
                                                            {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    {{ __('voyager::generic.none') }}
                                                @endif

                                        @elseif(($row->type == 'select_dropdown' || $row->type == 'radio_btn') && property_exists($row->details, 'options'))

                                            {!! $row->details->options->{$data->{$row->field}} ?? '' !!}

                                        @elseif($row->type == 'date' || $row->type == 'timestamp')
                                            @if ( property_exists($row->details, 'format') && !is_null($data->{$row->field}) )
                                                {{ \Carbon\Carbon::parse($data->{$row->field})->formatLocalized($row->details->format) }}
                                            @else
                                                {{ $data->{$row->field} }}
                                            @endif
                                        @elseif($row->type == 'checkbox')
                                            @if(property_exists($row->details, 'on') && property_exists($row->details, 'off'))
                                                @if($data->{$row->field})
                                                    <span class="label label-info">{{ $row->details->on }}</span>
                                                @else
                                                    <span class="label label-primary">{{ $row->details->off }}</span>
                                                @endif
                                            @else
                                            {{ $data->{$row->field} }}
                                            @endif
                                        @elseif($row->type == 'color')
                                            <span class="badge badge-lg" style="background-color: {{ $data->{$row->field} }}">{{ $data->{$row->field} }}</span>
                                        @elseif($row->type == 'text')
                                            @include('voyager::multilingual.input-hidden-bread-browse')
                                            <div>{{ mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</div>
                                        @elseif($row->type == 'text_area')
                                            @include('voyager::multilingual.input-hidden-bread-browse')
                                            <div>{{ mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</div>
                                        @elseif($row->type == 'file' && !empty($data->{$row->field}) )
                                            @include('voyager::multilingual.input-hidden-bread-browse')
                                            @if(json_decode($data->{$row->field}) !== null)
                                                @foreach(json_decode($data->{$row->field}) as $file)
                                                    <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}" target="_blank">
                                                        {{ $file->original_name ?: '' }}
                                                    </a>
                                                    <br/>
                                                @endforeach
                                            @else
                                                <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($data->{$row->field}) }}" target="_blank">
                                                    Download
                                                </a>
                                            @endif
                                        @elseif($row->type == 'rich_text_box')
                                            @include('voyager::multilingual.input-hidden-bread-browse')
                                            <div>{{ mb_strlen( strip_tags($data->{$row->field}, '<b><i><u>') ) > 200 ? mb_substr(strip_tags($data->{$row->field}, '<b><i><u>'), 0, 200) . ' ...' : strip_tags($data->{$row->field}, '<b><i><u>') }}</div>
                                        @elseif($row->type == 'coordinates')
                                            @include('voyager::partials.coordinates-static-image')
                                        @elseif($row->type == 'multiple_images')
                                            @php $images = json_decode($data->{$row->field}); @endphp
                                            @if($images)
                                                @php $images = array_slice($images, 0, 3); @endphp
                                                @foreach($images as $image)
                                                    <img src="@if( !filter_var($image, FILTER_VALIDATE_URL)){{ Voyager::image( $image ) }}@else{{ $image }}@endif" style="width:50px">
                                                @endforeach
                                            @endif
                                        @elseif($row->type == 'media_picker')
                                            @php
                                                if (is_array($data->{$row->field})) {
                                                    $files = $data->{$row->field};
                                                } else {
                                                    $files = json_decode($data->{$row->field});
                                                }
                                            @endphp
                                            @if ($files)
                                                @if (property_exists($row->details, 'show_as_images') && $row->details->show_as_images)
                                                    @foreach (array_slice($files, 0, 3) as $file)
                                                    <img src="@if( !filter_var($file, FILTER_VALIDATE_URL)){{ Voyager::image( $file ) }}@else{{ $file }}@endif" style="width:50px">
                                                    @endforeach
                                                @else
                                                    <ul>
                                                    @foreach (array_slice($files, 0, 3) as $file)
                                                        <li>{{ $file }}</li>
                                                    @endforeach
                                                    </ul>
                                                @endif
                                                @if (count($files) > 3)
                                                    {{ __('voyager::media.files_more', ['count' => (count($files) - 3)]) }}
                                                @endif
                                            @elseif (is_array($files) && count($files) == 0)
                                                {{ trans_choice('voyager::media.files', 0) }}
                                            @elseif ($data->{$row->field} != '')
                                                @if (property_exists($row->details, 'show_as_images') && $row->details->show_as_images)
                                                    <img src="@if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:50px">
                                                @else
                                                    {{ $data->{$row->field} }}
                                                @endif
                                            @else
                                                {{ trans_choice('voyager::media.files', 0) }}
                                            @endif
                                        @else
                                            @include('voyager::multilingual.input-hidden-bread-browse')
                                            <span>{{ $data->{$row->field} }}</span>
                                        @endif
                                    </td>
                                    @endforeach
                                    <td class="no-sort no-click bread-actions">
                                        @can('delete', $data)
                                            <div class="btn btn-sm btn-danger pull-right delete" data-id="{{ $data->{$data->getKeyName()} }}">
                                                <i class="voyager-trash"></i> {{ __('voyager::generic.delete') }}
                                            </div>
                                        @endcan
                                        @can('edit', $data)
                                            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $data->{$data->getKeyName()}) }}" class="btn btn-sm btn-primary pull-right edit">
                                                <i class="voyager-edit"></i> {{ __('voyager::generic.edit') }}
                                            </a>
                                        @endcan
                                        @can('edit', $data)
                                            <a href="{{ route('voyager.'.$dataType->slug.'.builder', $data->{$data->getKeyName()}) }}" class="btn btn-sm btn-success pull-right">
                                                <i class="voyager-list"></i> FAQs
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ $dataType->getTranslatedAttribute('display_name_singular') }}?
                    </h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_this_confirm') }} {{ $dataType->getTranslatedAttribute('display_name_singular') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <!-- DataTables -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "order": [],
                "language": {!! json_encode(__('voyager::datatable'), true) !!},
                "columnDefs": [{"targets": -1, "searchable":  false, "orderable": false}]
                @if(config('dashboard.data_tables.responsive')), responsive: true @endif
            });
        });

        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', ['id' => '__menu']) }}'.replace('__menu', $(this).data('id'));

            $('#delete_modal').modal('show');
        });
    </script>
@stop
