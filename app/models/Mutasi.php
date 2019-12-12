<?php
namespace App\Models;

use Carbon\Carbon;

class Mutasi extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $tipe;

    /**
     *
     * @var string
     */
    public $judul;

    /**
     *
     * @var integer
     */
    public $kategori_id;

    /**
     *
     * @var integer
     */
    public $amount;

    /**
     *
     * @var string
     */
    public $deskripsi;

    /**
     *
     * @var string
     */
    public $created_at;

    /**
     *
     * @var string
     */
    public $updated_at;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("pbkk_kelompok");
        $this->setSource("mutasi");
        $this->belongsTo('kategori_id', KategoriMutasi::class, 'id', ['alias' => 'KategoriMutasi']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'mutasi';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mutasi[]|Mutasi|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mutasi|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function beforeCreate() {
        $this->created_at = Carbon::now();
        $this->updated_at = Carbon::now();
    }

    public function beforeUpdate() {
        $this->updated_at = Carbon::now();
    }

    public function getCreatedAt(){
        return new Carbon($this->created_at);
    }

}
