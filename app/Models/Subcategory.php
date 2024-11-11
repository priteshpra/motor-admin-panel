<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class Subcategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_name',
        'subcategory_name',
    ];

    public function getEncryptedIdAttribute() {
        $id = Crypt::encryptString($this->id);
        return $id;
    }
    public function getShowRouteAttribute() {
        $e_id = Crypt::encryptString($this->id);
        $route = route('admin.subcategorys.show', ['encrypted_id' => $e_id]);
        return $route;
    }
    public function getEditRouteAttribute() {
        $e_id = Crypt::encryptString($this->id);
        $route = route('admin.subcategorys.edit', ['encrypted_id' => $e_id]);
        return $route;
    }
    public function getIndexRouteAttribute() {
        $route = route('admin.subcategorys.index');
        return $route;
    }
}
