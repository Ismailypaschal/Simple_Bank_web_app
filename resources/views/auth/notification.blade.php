{{-- resources/views/user/notification.blade.php --}}
@if (Auth::check() && ! Auth::user()->hasVerifiedEmail())
<div style="border:1px solid #d1d5db; background:#fff7ed; padding:16px; border-radius:6px; color:#92400e; max-width:720px; margin:12px auto;">
    <strong style="display:block; margin-bottom:8px; font-size:16px;">
        Notification — Email verification required
    </strong>

    <p style="margin:0 0 12px;">
        Please verify your email address to access all features. A verification link was sent to
        <span style="font-weight:600;">{{ Auth::user()->email }}</span>.
    </p>

    @if (session('status') === 'verification-link-sent')
        <p style="margin:0 0 12px; color:#065f46; background:#ecfdf5; padding:8px; border-radius:4px;">
            A new verification link has been sent to your email address.
        </p>
    @endif

    <div style="display:flex; gap:8px; flex-wrap:wrap; margin-top:8px;">
        <form method="POST" action="{{ route('verification.send') }}" style="display:inline;">
            @csrf
            <button type="submit" style="background:#0ea5a3; color:#fff; border:none; padding:8px 12px; border-radius:4px; cursor:pointer;">
                Resend verification email
            </button>
        </form>

        {{-- <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" style="background:#ef4444; color:#fff; border:none; padding:8px 12px; border-radius:4px; cursor:pointer;">
                Log out
            </button>
        </form> --}}
    </div>
</div>
@endif