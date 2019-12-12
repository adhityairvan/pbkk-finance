<?php

namespace App\Controllers;

use App\Forms\CreditForm;
use App\Forms\DebitForm;
use App\Models\Keuangan;
use App\Models\Mutasi;

class MutasiController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function showPengeluaranAction($month = null){
        $user = $this->getUser();
        if(!is_null($month)){
            $mutations = $user->getMutasiDebit([
                'month(App\Models\Mutasi.created_at) = :month:',
                'bind' => [
                    'month' => $month
                ]
            ]);
        }
        else{
            $mutations = $user->MutasiDebit;
        }

        $this->view->mutations = $mutations;
        $this->view->pick('mutasi/showPengeluaran');
        return;
    }

    public function createPengeluaranAction(){
        $user = $this->getUser();
        $this->view->form = new DebitForm($user->KategoriMutasiDebit);
        $this->view->pick('mutasi/createPengeluaran');
    }

    public function storePengeluaranAction(){
        $user = $this->getUser();
        $mutasi = new Mutasi();
        $form = new DebitForm();
        $form->bind($_POST, $mutasi);
        if($form->isValid()){
            $mutasi->save();
            $user->Keuangan->amount -= $mutasi->amount;
            $user->Keuangan->save();
            $this->flashSession->success('Success creating new mutation');

        }
        else{
            $messages = $form->getMessages();

            foreach ($messages as $message) {
                $this->flashSession->error($message);
            }
            $this->_redirectBack();
        }

        return $this->response->redirect('/mutasi/showPengeluaran');
    }

    public function pengeluaranApiAction(){
        $this->view->disable();
        $user = $this->getUser();
        $kategori = $user->KategoriMutasiDebit;
        $dataset = [];
        foreach($kategori as $item){
            $sum = 0;
            foreach ($item->Mutasi as $mutasi){
                $sum += $mutasi->amount;
            }
            array_push($dataset, [$item->nama_kategori, $sum]);
        }
        return json_encode($dataset);
    }

    public function showPemasukanAction($month = null){
        $user = $this->getUser();
        if(!is_null($month)){
            $mutations = $user->getMutasiCredit([
                'month(App\Models\Mutasi.created_at) = :month:',
                'bind' => [
                    'month' => $month
                ]
            ]);
        }
        else{
            $mutations = $user->MutasiCredit;
        }

        $this->view->mutations = $mutations;
        $this->view->pick('mutasi/showPemasukan');
    }

    public function createPemasukanAction(){
        $user = $this->getUser();
        $this->view->form = new CreditForm($user->KategoriMutasiCredit);
        $this->view->pick('mutasi/createPemasukan');
    }

    public function storePemasukanAction(){
        $user = $this->getUser();
        $mutasi = new Mutasi();
        $form = new CreditForm();
        $form->bind($_POST, $mutasi);
        if($form->isValid()){
            $mutasi->save();
            $user->Keuangan->amount += $mutasi->amount;
            $user->Keuangan->save();
            $this->flashSession->success('Success creating new mutation');
        }
        else{
            $messages = $form->getMessages();

            foreach ($messages as $message) {
                $this->flashSession->error($message);
            }
            $this->_redirectBack();
        }

        return $this->response->redirect('/mutasi/showPemasukan');

        return 'wow';
    }

    public function pemasukanApiAction(){
        $this->view->disable();
        $user = $this->getUser();
        $kategori = $user->KategoriMutasiCredit;
        $dataset = [];
        foreach($kategori as $item){
            $sum = 0;
            foreach ($item->Mutasi as $mutasi){
                $sum += $mutasi->amount;
            }
            array_push($dataset, [$item->nama_kategori, $sum]);
        }
        return json_encode($dataset);
    }

    public function deleteAction($id){
        $mutation = Mutasi::findFirst($id);

        $mutation->delete();
        $this->flashSession->success('success deleting mutation');
        return $this->_redirectBack();
    }

}

