<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><title>{{ ucfirst($period) }} analytics report</title></head>
<body style="margin:0;background:#f5f5f5;font-family:Arial,sans-serif;color:#222;">
<div style="max-width:620px;margin:0 auto;padding:28px 16px;"><div style="background:#fff;border-radius:8px;padding:28px;">
    <h1 style="margin:0 0 8px;font-size:24px;">{{ ucfirst($period) }} analytics report</h1>
    <p style="margin:0 0 20px;color:#666;">{{ $start->format('F j, Y') }} – {{ $end->format('F j, Y') }}</p>
    <p style="margin:0 0 16px;line-height:1.6;">The complete filter-ready report is attached as a CSV. Open it in Excel and enable filters on the header row to filter by country, state, city, postal code, area, IP address, or record type.</p>
    <p style="margin:0;color:#444;"><strong>{{ number_format($visitors->count()) }}</strong> visits &middot; <strong>{{ number_format($contacts->count()) }}</strong> contact submissions</p>
</div></div>
</body></html>
