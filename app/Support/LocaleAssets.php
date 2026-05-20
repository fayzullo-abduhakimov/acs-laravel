<?php

namespace App\Support;

class LocaleAssets
{
    /**
     * Localised home hero logo (single SVG).
     */
    public static function homeLogo(?string $locale = null): string
    {
        $suffix = static::fileSuffix($locale);

        return "/images/logo_home/logo_home_new_{$suffix}.svg";
    }

    /**
     * Localised header logo with dark/light variants.
     *
     * @return array{dark: string, light: string}
     */
    public static function headerLogos(?string $locale = null): array
    {
        $suffix = static::fileSuffix($locale);

        return [
            'dark'  => "/images/logo_header/dark/logo_header_new_{$suffix}.svg",
            'light' => "/images/logo_header/light/logo_header_new_{$suffix}.svg",
        ];
    }

    /**
     * Localised footer logo with dark/light variants.
     *
     * @return array{dark: string, light: string}
     */
    public static function footerLogos(?string $locale = null): array
    {
        $suffix = static::fileSuffix($locale);

        return [
            'dark'  => "/images/aral_logo/dark/logo_footer_new_{$suffix}.svg",
            'light' => "/images/aral_logo/light/logo_footer_new_{$suffix}.svg",
        ];
    }

    /**
     * Localised ACDF partner logo with dark/light variants.
     *
     * Karakalpak (`kk`) and any unknown locale fall back to English, since
     * the ACDF brand only ships en/ru/uz artwork.
     *
     * @return array{dark: string, light: string}
     */
    public static function acdfLogos(?string $locale = null): array
    {
        $locale = $locale ?: app()->getLocale();
        $suffix = in_array($locale, ['ru', 'uz'], true) ? $locale : 'en';

        return [
            'dark'  => "/images/acdf_logo/dark/logo-{$suffix}.svg",
            'light' => "/images/acdf_logo/light/logo-{$suffix}.svg",
        ];
    }

    /**
     * Localised OpenGraph image (PNG variant of the home logo).
     */
    public static function ogImage(?string $locale = null): string
    {
        $suffix = static::fileSuffix($locale);

        return "/images/logo_home/logo_home_new_{$suffix}.png";
    }

    /**
     * Map an application locale code to the filename suffix used in /public.
     * Karakalpak (`kk`) art is shipped under the `ka` suffix.
     */
    public static function fileSuffix(?string $locale = null): string
    {
        $locale = $locale ?: app()->getLocale();

        return match ($locale) {
            'ru', 'uz', 'en' => $locale,
            'kk'             => 'ka',
            default          => 'en',
        };
    }
}
