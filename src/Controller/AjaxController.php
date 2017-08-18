<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ProductOptions Controller
 *
 * @property \App\Model\Table\ProductOptionsTable $ProductOptions
 *
 * @method \App\Model\Entity\ProductOption[] paginate($object = null, array $settings = [])
 */
class AjaxController extends AppController
{
    public function beforeFilter(Event $event)
    {
         $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($a=null, $b=null)
    {
        $this->Layout = false;

        $jsonData = $this->request->input('json_decode');
        $ProductOptions = $jsonData->product_options;
        $MaterialTypes = $jsonData->material_types;
        $ProductTypes = $jsonData->product_types;
        //$Series = $jsonData->series;
       
        $this->Options = $this->loadModel('Options');
        $this->MaterialTypes = $this->loadModel('MaterialTypes');
        $this->ProductTypes = $this->loadModel('ProductTypes');
        $this->Products = $this->loadModel('Products');
        $this->Series = $this->loadModel('Series');

        $option_ids = implode(',', array_map(function($x) { return $x->value; }, $ProductOptions));
        $material_type_ids = implode(',', array_map(function($x) { return $x; }, $MaterialTypes));
        $product_type_ids = implode(',', array_map(function($x) { return $x; }, $ProductTypes));
        $series_ids = []; //implode(',', array_map(function($x) { return $x->value; }, $Series));
        // profile?

        $products = $this->Products->find('all');
        
        if( !empty($option_ids) ) {
            $products = $products->matching('ProductOptions', function ($q)  use ($option_ids) {
                return $q->where(["option_id IN ($option_ids)"]); 
            });
        }

        if( !empty($material_type_ids) ) {
            $products = $products->matching('MaterialTypes', function ($q)  use ($material_type_ids) {
                return $q->where(["material_type_id IN ($material_type_ids)"]); 
            });
        }

        if( !empty($product_type_ids) ) {
            $products = $products->matching('ProductTypes', function ($q)  use ($product_type_ids) {
                return $q->where(["product_type_id IN ($product_type_ids)"]); 
            });
        }

        if( !empty($series_ids) ) {
            print("getting series");
            $products = $products->matching('Series', function ($q)  use ($series_ids) {
                return $q->where(["id IN ($series_ids)"]); 
            });
        }

        $products = $products
            ->contain(['ProductTypes','MaterialTypes','Series'])
            ->group(['Products.id'])
            ->toList();

        //$this->set('errors', $products->errors());
        $this->set('_jsonOptions', JSON_FORCE_OBJECT);
        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }
}
