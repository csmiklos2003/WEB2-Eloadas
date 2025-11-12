@extends('layouts.app') {{-- vagy a te layoutod neve, pl. layouts.main --}}

@section('content')
<section id="contact" class="wrapper style1 align-center" style="padding: 2rem;">
    <div class="inner medium">
        <h2>Kapcsolatfelvétel</h2>

        {{-- Sikeres küldés után visszajelzés --}}
        @if(session('success'))
            <div class="alert alert-success" style="color: green; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="fields">
                <div class="field half">
                    <label for="name">Név</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" />
                    @error('name')
                        <small style="color:red;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="field half">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" />
                    @error('email')
                        <small style="color:red;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="field">
                    <label for="subject">Tárgy</label>
                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}" />
                    @error('subject')
                        <small style="color:red;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="field">
                    <label for="message">Üzenet</label>
                    <textarea name="message" id="message" rows="6">{{ old('message') }}</textarea>
                    @error('message')
                        <small style="color:red;">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <ul class="actions special">
                <li><button type="submit" class="button primary">Üzenet küldése</button></li>
            </ul>
        </form>
    </div>
</section>
@endsection
