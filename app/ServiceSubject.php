<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceSubject extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'service_subjects';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    //protected $primaryKey = 'id';


    protected $fillable = [
//        '_token',
//        'id',
        'name',
        'amount',
        'dimension',
//        'active',
    ];

    protected $hidden = [
//        '_token',
        'remember_token',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'active' => true,
    ];

    /**
     * Return all uniq dimensions from storage.
     *
     * @param string $name
     * @return bool
     */
    public function getAllUniqColumnAttributes( string $name = '')
    {
        if ( empty($name) ) {

        }
            return false;
//        return self::table('service_subjects')->distinct()->get();
    }

}
