<!-- Sign In Popup -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
    <div class="small-dialog-header">
        <h3>Sign In</h3>
    </div>
    {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
    <div class="sign-in-wrapper">
        <div class="form-group">
            {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

            {{ html()->email('email')
                ->class('form-control')
                ->id('email')
                ->placeholder(__('validation.attributes.frontend.email'))
                ->attribute('maxlength', 191)
                ->required() }}
            <i class="icon_mail_alt"></i>
        </div>
        <div class="form-group">
            {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

            {{ html()->password('password')
                ->class('form-control')
                ->id('password')
                ->placeholder(__('validation.attributes.frontend.password'))
                ->required() }}
            <i class="icon_lock_alt"></i>
        </div>
        <div class="clearfix add_bottom_15">
            <div class="checkboxes float-left">
                {{ html()->label(html()->checkbox('remember', true, 1) . ' ' . __('labels.frontend.auth.remember_me'))->for('remember') }}
                <span class="checkmark"></span>
            </div>
            <div class="float-right mt-1">
                <a id="forgot" href="{{ route('frontend.auth.password.reset') }}">{{ __('labels.frontend.passwords.forgot_password') }}</a>
            </div>
        </div>
        <div class="text-center">
            {{ form_submit(__('labels.frontend.auth.login_button'))->class('btn_1 rounded full-width add_top_30') }}
        </div>
        <div class="text-center">
            Don’t have an account? <a href="{{route('frontend.index')}}">Sign up</a>
        </div>
    </div>
{{ html()->form()->close() }}
<!--form -->
</div>
<!-- /Sign In Popup -->