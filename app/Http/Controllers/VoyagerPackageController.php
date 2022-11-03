<?php

namespace App\Http\Controllers;;
//namespace TCG\Voyager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Container\Container;
use TCG\Voyager\Facades\Voyager;

use App\Models\Package;
use App\Models\PackageFaq;

class VoyagerPackageController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function builder($id)
    {
        
        //$package = Container::getInstance()->make(Package::class, []);
        $package = Package::findOrFail($id);
        
        $this->authorize('edit', $package);

        $isModelTranslatable = is_bread_translatable('PackageFaq');

        $newPackage= new Package;
        $faqItems= $newPackage->faqDisplay($id,'admin',[]);

        return Voyager::view('voyager::packages.builder', compact('package', 'faqItems', 'isModelTranslatable'));
    }

    public function delete_package($package, $id)
    {
                
        $item = PackageFaq::findOrFail($id);

        $packageData= Package::findOrFail($package);
        //echo "<pre>";
        //print_r($package);
        //die();
        $this->authorize('delete', $packageData);

        //$item->deleteAttributeTranslation('title');

        $item->destroy($id);

        return redirect()
            ->route('voyager.packages.builder', [$package])
            ->with([
                'message'    => __('voyager::package_builder.successfully_deleted'),
                'alert-type' => 'success',
            ]);
    }

    public function add_item(Request $request)
    {
        $package = new Package;

        $this->authorize('add', $package);

        $data = $this->prepareParameters(
            $request->all()
        );

        unset($data['id']);
        unset($data['_method']);
        unset($data['_token']);
        //$data['order'] = PackageFaq::highestOrderThisModel();

        $packageFaqItem = PackageFaq::create($data);

        // Save package translations

        return redirect()
            ->route('voyager.packages.builder', [$data['package_id']])
            ->with([
                'message'    => __('Package FAQ added SUCCESSFULY'),
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
        
        $packageFaqItem = PackageFaq::findOrFail($id);

        $this->authorize('edit', $packageFaqItem->package);

        foreach( $data as $key => $value )
        {
            $packageFaqItem->$key = $value;
        }

        $packageFaqItem->save();

        return redirect()
            ->route('voyager.packages.builder', [$packageFaqItem->package_id])
            ->with([
                'message'    => 'The FAQ is updated',
                'alert-type' => 'success',
            ]);
    }

    public function order_item(Request $request)
    {
        $packageFaqOrder = json_decode($request->input('order'));

        $this->orderFaq($packageFaqOrder, null);
    }

    private function orderFaq(array $faqItems, $parentId)
    {
        foreach ($faqItems as $index => $faqItem) {
            $item = PackageFaq::findOrFail($faqItem->id);
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
    protected function preparePackageTranslations(&$data)
    {
        $trans = json_decode($data['title_i18n'], true);

        // Set field value with the default locale
        $data['title'] = $trans[config('voyager.multilingual.default', 'en')];

        unset($data['title_i18n']);     // Remove hidden input holding translations
        unset($data['i18n_selector']);  // Remove language selector input radio

        return $trans;
    }
}
