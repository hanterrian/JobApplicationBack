<div class="row justify-content-center">
    <div class="col-lg-6">
        @foreach($messages as $message)
            @if(Auth::id() === $message->user_id)
                <div class="alert alert-success">
                    {{ $message->message }}
                </div>
            @else
                <div class="alert alert-info">
                    {{ $message->message }}
                </div>
            @endif
        @endforeach
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <form wire:submit.prevent="send" method="post">
            <x-form.textarea-field name="message" label="{{ __('Message') }}" wire:model.lazy="message.message"/>
            <x-form.submit-field label="{{ __('Send') }}"/>
        </form>
    </div>
</div>
