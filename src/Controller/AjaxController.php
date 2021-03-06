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
        $this->ProductOptions = $this->loadModel('ProductOptions');
        $this->Products = $this->loadModel('Products');
        $this->Series = $this->loadModel('Series');

        $option_ids = implode(',', array_map(function($x) { return $x->value; }, $ProductOptions));
        $material_type_ids = implode(',', array_map(function($x) { return $x; }, $MaterialTypes));
        $product_type_ids = implode(',', array_map(function($x) { return $x; }, $ProductTypes));
        $series_ids = []; //implode(',', array_map(function($x) { return $x->value; }, $Series));
        // profile?
        
        $products = $this->Products->find('all');

        if( !empty($material_type_ids) ) {
            $products = $products->where(["material_type_id IN ($material_type_ids)"]); 
        }

        if( !empty($product_type_ids) ) {
            $products = $products->Where(["product_type_id IN ($product_type_ids)"]); 
        }
 
        if( !empty($series_ids) ) {
            $products = $products->where(["id IN ($series _ids)"]); 
        }

        $products = $products->contain(['ProductOptions','ProductTypes','MaterialTypes','Series'])
            ->group(['Products.id'])
            ->toList();
        
        if( !empty($option_ids) ) {
            $product_ids = implode(',', array_map(function($x) { return $x->id; }, $products));
            $products = [];

            if(empty($product_ids)) {
                $productOptions = $this->ProductOptions->find('all')->Where(["option_id IN ($option_ids)"])->contain(['products'])->toArray();
            }
            else {
                $productOptions = $this->ProductOptions->find('all')->Where(["option_id IN ($option_ids) and product_id in ($product_ids)"])->contain(['products'])->toArray();
            }
            
            // Build new return array.
            foreach($productOptions as $po) {
                array_push($products, $po->Products);
            }
        }  



        //$this->set('errors', $products->errors());
        $this->set('_jsonOptions', JSON_FORCE_OBJECT);
        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }
}
