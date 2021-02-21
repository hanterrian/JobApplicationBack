<div>
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
                <div class="form-group">
                    <label for="chat_message">{{ __('Message') }}</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="chat_message" name="message" wire:model.lazy="message"></textarea>
                    @error('message')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <x-form.submit-field label="{{ __('Send') }}"/>
            </form>
        </div>
    </div>
</div>
