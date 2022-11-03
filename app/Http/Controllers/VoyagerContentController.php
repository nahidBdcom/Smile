<?php

namespace App\Http\Controllers;;
//namespace TCG\Voyager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Container\Container;
use TCG\Voyager\Facades\Voyager;

use App\Models\Content;
use App\Models\ContentFaq;

class VoyagerContentController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function builder($id)
    {
        
        //$package = Container::getInstance()->make(Package::class, []);
        $content = Content::findOrFail($id);
        
        $this->authorize('edit', $content);

        $isModelTranslatable = is_bread_translatable('ContentFaq');

        $newContent= new Content;
        $faqItems= $newContent->faqDisplay($id,'admin',[]);

        return Voyager::view('voyager::contents.builder', compact('content', 'faqItems', 'isModelTranslatable'));
    }

    public function delete_content($content, $id)
    {
                
        $item = ContentFaq::findOrFail($id);

        $contentData= Content::findOrFail($content);
        //echo "<pre>";
        //print_r($package);
        //die();
        $this->authorize('delete', $contentData);

        //$item->deleteAttributeTranslation('title');

        $item->destroy($id);

        return redirect()
            ->route('voyager.contents.builder', [$content])
            ->with([
                'message'    => __('voyager::content_builder.successfully_deleted'),
                'alert-type' => 'success',
            ]);
    }

    public function add_item(Request $request)
    {
        $content = new Content;

        $this->authorize('add', $content);

        $data = $this->prepareParameters(
            $request->all()
        );

        unset($data['id']);
        unset($data['_method']);
        unset($data['_token']);
        //$data['order'] = PackageFaq::highestOrderThisModel();

        $contentFaqItem = ContentFaq::create($data);

        // Save package translations

        return redirect()
            ->route('voyager.contents.builder', [$data['content_id']])
            ->with([
                'message'    => __('Content FAQ added SUCCESSFULY'),
                'alert-type' => 'success',
            ]);
    }

    public function update_item(Request $request)
    {
        $id = $request->input('id');
        $data = $this->prepareParameters(
            $request->except(['id','_method','_token'])
        );
//        $data["id"]=$id;
        
        $contentFaqItem = ContentFaq::findOrFail($id);

        $this->authorize('edit', $contentFaqItem->content);

        foreach( $data as $key => $value )
        {
            $contentFaqItem->$key = $value;
        }

        $contentFaqItem->save();

        return redirect()
            ->route('voyager.contents.builder', [$contentFaqItem->content_id])
            ->with([
                'message'    => 'The FAQ is updated',
                'alert-type' => 'success',
            ]);
    }

    public function order_item(Request $request)
    {
        $contentFaqOrder = json_decode($request->input('order'));

        $this->orderFaq($contentFaqOrder, null);
    }

    private function orderFaq(array $faqItems, $parentId)
    {
        foreach ($faqItems as $index => $faqItem) {
            $item = ContentFaq::findOrFail($faqItem->id);
            $item->order = $index + 1;
            $item->parent_id = $parentId;
            $item->save();

            if (isset($faqItem->children)) {
                $this->orderFaq($faqItem->children, $item->id);
            }
        }
    }

    protected function prepareParameters($parameters)
    {
        /*
        switch (Arr::get($parameters, 'type')) {
            case 'route':
                $parameters['url'] = null;
                break;
            default:
                $parameters['route'] = null;
                $parameters['parameters'] = '';
                break;
        }

        if (isset($parameters['type'])) {
            unset($parameters['type']);
        }
        */
        return $parameters;
    }

    /**
     * Prepare menu translations.
     *
     * @param array $data menu data
     *
     * @return JSON translated item
     */
    protected function prepareContentTranslations(&$data)
    {
        $trans = json_decode($data['title_i18n'], true);

        // Set field value with the default locale
        $data['title'] = $trans[config('voyager.multilingual.default', 'en')];

        unset($data['title_i18n']);     // Remove hidden input holding translations
        unset($data['i18n_selector']);  // Remove language selector input radio

        return $trans;
    }
}
