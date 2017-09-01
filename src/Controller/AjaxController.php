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
        //$this->autoRender = false;

        $jsonData = $this->request->input('json_decode');
        if(!empty($jsonData)) {
            $ProductOptions = $jsonData->product_options;
            $MaterialTypes = $jsonData->material_types;
            $ProductTypes = $jsonData->product_types;
            $Series = $jsonData->series;
        
            $this->Options = $this->loadModel('Options');
            $this->MaterialTypes = $this->loadModel('MaterialTypes');
            $this->ProductTypes = $this->loadModel('ProductTypes');
            $this->ProductOptions = $this->loadModel('ProductOptions');
            $this->Products = $this->loadModel('Products');
            $this->Series = $this->loadModel('Series');

            $option_ids = implode(',', array_map(function($x) { return $x->value; }, $ProductOptions));
            $material_type_ids = implode(',', array_map(function($x) { return $x; }, $MaterialTypes));
            $product_type_ids = implode(',', array_map(function($x) { return $x; }, $ProductTypes));
            $series_ids = implode(',', array_map(function($x) { return $x; }, $Series));
            // profile?
            
            $products = $this->Products->find('all');

            if( !empty($material_type_ids) ) {
                $products = $products->where(["material_type_id IN ($material_type_ids)"]); 
            }

            if( !empty($product_type_ids) ) {
                $products = $products->Where(["product_type_id IN ($product_type_ids)"]); 
            }
    
            if( !empty($series_ids) ) {
                $products = $products->where(["series_id IN ($series_ids)"]); 
            }

            $products = $products->contain(['ProductOptions','ProductTypes','MaterialTypes','Series'])
                ->group(['Products.id'])
                ->toArray();

            if( !empty($option_ids) ) {
                $product_ids = implode(',', array_map(function($x) { return $x->id; }, $products));
                $productArray = [];

                // TODO: This needs to attach Product Types, MaterialTypes, and Series
                if(empty($product_ids)) {
                    $productOptions = $this->ProductOptions->find('all')->Where(["option_id IN ($option_ids)"])->contain(['products'])->toList();
                }
                else {
                    $productOptions = $this->ProductOptions->find('all')->Where(["option_id IN ($option_ids) and product_id in ($product_ids)"])->contain(['products'])->toList();
                }
                
                // Build new return array.
                foreach($productOptions as $po) {
                    array_push($productArray, $po->Products);
                }

                // Reattach the products and refind.
                $product_ids = implode(',', array_map(function($x) { return $x['id']; }, $productArray));
                $products = $this->Products->find('all')->contain(['ProductOptions','ProductTypes','MaterialTypes','Series'])
                ->where("Products.id in ($product_ids)")
                ->group(['Products.id'])
                ->toArray();
            }  

            //$this->set('errors', $products->errors());
            $this->set('_jsonOptions', JSON_FORCE_OBJECT);
            $this->set(compact('products'));
            $this->set('_serialize', ['products']);
        }
        else {

            $this->Layout = false;
            $this->autoRender = false;
        }
    }

    public function download() {
        $this->Layout = false;
        $this->autoRender = false;
        
        $this->Products = $this->loadModel('Products');

        $product_id_query  = $this->request->query('product_ids');
        $product_ids = explode(',', $product_id_query);
        $product_id_str = str_replace(',', '_', $product_id_query);
        $destination = "/tmp/" . time() . ".zip";

        foreach($product_ids as $pid) {
            $product = $this->Products->get($pid);
            if(file_exists('/var/sites/details.solarinnovations.test/webroot/files/pdf/'. $product->name .'.pdf')) exec('zip -D -j -r '. $destination .' "/var/sites/details.solarinnovations.test/webroot/files/pdf/'. $product->name .'.pdf" -x "*.cache"');
            if(file_exists('/var/sites/details.solarinnovations.test/webroot/files/pdf/'. $product->name .'.dwg')) exec('zip -D -j -r '. $destination .' "/var/sites/details.solarinnovations.test/webroot/files/pdf/'. $product->name .'.dwg" -x "*.cache"');
        }   
        $filename = "solar-innovations-products-$product_id_query.zip";
        header("Content-type: application/zip");
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header("Pragma: no-cache");
        header("Expires: 0");

        readfile("$destination");
    }

  public function createZip($destination = '', $files = array(), $overwrite = false) {
    $zip = new ZipArchive();
  }

}
