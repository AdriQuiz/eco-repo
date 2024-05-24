<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'password', 'tipo', 'is_admin'];

    public function getAuthIdentifierName()
    {
        return 'id'; // Assuming your primary key is named 'id'
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Assuming your primary key is named 'id'
    }

    public function getAuthPassword()
    {
        return $this->password; // Assuming your password column is named 'password'
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Assuming your remember token column is named 'remember_token'
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // Assuming your remember token column is named 'remember_token'
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Assuming your remember token column is named 'remember_token'
    }
}
