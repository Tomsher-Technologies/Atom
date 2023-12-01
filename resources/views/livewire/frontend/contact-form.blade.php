<form wire:submit="send()" class=" vlt-contact-form--style-2">
    <div class="vlt-form-row two-col">
        <div class="vlt-form-group">
            <input class="vlt-form-control" type="text" name="name" wire:model="name" required="required"
                placeholder=" ">
            <label class="vlt-form-label">{{ __('Your name') }}*</label>
            @error('name')
                <div class="danger text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="vlt-form-group">
            <input class="vlt-form-control" type="email" name="email" wire:model="email" required="required"
                placeholder=" ">
            <label class="vlt-form-label">{{ __('Email address') }}*</label>
            @error('email')
                <div class="danger text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="vlt-form-row two-col">
        <div class="vlt-form-group">
            <input class="vlt-form-control" type="tel" name="phone" wire:model="phone_number" placeholder=" ">
            <label class="vlt-form-label">{{ __('Phone number') }}*</label>
            @error('phone_number')
                <div class="danger text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="vlt-form-group">
            <input class="vlt-form-control" type="text" name="company" wire:model="company" placeholder=" ">
            <label class="vlt-form-label">{{ __('Company') }}</label>
        </div>
    </div>
    <div class="vlt-form-group">
        <input class="vlt-form-control" type="text" name="subject" wire:model="subject" placeholder=" ">
        <label class="vlt-form-label">{{ __('Subject') }}</label>
    </div>
    <div class="vlt-form-group">
        <textarea class="vlt-form-control" name="m_messages" rows="5" wire:model="m_messages" placeholder=" "></textarea>
        <label class="vlt-form-label">{{ __('Message') }}*</label>
        @error('m_messages')
            <div class="danger text-danger">{{ $message }}</div>
        @enderror
    </div>
    @if (session()->has('thankyou'))
        <div class="text-success success">
            {{ session('thankyou') }}
        </div>
    @endif
    <div class="vlt-gap-40"></div>
    <!--Button-->
    <button class="vlt-btn vlt-btn--secondary vlt-btn--lg" wire:loading.attr="disabled"
        type="submit"><i class="fa fa-spinner fa-spin hide"></i>{{ __('Submit') }}</button>
</form>

