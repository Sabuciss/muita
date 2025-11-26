<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model {
    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
    public function inspections() {
        return $this->hasMany(Inspection::class, 'case_id');
    }
    public function documents() {
        return $this->hasMany(Document::class, 'case_id');
    }
    public function declarant() {
        return $this->belongsTo(Party::class, 'declarant_id');
    }
    public function consignee() {
        return $this->belongsTo(Party::class, 'consignee_id');
    }
}

