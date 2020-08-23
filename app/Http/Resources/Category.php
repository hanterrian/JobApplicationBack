<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Category */
class Category extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sort' => $this->sort,
            'published' => $this->published,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'children_count' => $this->children_count,
            'translations_count' => $this->translations_count,
            'useTranslationFallback' => $this->useTranslationFallback,
            'translationForeignKey' => $this->translationForeignKey,
            'localeKey' => $this->localeKey,
            'translationModel' => $this->translationModel,

            'parent_id' => $this->parent_id,
        ];
    }
}
