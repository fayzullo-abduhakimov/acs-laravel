@props(['footer_settings', 'social_links', 'footer_menus'])

@php use Mcamara\LaravelLocalization\Facades\LaravelLocalization; @endphp

<footer class="footer">
    <div class="container-fluid">
        <div class="d-flex align-items-start footer_row">

            <div class="footer_col">
                <div class="footer_logo">
                    <a class="d-block footer_logo" href="{{ route('home') }}">
                        <x-logo variant="footer" image-class="logo_image_footer" />
                    </a>
                </div>
            </div>

            <div class="footer_col">
                <div class="contacts">
                    <p class="section_title">{{ translator('app', 'Contacts') }}</p>
                    <p>{{ $footer_settings->get('acdf') }}</p>
                    <p>{{ $footer_settings->get('acdf_address') }}</p>
                </div>
                <div class="general_inquiries mt-3">
                    <p class="section_title m-0">{{ translator('app', 'General inquiries') }}</p>
                    <p class="m-0">
                        <a href="mailto:{{ $footer_settings->get('acdf_email') }}">
                            {{ $footer_settings->get('acdf_email') }}
                        </a>
                    </p>
                </div>
                <div class="social-media mt-3">
                    <p class="section_title">{{ translator('app', 'Social media') }}</p>
                    <x-social-icons :links="$social_links" />
                </div>
            </div>

            <div class="footer_col">
                <div class="organisers">
                    <p class="section_title m-0">{{ translator('app', 'Organiser') }}</p>
                    <p>{{ $footer_settings->get('acdf') }}</p>
                    <a class="d-block mt-4 acdf_logo" href="https://acdf.uz/" target="_blank" rel="noopener">
                        <x-logo variant="acdf" image-class="logo_image_footer" />
                    </a>
                </div>
                <div class="policies mobile mt-4 pt-3">
                    @foreach ($footer_menus as $menu)
                        <a href="{{ LaravelLocalization::getLocalizedURL(null, $menu->link) }}" class="me-3">{{ $menu->title }}</a>
                    @endforeach
                </div>
            </div>

            <div class="footer_col">
                <div class="subscribe_wrap">
                    <p class="section_title mb-2">{{ translator('app', 'Newsletter') }}</p>
                    <form action="{{ route('subscribe') }}" method="POST" class="validate">
                        @csrf
                        <div class="subscribe_form d-flex">
                            <div class="w-100 field-subscribers-email required">
                                <input type="email" name="email" required
                                       placeholder="Email" class="required email w-100">
                                <div class="invalid-feedback"></div>
                            </div>
                            <input type="submit" class="btn-white" value="{{ translator('app', 'Subscribe') }}">
                        </div>
                        @if (session('success'))
                            <p class="text-success mt-2">{{ session('success') }}</p>
                        @endif
                    </form>
                    <div class="policies mt-4 pt-3">
                        @foreach ($footer_menus as $menu)
                            <a href="{{ LaravelLocalization::getLocalizedURL(null, $menu->link) }}" class="me-3">{{ $menu->title }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
