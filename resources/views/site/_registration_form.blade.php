@php
    $locale = app()->getLocale();
    $regLogoMap = [
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
    $regLogos = $regLogoMap[$locale] ?? $regLogoMap['en'];

    $sourceOptions = [
        'Website' => translator('app', 'Website'),
        'Friend/Colleague' => translator('app', 'Friend/Colleague'),
        'Online research' => translator('app', 'Online research'),
    ];
    $dayOptions = [
        'July 4th' => translator('app', 'July 4th'),
        'July 5th' => translator('app', 'July 5th'),
        'July 6th' => translator('app', 'July 6th'),
    ];

    $regHasError = $errors->registration->isNotEmpty();
@endphp

<div class="register_modal modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal_header">
                <div class="modal_logo">
                    <img src="{{ $regLogos['dark'] }}" alt="logo" class="logo_img dark">
                    <img src="{{ $regLogos['light'] }}" alt="logo" class="logo_img light">
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h4 class="content_title">
                    {{ translator('app', 'Register now for the Aral Culture Summit!') }}
                </h4>
                <p class="content_subtitle">
                    {{ translator('app', 'Complete the form below to sign up for the Summit') }}
                </p>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if ($regHasError)
                    <div class="alert alert-danger">
                        <ul class="m-0 ps-3">
                            @foreach ($errors->registration->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="post" class="modal_form">
                    @csrf

                    <div class="row g-3 form_inputs">
                        <div class="col-md-6">
                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                class="form_input @error('first_name', 'registration') is-invalid @enderror"
                                placeholder="{{ translator('app', 'First Name') }}" required>
                            @error('first_name', 'registration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                class="form_input @error('last_name', 'registration') is-invalid @enderror"
                                placeholder="{{ translator('app', 'Last Name') }}" required>
                            @error('last_name', 'registration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form_input @error('email', 'registration') is-invalid @enderror"
                                placeholder="{{ translator('app', 'you@example.com') }}" required>
                            @error('email', 'registration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="form_input @error('phone', 'registration') is-invalid @enderror"
                                placeholder="+998 99 999 99 99" required>
                            @error('phone', 'registration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <input type="text" name="address" value="{{ old('address') }}"
                                class="form_input @error('address', 'registration') is-invalid @enderror"
                                placeholder="{{ translator('app', 'Address') }}" required>
                            @error('address', 'registration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="city" value="{{ old('city') }}"
                                class="form_input @error('city', 'registration') is-invalid @enderror"
                                placeholder="{{ translator('app', 'City') }}" required>
                            @error('city', 'registration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="state" value="{{ old('state') }}" class="form_input"
                                placeholder="{{ translator('app', 'State / Province') }}">
                        </div>

                        <div class="col-md-12">
                            <input type="text" name="postal_code" value="{{ old('postal_code') }}"
                                class="form_input" placeholder="{{ translator('app', 'Postal / ZIP') }}">
                        </div>
                    </div>

                    <div class="row checkbox_row">
                        <div class="form-group">
                            <div class="group-title">{{ translator('app', 'How did you hear about the Summit?') }}
                            </div>
                            <div class="d-flex flex-wrap checkbox_wrapper">
                                @foreach ($sourceOptions as $value => $label)
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="sources[]" value="{{ $value }}"
                                            @checked(in_array($value, (array) old('sources', [])))>
                                        <span class="checkmark"></span>
                                        {{ $label }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="group-title">
                                {{ translator('app', 'How many will attend? (multiple choice allowed)') }}</div>
                            <div class="d-flex flex-wrap checkbox_wrapper">
                                @foreach ($dayOptions as $value => $label)
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="attendance_days[]" value="{{ $value }}"
                                            @checked(in_array($value, (array) old('attendance_days', [])))>
                                        <span class="checkmark"></span>
                                        {{ $label }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="submit_button">
                        {{ translator('app', 'Register') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@if ($regHasError || (session('success') && old('email')))
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var el = document.getElementById('registerModal');
                if (el && window.bootstrap) {
                    new bootstrap.Modal(el).show();
                }
            });
        </script>
    @endpush
@endif

@push('scripts')
    <script>
        $('#registerModal').on('hidden.bs.modal', function() {
            var form = $(this).find('form')[0];
            if (form) {
                form.reset();
            }
            $(this).find('.is-invalid').removeClass('is-invalid');
            $(this).find('.invalid-feedback').text('');
        });
    </script>
@endpush
