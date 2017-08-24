<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Admin Controller
 *
 *
 * @method \App\Model\Entity\Admin[] paginate($object = null, array $settings = [])
 */
class AdminController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        return $this->redirect("/");
    }
 
}
