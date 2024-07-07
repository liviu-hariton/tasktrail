<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UniqueSlug
{
    // Generate a unique slug before saving the model
    public static function bootUniqueSlug(): void
    {
        static::saving(function($model) {
            $slug_separator = self::$slug_separator ?? '_';

            if(isset($model->slug)) {
                $model->slug = $model->generateUniqueSlug($model->slug, $slug_separator);
            }
        });
    }

    /**
     * Generate a unique slug for the model.
     *
     * @param  string $slug
     * @return string
     */
    public function generateUniqueSlug(string $slug, string $slug_separator): string
    {
        $slugNumber = $this->extractSlugNumber($slug, $slug_separator);

        $existingSlugs = $this->getExistingSlugs($slug);

        // If the current slug is not in use, return it
        if(!$this->slugInUse($slug, $existingSlugs)) {
            return $slug.($slugNumber ? $slug_separator.$slugNumber : '');
        }

        // Find the first available unique slug
        return $this->findUniqueSlug($slug, $existingSlugs, $slugNumber, $slug_separator);
    }

    /**
     * Extract the number from the slug and return the modified slug.
     *
     * @param  string $slug
     * @return int|null
     */
    private function extractSlugNumber(string &$slug, string $slug_separator): ?int
    {
        // Extract the trailing number from the slug if it has one
        if(preg_match('/'.$slug_separator.'(\d+)$/', $slug, $matches)) {
            // Remove the trailing number from the slug
            $slug = Str::replaceLast($slug_separator.$matches[1], '', $slug);

            return (int) $matches[1];
        }

        return null;
    }

    /**
     * Check if the given slug is in use.
     *
     * @param  string $slug
     * @param  array  $existingSlugs
     * @return bool
     */
    private function slugInUse(string $slug, array $existingSlugs): bool
    {
        return in_array($slug, $existingSlugs);
    }

    /**
     * Find the first available unique slug.
     *
     * @param  string $slug
     * @param  array  $existingSlugs
     * @param  int|null $slugNumber
     * @return string
     */
    private function findUniqueSlug(string $slug, array $existingSlugs, ?int $slugNumber, string $slug_separator): string
    {
        $i = $slugNumber ? ($slugNumber + 1) : 1;

        // Iterate to find the first available unique slug
        while(in_array($newSlug = $slug.$slug_separator.$i, $existingSlugs)) {
            $i++;
        }

        return $newSlug;
    }

    /**
     * Retrieve existing slugs partially matching the given slug in the current model.
     *
     * @param  string $slug
     * @return array
     */
    private function getExistingSlugs(string $slug): array
    {
        return $this->where('slug', 'LIKE', $slug . '%')
            ->where('id', '!=', $this->id ?? null)
            ->pluck('slug') // get only the slug column
            ->toArray();
    }
}
