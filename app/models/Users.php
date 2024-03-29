<?php
namespace App\Models;

use Carbon\Carbon;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class Users extends \Phalcon\Mvc\Model
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
    public $email;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $remember_me;

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
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("pbkk_kelompok");
        $this->setSource("users");
        $this->hasOne('id', Keuangan::class, 'user_id', ['alias' => 'Keuangan']);
        $this->hasMany('id', KategoriMutasi::class, 'owner', [
            'alias' => 'KategoriMutasiCredit',
            'params' => [
                'conditions' => "tipe = 'CREDIT'"
            ]
        ]);
        $this->hasMany('id', KategoriMutasi::class, 'owner', [
            'alias' => 'KategoriMutasiDebit',
            'params' => [
                'conditions' => "tipe = 'DEBIT'"
            ]
        ]);
        $this->hasManyToMany('id',
            KategoriMutasi::class,
            'owner',
            'id',
            Mutasi::class,
            'kategori_id',
            [
                'alias' => 'MutasiCredit',
                'params' => [
                    'conditions' => "App\Models\Mutasi.tipe = 'CREDIT'",
                ]
            ]);
        $this->hasManyToMany('id',
            KategoriMutasi::class,
            'owner',
            'id',
            Mutasi::class,
            'kategori_id',
            [
                'alias' => 'MutasiDebit',
                'params' => [
                    'conditions' => "App\Models\Mutasi.tipe = 'DEBIT'",
                    ]
            ]);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users|\Phalcon\Mvc\Model\ResultInterface
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

}
