<?php

namespace App\Controllers;

use App\Forms\KategoriMutasiForm;
use App\Models\KategoriMutasi;

class KategoriMutasiController extends ControllerBase
{

    public function indexAction()
    {
        $user = $this->di->getShared('auth')->user();
        $this->view->credits = $user->KategoriMutasiCredit;
        $this->view->debits = $user->KategoriMutasiDebit;

        return;

//        echo json_encode($kategori);
    }

    public function showCreateAction(){
        $this->view->form = new KategoriMutasiForm();
    }

    public function storeAction(){
        $form = new KategoriMutasiForm();
        $kategori = new KategoriMutasi();
        $form->bind($_POST, $kategori);
        if($form->isValid()){
            $kategori->User = $this->di->getShared('auth')->user();
            $kategori->save();
            $this->flashSession->success('Creating new Kategori Mutasi success');
            return $this->response->redirect('/kategori_mutasi');
        }
        $messages = $form->getMessages();

        foreach ($messages as $message) {
            $this->flashSession->error($message);
        }
        $this->_redirectBack();
    }

    public function showEditAction($id){
        $kategori = KategoriMutasi::findFirst($id);
        $form = new KategoriMutasiForm($kategori, true);
        $form->bind([],$kategori);
        $this->view->form = $form;
    }

    public function updateAction(){
        $kategori = KategoriMutasi::findFirst($this->request->getPost('id'));
        $form = new KategoriMutasiForm();
        $form->bind($_POST, $kategori);
        if($form->isValid()){
            $kategori->save();
            $this->flashSession->success('Updating Kategori Mutasi success');
            return $this->response->redirect('/kategori_mutasi');
        }
        $messages = $form->getMessages();

        foreach ($messages as $message) {
            $this->flashSession->error($message);
        }
        $this->_redirectBack();
    }

    public function deleteAction($id){
        $kategori = KategoriMutasi::findFirst($id);
        foreach ($kategori->Mutasi as $mutasi){
            $mutasi->delete();
        }
        $kategori->delete();
        $this->flashSession->success('Deleting Kategori Mutasi success');
        return $this->response->redirect('/kategori_mutasi');

    }

}

