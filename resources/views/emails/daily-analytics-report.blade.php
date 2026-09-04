<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily analytics report</title>
</head>
<body style="margin:0;background:#f5f5f5;font-family:Arial,sans-serif;color:#222;">
    <div style="max-width:760px;margin:0 auto;padding:28px 16px;">
        <div style="background:#ffffff;border-radius:8px;padding:28px;">
            <h1 style="margin:0 0 6px;font-size:24px;">Daily analytics report</h1>
            <p style="margin:0 0 24px;color:#666;">{{ $date->format('l, F j, Y') }}</p>

            <div style="display:flex;gap:12px;margin-bottom:26px;">
                <div style="flex:1;background:#f2faf5;border-radius:6px;padding:16px;"><strong style="font-size:24px;">{{ number_format($visitors->count()) }}</strong><br><span style="color:#666;">Visits</span></div>
                <div style="flex:1;background:#fff3f5;border-radius:6px;padding:16px;"><strong style="font-size:24px;">{{ number_format($contacts->count()) }}</strong><br><span style="color:#666;">Contact submissions</span></div>
            </div>

            <h2 style="font-size:18px;margin:0 0 12px;">Visits by location</h2>
            <table style="width:100%;border-collapse:collapse;margin-bottom:28px;font-size:14px;">
                <thead><tr style="background:#f4f4f4;text-align:left;"><th style="padding:9px;border:1px solid #ddd;">Country</th><th style="padding:9px;border:1px solid #ddd;">State</th><th style="padding:9px;border:1px solid #ddd;">City</th><th style="padding:9px;border:1px solid #ddd;">Area</th><th style="padding:9px;border:1px solid #ddd;">Visits</th></tr></thead>
                <tbody>
                    @forelse ($locations as $location)
                        <tr><td style="padding:9px;border:1px solid #ddd;">{{ $location->country }}</td><td style="padding:9px;border:1px solid #ddd;">{{ $location->state }}</td><td style="padding:9px;border:1px solid #ddd;">{{ $location->city }}</td><td style="padding:9px;border:1px solid #ddd;">{{ $location->area }}</td><td style="padding:9px;border:1px solid #ddd;">{{ number_format($location->total) }}</td></tr>
                    @empty
                        <tr><td colspan="5" style="padding:12px;border:1px solid #ddd;color:#666;">No visits were recorded.</td></tr>
                    @endforelse
                </tbody>
            </table>

            <h2 style="font-size:18px;margin:0 0 12px;">Contact form submissions</h2>
            @forelse ($contacts as $contact)
                <div style="border:1px solid #ddd;border-radius:6px;padding:16px;margin-bottom:12px;">
                    <strong>{{ $contact->fullname }}</strong> &middot; <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>@if($contact->phone) &middot; {{ $contact->phone }}@endif<br>
                    <span style="color:#666;font-size:13px;">{{ $contact->created_at->format('g:i A') }} &middot; {{ $contact->country ?: 'Unknown' }}, {{ $contact->state ?: 'Unknown' }}, {{ $contact->city ?: 'Unknown' }}, {{ $contact->area ?: 'Unknown' }}</span>
                    <p style="margin:10px 0 4px;"><strong>{{ $contact->subject }}</strong></p>
                    <p style="margin:0;white-space:pre-line;">{{ $contact->message }}</p>
                </div>
            @empty
                <p style="color:#666;">No contact forms were submitted.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
