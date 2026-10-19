<?php

namespace App\Support;

use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;

/**
 * Reads opening hours for a location from config/site.php and formats them
 * for display ("9 AM", "Open today, 9 AM to 7 PM").
 */
class BusinessHours
{
    /**
     * Today's opening window for a location in the business timezone.
     *
     * @return array{opens: string, closes: string, is_open: bool}|null
     */
    public function today(string $location, ?CarbonInterface $now = null): ?array
    {
        $timezone = config('site.timezone');
        $now = $now ? CarbonImmutable::instance($now)->setTimezone($timezone) : CarbonImmutable::now($timezone);

        foreach ($this->schedule($location) as $slot) {
            if (! in_array($now->dayOfWeekIso, $slot['days'], true)) {
                continue;
            }

            $opens = $now->setTimeFromTimeString($slot['opens']);
            $closes = $now->setTimeFromTimeString($slot['closes']);

            return [
                'opens' => $this->format($slot['opens']),
                'closes' => $this->format($slot['closes']),
                'is_open' => $now->betweenIncluded($opens, $closes),
            ];
        }

        return null;
    }

    /**
     * The opening slots for a location, formatted for display.
     *
     * @return list<array{label: string, opens: string, closes: string}>
     */
    public function rows(string $location): array
    {
        return array_map(fn (array $slot): array => [
            'label' => $slot['label'],
            'opens' => $this->format($slot['opens']),
            'closes' => $this->format($slot['closes']),
        ], $this->schedule($location));
    }

    /**
     * Format a 24-hour "HH:MM" time as "9 AM" or "9:30 AM".
     */
    public function format(string $time): string
    {
        $parsed = CarbonImmutable::createFromFormat('H:i', $time);

        return $parsed->minute === 0 ? $parsed->format('g A') : $parsed->format('g:i A');
    }

    /**
     * @return list<array{days: list<int>, label: string, opens: string, closes: string}>
     */
    private function schedule(string $location): array
    {
        return config("site.locations.{$location}.hours", []);
    }
}
