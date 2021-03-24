<!-- Sign Up Popup -->
<div id="sign-up-dialog" class="zoom-anim-dialog mfp-hide">
    <div class="small-dialog-header">
        <h3>Sign Up</h3>
    </div>
    {{ html()->form('POST', route('frontend.auth.register.post'))->open() }}
    <div class="sign-in-wrapper">
        <div class="form-group">
            {{ html()->label(__('validation.attributes.frontend.first_name'))->for('first_name') }}

            {{ html()->text('first_name')
                ->class('form-control')
                ->placeholder(__('validation.attributes.frontend.first_name'))
                ->attribute('maxlength', 191)
                ->required() }}
            <i class="ti-user"></i>
        </div>

        <div class="form-group">
            {{ html()->label(__('validation.attributes.frontend.first_name'))->for('last_name') }}

            {{ html()->text('last_name')
                ->class('form-control')
                ->placeholder(__('validation.attributes.frontend.last_name'))
                ->attribute('maxlength', 191)
                ->required() }}
            <i class="ti-user"></i>
        </div>

        <div class="form-group">
            {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

            {{ html()->email('email')
                ->class('form-control')
                ->placeholder('Minimum 6 characters long.')
                ->attribute('maxlength', 191)
                ->required() }}
            <i class="icon_mail_alt"></i>
        </div>

        <div class="form-group">
            {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

            {{ html()->password('password')
                ->class('form-control')
                ->id('password1')
                ->placeholder('Minimum 6 characters long.')
                ->required() }}
            <i class="icon_lock_alt"></i>
        </div>

        <div class="form-group">
            {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

            {{ html()->password('password_confirmation')
                ->class('form-control')
                ->id('password2')
                ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                ->required() }}
            <i class="icon_lock_alt"></i>
        </div>

        <div class="text-center">
            {{ form_submit(__('labels.frontend.auth.register_button'))->class('btn_1 rounded full-width add_top_30') }}
        </div>
        <div class="text-center">Already have an acccount? <strong><a href="{{route('frontend.index')}}">Sign In</a></strong></div>
    </div>
{{ html()->form()->close() }}
<!--form -->
</div>
<!-- /Sign Up Popup -->

