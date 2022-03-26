<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Example product class
 *
 * @package App\Models
 */
class Product extends Model
{
    use HasFactory;

    public const
        // Name for product
        FIELD_NAME = "name",
        // More details about product
        FIELD_DETAIL = "detail";


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        self::FIELD_NAME,
        self::FIELD_DETAIL,
    ];
}
