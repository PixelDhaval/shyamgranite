<?php

namespace App\Filament\Resources\Pages\Support;

/**
 * Converts the page "content" JSON between storage and the admin form,
 * and drops empty values so stored content stays as tidy as the seed files.
 */
trait PreparesPageContent
{
    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $content = $data['content'] ?? [];
        $content['blocks'] = PageBlocks::toBuilder($content['blocks'] ?? []);
        $data['content'] = $content;

        return $data;
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function prepareContentForStorage(array $data): array
    {
        $content = $data['content'] ?? [];
        $content['blocks'] = PageBlocks::fromBuilder($content['blocks'] ?? []);

        if (isset($content['specs']) && is_array($content['specs'])) {
            $content['specs'] = array_filter($content['specs'], fn (mixed $value): bool => filled($value));
        }

        $data['content'] = array_filter($content, fn (mixed $value): bool => $value !== null && $value !== '' && $value !== [] && $value !== false);
        $data['faqs'] = array_values($data['faqs'] ?? []);

        return $data;
    }
}
