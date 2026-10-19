{{--
    Enquiry form block: { type: enquiry-form, title, intro? }
    Posts to enquiries.store; submissions appear in the admin panel and
    trigger the admin and customer emails. ?product=… prefills "Interested in".
--}}
@props(['block'])

@php
    $field = 'block h-12 w-full rounded-sm border border-line-strong bg-surface px-4 text-[0.9375rem] text-ink placeholder:text-stone-500 transition-colors focus:border-brand focus:outline-2 focus:outline-offset-0 focus:outline-brand/30 aria-invalid:border-red-700';
    $label = 'text-sm font-semibold text-ink';
    $error = 'text-sm text-red-700';
@endphp

<div id="enquiry" class="grid scroll-mt-28 gap-12 lg:grid-cols-12 lg:gap-16">
    <div class="flex flex-col gap-6 lg:col-span-5">
        <x-ui.section-heading :title="$block['title']" :intro="$block['intro'] ?? null" />
        <ul data-reveal class="flex flex-col gap-3 text-[0.9375rem] text-ink-soft">
            <li class="flex gap-3"><x-ui.icon name="check" class="mt-0.5 size-5 text-brand-ink" /> The stone name or colour, or what it’s for</li>
            <li class="flex gap-3"><x-ui.icon name="check" class="mt-0.5 size-5 text-brand-ink" /> Measurements, finish and edge profile</li>
            <li class="flex gap-3"><x-ui.icon name="check" class="mt-0.5 size-5 text-brand-ink" /> Your town in Kutch</li>
        </ul>
        <p data-reveal class="text-sm text-ink-soft">We reply by phone or WhatsApp with today’s rate.</p>
    </div>

    <div data-reveal class="rounded-sm border border-line bg-surface p-6 md:p-8 lg:col-span-7">
        @if (session('enquiry_sent'))
            <div role="status" class="flex flex-col items-start gap-4 py-6">
                <span class="grid size-12 place-items-center rounded-full bg-surface-tint text-brand-ink">
                    <x-ui.icon name="seal-check" class="size-6" />
                </span>
                <h3 class="text-3xl leading-tight">Thank you, we have your enquiry</h3>
                <p class="max-w-[48ch] text-ink-soft">We will call or WhatsApp you soon with today’s rate. For a faster reply, message us on WhatsApp now.</p>
                <x-ui.whatsapp-button />
            </div>
        @else
            <form method="POST" action="{{ route('enquiries.store') }}" class="grid gap-6 sm:grid-cols-2" novalidate>
                @csrf

                <div class="flex flex-col gap-2">
                    <label for="enquiry-name" class="{{ $label }}">Name</label>
                    <input id="enquiry-name" name="name" type="text" autocomplete="name" required maxlength="120" value="{{ old('name') }}" @error('name') aria-invalid="true" aria-describedby="enquiry-name-error" @enderror class="{{ $field }}">
                    @error('name') <p id="enquiry-name-error" class="{{ $error }}">{{ $message }}</p> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="enquiry-phone" class="{{ $label }}">Phone or WhatsApp</label>
                    <input id="enquiry-phone" name="phone" type="tel" autocomplete="tel" inputmode="tel" required maxlength="20" value="{{ old('phone') }}" @error('phone') aria-invalid="true" aria-describedby="enquiry-phone-error" @enderror class="{{ $field }}">
                    @error('phone') <p id="enquiry-phone-error" class="{{ $error }}">{{ $message }}</p> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="enquiry-email" class="{{ $label }}">Email <span class="font-normal text-ink-soft">(optional)</span></label>
                    <input id="enquiry-email" name="email" type="email" autocomplete="email" maxlength="190" value="{{ old('email') }}" aria-describedby="enquiry-email-help @error('email') enquiry-email-error @enderror" @error('email') aria-invalid="true" @enderror class="{{ $field }}">
                    <p id="enquiry-email-help" class="text-[0.8125rem] text-ink-soft">For a copy of your enquiry.</p>
                    @error('email') <p id="enquiry-email-error" class="{{ $error }}">{{ $message }}</p> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="enquiry-town" class="{{ $label }}">Town <span class="font-normal text-ink-soft">(optional)</span></label>
                    <input id="enquiry-town" name="town" type="text" autocomplete="address-level2" maxlength="80" value="{{ old('town') }}" class="{{ $field }}">
                </div>

                <div class="flex flex-col gap-2 sm:col-span-2">
                    <label for="enquiry-interest" class="{{ $label }}">Interested in <span class="font-normal text-ink-soft">(optional)</span></label>
                    <input id="enquiry-interest" name="interested_in" type="text" maxlength="120" placeholder="For example Black Galaxy granite for a kitchen" value="{{ old('interested_in', request('product')) }}" class="{{ $field }}">
                </div>

                <div class="flex flex-col gap-2 sm:col-span-2">
                    <label for="enquiry-message" class="{{ $label }}">Message</label>
                    <textarea id="enquiry-message" name="message" rows="5" required maxlength="2000" @error('message') aria-invalid="true" aria-describedby="enquiry-message-error" @enderror class="{{ $field }} h-auto py-3">{{ old('message') }}</textarea>
                    @error('message') <p id="enquiry-message-error" class="{{ $error }}">{{ $message }}</p> @enderror
                </div>

                {{-- Honeypot: hidden from people and assistive tech --}}
                <div class="hidden" aria-hidden="true">
                    <label for="enquiry-website">Leave this empty</label>
                    <input id="enquiry-website" name="website" type="text" tabindex="-1" autocomplete="off">
                </div>

                @error('website') <p class="{{ $error }} sm:col-span-2">{{ $message }}</p> @enderror

                <div class="flex flex-wrap items-center gap-4 sm:col-span-2">
                    <x-ui.button type="submit" icon-trailing="arrow-right">Send enquiry</x-ui.button>
                    <p class="text-[0.8125rem] text-ink-soft">We only use your details to reply to this enquiry.</p>
                </div>
            </form>
        @endif
    </div>
</div>
