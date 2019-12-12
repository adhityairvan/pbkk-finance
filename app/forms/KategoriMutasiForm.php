<?php
namespace App\Forms;

use App\Models\KategoriMutasi;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\PresenceOf;

class KategoriMutasiForm extends Form
{
    public function initialize(KategoriMutasi $kategori = null, $edit = false){
        if($edit){
            $this->add(new Hidden('id', [
                'value' => $kategori->id,
            ]));
        }
        $namaKategori = new Text('nama_kategori', [
            'placeholder' => 'Masukan Nama Kategori Baru',
            'class' => 'form-control',
            'value' => $edit ? $kategori->nama_kategori : '',
        ]);
        $namaKategori->addValidator(new PresenceOf());
        $tipe = new Select('tipe', [
            'CREDIT' => 'PEMASUKAN',
            'DEBIT' => 'PENGELUARAN',
        ],[
            'class' => 'form-control',
        ]);
        $tipe->addValidator(new PresenceOf());
        $tipe->addValidator(new InclusionIn([
            'domain' => ['CREDIT', 'DEBIT']
        ]));
        $this->add($namaKategori);
        $this->add($tipe);
    }
}