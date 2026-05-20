@php
    $sourceOptions = [
        'Website'          => translator('app', 'Website'),
        'Friend/Colleague' => translator('app', 'Friend/Colleague'),
        'Online research'  => translator('app', 'Online research'),
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
                    <x-logo variant="footer" image-class="logo_img" />
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
                        @foreach ([
                            ['name' => 'first_name',  'type' => 'text',  'col' => 'col-md-6', 'placeholder' => translator('app', 'First Name'),       'required' => true],
                            ['name' => 'last_name',   'type' => 'text',  'col' => 'col-md-6', 'placeholder' => translator('app', 'Last Name'),        'required' => true],
                            ['name' => 'email',       'type' => 'email', 'col' => 'col-md-6', 'placeholder' => translator('app', 'you@example.com'),  'required' => true],
                            ['name' => 'phone',       'type' => 'text',  'col' => 'col-md-6', 'placeholder' => '+998 99 999 99 99',                   'required' => true],
                            ['name' => 'address',     'type' => 'text',  'col' => 'col-12',   'placeholder' => translator('app', 'Address'),          'required' => true],
                            ['name' => 'city',        'type' => 'text',  'col' => 'col-md-6', 'placeholder' => translator('app', 'City'),             'required' => true],
                            ['name' => 'state',       'type' => 'text',  'col' => 'col-md-6', 'placeholder' => translator('app', 'State / Province'), 'required' => false],
                            ['name' => 'postal_code', 'type' => 'text',  'col' => 'col-md-12','placeholder' => translator('app', 'Postal / ZIP'),     'required' => false],
                        ] as $field)
                            <div class="{{ $field['col'] }}">
                                <input type="{{ $field['type'] }}"
                                       name="{{ $field['name'] }}"
                                       value="{{ old($field['name']) }}"
                                       placeholder="{{ $field['placeholder'] }}"
                                       @class([
                                           'form_input',
                                           'is-invalid' => $errors->registration->has($field['name']),
                                       ])
                                       @if ($field['required']) required @endif>
                                @if ($errors->registration->has($field['name']))
                                    <div class="invalid-feedback">{{ $errors->registration->first($field['name']) }}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="row checkbox_row">
                        <x-registration-checkbox-group
                            name="sources"
                            :title="translator('app', 'How did you hear about the Summit?')"
                            :options="$sourceOptions" />

                        <x-registration-checkbox-group
                            name="attendance_days"
                            :title="translator('app', 'How many will attend? (multiple choice allowed)')"
                            :options="$dayOptions" />
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
            document.addEventListener('DOMContentLoaded', function () {
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
        $('#registerModal').on('hidden.bs.modal', function () {
            var form = $(this).find('form')[0];
            if (form) form.reset();
            $(this).find('.is-invalid').removeClass('is-invalid');
            $(this).find('.invalid-feedback').text('');
        });
    </script>
@endpush
