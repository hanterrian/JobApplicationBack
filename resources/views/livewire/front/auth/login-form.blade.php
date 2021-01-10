<div class="grid place-items-center mx-2 my-20 sm:my-auto">
    <x-base-form action="{{route('login')}}">
        <x-form.text-field name="email" label="{{__('Email')}}" value="{{$email}}"/>
    </x-base-form>
</div>
