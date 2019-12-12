<?php

namespace App\Forms;

use App\Models\KategoriMutasi;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;

class DebitForm extends Form
{
    public function initialize($categories){
        $tipe = new Hidden('tipe', [
            'value' => 'DEBIT'
        ]);
        $judul = new Text('judul', [
            'class' => 'form-control',
            'placeholder' => 'Judul Pengeluaran ..'
        ]);
        $judul->addValidator(new PresenceOf());
        $kategori = new Select('kategori_id',
            $categories,
            [
                'using' => [
                    'id', 'nama_kategori'
                ],
                'useEmpty' => true,
                'emptyText' => 'Pilih kategori pengeluaran',
                'emptyValue' => '',
                'class' => 'form-control',
            ]);
        $kategori->addValidator(new PresenceOf());
        $amount = new Numeric('amount', [
            'class' => 'form-control'
        ]);
        $amount->addValidator(new PresenceOf());
        $deskripsi = new Text('deskripsi', [
            'class' => 'form-control',
            'placeholder' => 'masukan deskripsi tambahan'
        ]);

        $this->add($tipe);
        $this->add($judul);
        $this->add($kategori);
        $this->add($amount);
        $this->add($deskripsi);
    }
}