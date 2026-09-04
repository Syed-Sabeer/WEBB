<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><title>Daily analytics report</title>
<style>
@page{margin:28px}body{margin:0;font-family:DejaVu Sans,sans-serif;color:#222;font-size:11px}h1{margin:0 0 4px;font-size:22px}h2{margin:24px 0 9px;font-size:15px}.date{margin:0 0 18px;color:#666}.summary{width:100%;margin-bottom:18px;border-collapse:separate;border-spacing:8px 0}.summary td{width:50%;padding:14px;background:#f3f8f5}.summary td:last-child{background:#fff3f5}.number{font-size:20px;font-weight:bold}table.data{width:100%;border-collapse:collapse}table.data th{padding:7px;border:1px solid #ccc;background:#eee;text-align:left}table.data td{padding:7px;border:1px solid #ddd;vertical-align:top}.contact{margin-bottom:11px;padding:10px;border:1px solid #ddd;page-break-inside:avoid}.muted{color:#666;font-size:10px}.message{margin:7px 0 0;white-space:pre-line}.empty{padding:12px;border:1px solid #ddd;color:#666}
</style></head><body>
<h1>Avrio Global daily analytics report</h1><p class="date">{{ $date->format('l, F j, Y') }}</p>
<table class="summary"><tr><td><span class="number">{{ number_format($visitors->count()) }}</span><br>Visits</td><td><span class="number">{{ number_format($contacts->count()) }}</span><br>Contact submissions</td></tr></table>
<h2>Visits by location</h2><table class="data"><thead><tr><th>Country</th><th>State</th><th>City</th><th>Area</th><th>Visits</th></tr></thead><tbody>
@forelse($locations as $location)<tr><td>{{ $location->country }}</td><td>{{ $location->state }}</td><td>{{ $location->city }}</td><td>{{ $location->area }}</td><td>{{ number_format($location->total) }}</td></tr>@empty<tr><td colspan="5" class="empty">No visits were recorded.</td></tr>@endforelse
</tbody></table><h2>Contact form submissions</h2>
@forelse($contacts as $contact)<div class="contact"><strong>{{ $contact->fullname }}</strong> &middot; {{ $contact->email }}@if($contact->phone) &middot; {{ $contact->phone }}@endif<br><span class="muted">{{ $contact->created_at->format('g:i A') }} &middot; {{ $contact->country ?: 'Unknown' }}, {{ $contact->state ?: 'Unknown' }}, {{ $contact->city ?: 'Unknown' }}, {{ $contact->area ?: 'Unknown' }}</span><br><strong>{{ $contact->subject }}</strong><p class="message">{{ $contact->message }}</p></div>@empty<p class="empty">No contact forms were submitted.</p>@endforelse
</body></html>
