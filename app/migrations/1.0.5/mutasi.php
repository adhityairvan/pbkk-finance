<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class MutasiMigration_105
 */
class MutasiMigration_105 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('mutasi', [
                'columns' => [
                    new Column(
                        'id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 11,
                            'first' => true
                        ]
                    ),
                    new Column('tipe', [
                        'type' => Column::TYPE_VARCHAR,
                        'notNull' => true,
                    ]),
                    new Column('judul', [
                        'type' => Column::TYPE_VARCHAR,
                    ]),
                    new Column('kategori_id', [
                        'type' => Column::TYPE_INTEGER,
                    ]),
                    new Column('amount', [
                        'type' => Column::TYPE_BIGINTEGER,
                        'default' => 0,
                        'notNull' => true,
                    ]),
                    new Column('deskripsi', [
                        'type' => Column::TYPE_VARCHAR,
                    ]),
                    new Column('created_at', [
                        'type' => Column::TYPE_TIMESTAMP,
                    ]),
                    new Column('updated_at', [
                        'type' => Column::TYPE_TIMESTAMP,
                    ])
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY')
                ],
                'options' => [
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '1',
                    'ENGINE' => 'InnoDB',
                    'TABLE_COLLATION' => 'latin1_swedish_ci'
                ],
            ]
        );
    }

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {

    }

}
