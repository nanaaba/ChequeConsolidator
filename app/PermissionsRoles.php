<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionsRoles extends Model {

    
  
   protected $table = 'permissions_and_roles';

     const CREATED_AT = 'datecreated';
    const UPDATED_AT = 'last_modified_date';

}