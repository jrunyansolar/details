<?php
namespace App\Controller;

use App\Controller\AppController;
use Imagick;
use Spatie\PdfToImage;
use Spatie\PdfToImage\Pdf;


/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[] paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Series', 'ProductTypes', 'MaterialTypes']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Series', 'ProductTypes', 'MaterialTypes', 'ProductMaterialType', 'SeriesProduct']
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $series = $this->Products->Series->find('list');
        $productTypes = $this->Products->ProductTypes->find('list');
        $materialTypes = $this->Products->MaterialTypes->find('list');
        $this->set(compact('product', 'series', 'productTypes', 'materialTypes'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $series = $this->Products->Series->find('list');
        $productTypes = $this->Products->ProductTypes->find('list');
        $materialTypes = $this->Products->MaterialTypes->find('list');
        $this->set(compact('product', 'series', 'productTypes', 'materialTypes'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    private function save_png($pdf_source, $save_path) {
        if(!file_exists($save_path)) {
            $pdf = new Pdf($pdf_source);
            $pdf->saveImage($save_path);
            return true;
        } else {
            return false;
        }
    }

    private function parse_details($pdf_source) {
        $identifiers = explode('_', $pdf_source);
        
        $result = [
            'series'=> ['name'=>'-', 'id'=>null],
            'product_type'=> ['name'=>'-', 'id'=>null],
            'material_type'=> ['name'=>'-', 'id'=>null],
            'option_names'=>'-',
            'options' => []
        ];

        
        foreach($identifiers as $identifier) {

            $series = $this->Products->Series->find('all')->where(['identifier_key'=>$identifier])->first();
            $productType = $this->Products->ProductTypes->find('all')->where(['identifier_key'=>$identifier])->first();
            $materialTypes = $this->Products->MaterialTypes->find('all')->where(['identifier_key'=>$identifier])->first();
            $options = $this->Products->ProductOptions->Options->find('all')->where(['identifier_key'=>$identifier])->first();
            if($series) $result['series'] = $series;
            elseif($productType) $result['product_type'] = $productType;
            elseif($materialTypes) $result['material_type'] = $materialTypes;
            elseif($options) {
                array_push($result['options'], $options); 
            }
            
        }
        
        $result['option_names'] = join(', ', array_column($result['options'], 'name')); 

        return $result;
    }

    public function import() {
        @ini_set('zlib.output_compression',0);
        @ini_set('implicit_flush',1);
        @ob_end_clean();
        set_time_limit(0); 
        ob_implicit_flush(true);

        $productCount = 0;
        $importedProducts = 0;
        $errorCount = 0;
        $results = [];
        $messages = [];

        $this->Products = $this->loadModel('Products');
        $productCount = $this->Products->find('all')->count();
        
        if($this->request->is('post')) {
            $source_path = WWW_ROOT. "files/pdf/";
            $i = 0;
            $source_dir = array_diff(scandir($source_path), array('..', '.')); 
            foreach ($source_dir as $key => $value) {
                $file_name =  basename($value, '.pdf');
                $save_path = WWW_ROOT . "files/png/$file_name.png";
                $result = [ 'file'=> $save_path ];
                
                // Merge in the parsed details
                $details = $this->parse_details($file_name);
                $result = array_merge($result, $details);

                $existing_product = $this->Products->find('all')->where(['name'=>basename($value, '.pdf')])->count();
                if($existing_product > 0) { 
                    $result['message'] = 'This product already exists.';
                    $result['success'] = false;
                }
                else {
                    $saved_file = $this->save_png($source_path.DS.$value, $save_path);

                    if(!$saved_file) {
                        $result['message'] = 'Could not create the preview from the PDF.';
                        $result['success'] = false;
                    }
                    
                    $product = $this->Products->newEntity();
                    $product = $this->Products->patchEntity($product, 
                        ['series_id'=>  $details['series']['id'], 
                        'product_type_id'=> $details['product_type']['id'],
                        'material_type_id'=> $details['material_type']['id'],
                        'name'=> basename($value, '.pdf'),
                        'pdf_path'=>$value,
                        'png_path'=> basename($value, '.png') ]
                    );

                    $options = $this->Products->ProductOptions->newEntity();
                    $options = $this->Products->patchEntity($options, [
                        'option_id' => 1
                    ]);
                    
                    if($this->Products->save($product)) {
                        $result['success'] = true;
                        $result['message'] = 'The product has been imported.';
                    }
                    else {
                        $result['success'] = false;
                        $result['message'] = 'The product could not be imported.';
                    }
                }
                
                if($result['success']) $importedProducts++; else $errorCount++;
                array_push($results, $result);

                $class_name = $result['success'] ? "successful" : "failed"; 
                print("<tr class='$class_name'><td>".basename($value, '.pdf')."</td><td>".
                        $details['series']['name']."</td><td>".
                        $details['material_type']['name']."</td><td>".
                        $details['product_type']['name']."</td><td>".
                        $details['option_names']."</td><td>".$result['message']."</td></tr>"  );
            }
            
            $messages = array_column($results, 'message');
            exit(); // Needs to be moved to /ajax/import 
        }
            
        $this->set(compact('productCount', 'importedProducts', 'errorCount', 'messages', 'results'));
       
    }
}
