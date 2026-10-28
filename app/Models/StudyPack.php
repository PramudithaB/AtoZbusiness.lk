<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyPack extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'title',
        'slug',
        'subtitle',
        'description',
        'grade',
        'price',
        'thumbnail',
        'curriculum_data',
        'is_published',
    ];

    protected $casts = [
        'curriculum_data' => 'array',
        'is_published' => 'boolean',
        'price' => 'integer',
    ];

    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function package()
    {
        return $this->hasOne(Package::class, 'class_id', 'class_id');
    }

    /**
     * Get total topics count across all grade tabs
     */
    public function getTopicsCountAttribute(): int
    {
        $curriculum = $this->curriculum_data ?? [];
        $count = 0;
        foreach ($curriculum as $grade => $topics) {
            if (is_array($topics)) {
                $count += count($topics);
            }
        }
        return $count;
    }

    /**
     * Get total subtopics / competency levels count
     */
    public function getSubtopicsCountAttribute(): int
    {
        $curriculum = $this->curriculum_data ?? [];
        $count = 0;
        foreach ($curriculum as $grade => $topics) {
            if (is_array($topics)) {
                foreach ($topics as $topic) {
                    if (isset($topic['subs']) && is_array($topic['subs'])) {
                        $count += count($topic['subs']);
                    }
                }
            }
        }
        return $count;
    }
}
