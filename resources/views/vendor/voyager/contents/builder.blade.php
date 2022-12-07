@extends('voyager::master')

@section('page_title', __('voyager::generic.content_builder'))

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-list"></i>Content FAQ Builder ({{ $content->title }})
        <div class="btn btn-success add_item"><i class="voyager-plus"></i>New Content FAQ</div>
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <p class="panel-title" style="color:#777">Drag and drop the Content FAQs below to re-arrange them.</p>
                    </div>

                    <div class="panel-body" style="padding:30px;">
                        <div class="dd">
                            {!! $faqItems !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i>Are you sure you want to delete this Content FAQ?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.contents.item.destroy', ['content' => $content->id, 'id' => '__id']) }}"
                          id="delete_form"
                          method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="Yes, Delete This Content FAQ">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal modal-info fade" tabindex="-1" id="content_faq_modal" role="dialog">
        <div class=" modal-lg modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 id="m_hd_add" class="modal-title hidden"><i class="voyager-plus"></i> Create a New Content FAQ</h4>
                    <h4 id="m_hd_edit" class="modal-title hidden"><i class="voyager-edit"></i> Edit Content FAQ</h4>
                </div>
                <form action="" id="m_form" method="POST"
                      data-action-add="{{ route('voyager.contents.item.add', ['content' => $content->id]) }}"
                      data-action-update="{{ route('voyager.contents.item.update', ['content' => $content->id]) }}">

                    <input id="m_form_method" type="hidden" name="_method" value="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div>
                            <label for="title">Title of the Content FAQ</label>
                            <input type="text" class="form-control" id="m_title" name="title" placeholder="{{ __('voyager::generic.title') }}"><br>
                        </div>
                        <div id="m_description_div">
                            <label for="description">Description</label>
                            <textarea class="form-control richTextBox" name="description" id="m_description"></textarea>
                        </div>
                        <label for="status">status</label>
                        <select id="m_status" class="form-control" name="status">
                            <option value="0" selected="selected">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                        <input type="hidden" id="m_content_id" name="content_id" value="{{ $content->id }}">
                        <input type="hidden" name="id" id="m_id" value="">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success pull-right delete-confirm__" value="{{ __('voyager::generic.update') }}">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




@stop

@section('javascript')

    <script>
        $(document).ready(function () {
            @if ($isModelTranslatable)
                /**
                 * Multilingual setup for main page
                 */
                $('.side-body').multilingual({
                    "transInputs": '.dd-list input[data-i18n=true]'
                });

                /**
                 * Multilingual for Add/Edit Menu
                 */
                $('#content_faq_modal').multilingual({
                    "form":          'form',
                    "transInputs":   '#content_faq_modal input[data-i18n=true]',
                    "langSelectors": '.language-selector input',
                    "editing":       true
                });
            @endif


            $('.dd').nestable({
                expandBtnHTML: '',
                collapseBtnHTML: ''
            });


            /**
             * Set Variables
             */
            var $m_modal       = $('#content_faq_modal'),
                $m_hd_add      = $('#m_hd_add').hide().removeClass('hidden'),
                $m_hd_edit     = $('#m_hd_edit').hide().removeClass('hidden'),
                $m_form        = $('#m_form'),
                $m_form_method = $('#m_form_method'),
                $m_title       = $('#m_title'),
                $m_description = $('#m_description'),
                $m_status      = $('#m_status'),
                $m_content_id  = $('#m_content_id'),
                $m_id          = $('#m_id');

            /**
             * Add Menu
             */
            $('.add_item').click(function() {
                $m_form.trigger('reset');
                $m_form.find("input[type=submit]").val('{{ __('voyager::generic.add') }}');
                $m_modal.modal('show', {data: null});
            });

            /**
             * Edit Menu
             */
            $('.item_actions').on('click', '.edit', function (e) {
                $m_form.find("input[type=submit]").val('{{ __('voyager::generic.update') }}');
                $m_modal.modal('show', {data: $(e.currentTarget)});
            });

            /**
             * Menu Modal is Open
             */
            $m_modal.on('show.bs.modal', function(e, data) {
                var _adding      = e.relatedTarget.data ? false : true,
                    translatable = $m_modal.data('multilingual'),
                    $_str_i18n   = '';

                if (_adding) {
                    $m_form.attr('action', $m_form.data('action-add'));
                    $m_form_method.val('POST');
                    $m_hd_add.show();
                    $m_hd_edit.hide();
                    $m_status.val('0').change();
                    $m_description.val('');

                } else {
                    $m_form.attr('action', $m_form.data('action-update'));
                    $m_form_method.val('PUT');
                    $m_hd_add.hide();
                    $m_hd_edit.show();

                    var _src = e.relatedTarget.data, // the source
                        id   = _src.data('id');

                    $m_title.val(_src.data('title'));
                    tinymce.get("m_description").setContent(_src.data('description'));
                    $m_content_id.val(_src.data('content_id'));
                    $m_id.val(id);

                    if (_src.data('status') == "0") {
                        $m_status.val('0').change();
                    } else if (_src.data('status') == "1") {
                        $m_status.find("option[value='0']").removeAttr('selected');
                        $m_status.find("option[value='1']").attr('selected', 'selected');
                        $m_status.val('1');
                    }
                }

            });



            /**
             * Delete menu item
             */
            $('.item_actions').on('click', '.delete', function (e) {
                id = $(e.currentTarget).data('id');
                $('#delete_form')[0].action = '{{ route('voyager.contents.item.destroy', ['content' => $content->id, 'id' => '__id']) }}'.replace('__id', id);
                $('#delete_modal').modal('show');
            });


            /**
             * Reorder items
             */
            $('.dd').on('change', function (e) {
                $.post('{{ route('voyager.contents.order_item',['content' => $content->id]) }}', {
                    order: JSON.stringify($('.dd').nestable('serialize')),
                    _token: '{{ csrf_token() }}'
                }, function (data) {
                    toastr.success("Successfuly updated FAQs' order");
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var additionalConfig = {
                selector: 'textarea.richTextBox[name="description"]',
            }

            $.extend(additionalConfig, {"height":200,"min_height":200})

            tinymce.init(window.voyagerTinyMCE.getConfig(additionalConfig));
        });
    </script>

@stop
