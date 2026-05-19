@php
    $locale = app()->getLocale();
    $logoMap = [
        'ru' => [
            'dark' => '/images/aral_logo/dark/logo_footer_new_ru.svg',
            'light' => '/images/aral_logo/light/logo_footer_new_ru.svg',
        ],
        'uz' => [
            'dark' => '/images/aral_logo/dark/logo_footer_new_uz.svg',
            'light' => '/images/aral_logo/light/logo_footer_new_uz.svg',
        ],
        'kk' => [
            'dark' => '/images/aral_logo/dark/logo_footer_new_ka.svg',
            'light' => '/images/aral_logo/light/logo_footer_new_ka.svg',
        ],
        'en' => [
            'dark' => '/images/aral_logo/dark/logo_footer_new_en.svg',
            'light' => '/images/aral_logo/light/logo_footer_new_en.svg',
        ],
    ];
    $acdfMap = [
        'ru' => ['dark' => '/images/acdf_logo/dark/logo-ru.svg', 'light' => '/images/acdf_logo/light/logo-ru.svg'],
        'uz' => ['dark' => '/images/acdf_logo/dark/logo-uz.svg', 'light' => '/images/acdf_logo/light/logo-uz.svg'],
        'en' => ['dark' => '/images/acdf_logo/dark/logo-en.svg', 'light' => '/images/acdf_logo/light/logo-en.svg'],
    ];
    $logos = $logoMap[$locale] ?? $logoMap['en'];
    $acdf_logos = $acdfMap[$locale] ?? $acdfMap['en'];
@endphp

<footer class="footer">
    <div class="container-fluid">
        <div class="d-flex align-items-start footer_row">
            <div class="footer_col">
                <div class="footer_logo">
                    <a class="d-block footer_logo" href="/">
                        <img src="/images/aral_logo/dark/logo_footer_new_en.svg" alt="logo"
                            class="logo_image_footer dark" />
                        <img src="/images/aral_logo/light/logo_footer_new_en.svg" alt="logo"
                            class="logo_image_footer light" />
                    </a>
                </div>
            </div>
            <div class="footer_col">
                <div class="contacts">
                    <p class="section_title">Contact</p>
                    <p>Uzbekistan Art and Culture Development Foundation</p>
                    <p>
                        Address: 1, Taras Shevchenko str., Tashkent, 100029,
                        Uzbekistan
                    </p>
                </div>
                <div class="general_inquiries mt-3">
                    <p class="section_title m-0">General inquiries</p>
                    <p class="m-0">
                        <a href="mailto:info@aralculturesummit.uz">info@aralculturesummit.uz</a>
                    </p>
                </div>
                <div class="social-media mt-3">
                    <p class="section_title">Social media</p>

                    <a href="https://www.instagram.com/aral.culture.summit/" target="_blank" aria-label="instagram">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                </div>
            </div>
            <div class="footer_col">
                <div class="organisers">
                    <p class="section_title m-0">Organiser</p>
                    <p>Uzbekistan Art and Culture Development Foundation</p>
                    <a class="d-block mt-4 acdf_logo" href="https://acdf.uz/" target="_blank">
                        <img src="/images/acdf_logo/light/logo-en.svg" alt="logo" class="logo_image_footer light" />
                        <img src="/images/acdf_logo/dark/logo-en.svg" alt="logo" class="logo_image_footer dark" />
                    </a>
                </div>
                <div class="policies mobile mt-4 pt-3">
                    <a href="/privacy" class="me-3"> Privacy Policy </a>

                    <a href="/cookies" class="me-3"> Cookie Policy </a>
                </div>
            </div>
            <div class="footer_col">
                <div class="subscribe_wrap">
                    <p class="section_title mb-2">Newsletter</p>

                    <form id="w0" class="validate" action="/site/subscribe" method="post">
                        <input type="hidden" name="_csrf-frontend"
                            value="B0t95y2uhQcTvgGEtraBqFTY2GGE0AyF94Y__irtRrhoBzCjfMHzP2PYMsX5w9CZGLOVNrejPeOnzmrIE5Q1gQ==" />
                        <div class="subscribe_form d-flex">
                            <div class="w-100 field-subscribers-email required">
                                <input type="email" id="subscribers-email" class="required email w-100"
                                    name="Subscribers[email]" placeholder="Email" required="" aria-required="true" />
                                <div class="invalid-feedback"></div>
                            </div>
                            <input type="submit" class="btn-white" value="Subscribe" />
                        </div>
                    </form>
                    <div class="policies mt-4 pt-3">
                        <a href="/privacy" class="me-3"> Privacy Policy </a>

                        <a href="/cookies" class="me-3"> Cookie Policy </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
