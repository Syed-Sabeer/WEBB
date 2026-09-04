@extends('layouts.app.master')

@section('title', 'Visitor Locations')

@section('css')
<style>
  .location-row{padding:14px 0;border-bottom:1px solid #eee}.location-row:last-child{border-bottom:0}.location-link{display:block;color:inherit}.location-link:hover strong{color:#198754}.location-meta{display:flex;justify-content:space-between;align-items:center;gap:14px;margin-bottom:8px}.location-meta strong{color:#222}.location-meta span{color:#777;font-size:12px;white-space:nowrap}.location-meta .next-arrow{margin-left:8px;color:#198754;font-size:18px}.location-card .progress{height:7px;background:#f0f0f0}.location-card .progress-bar{min-width:2px;background:#198754}.location-breadcrumbs{display:flex;flex-wrap:wrap;gap:7px;align-items:center;margin-bottom:20px}.location-breadcrumbs a{color:#198754}.location-breadcrumbs span::before{content:'›';margin-right:7px;color:#aaa}
</style>
@endsection

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6"><h3>Visitor Locations</h3></div>
        <div class="col-sm-6"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li><li class="breadcrumb-item active">Visitor Locations</li></ol></div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="location-breadcrumbs">
      <a href="{{ route('admin.dashboard', ['period' => $period]) }}">Countries</a>
      @foreach ($selections as $parameter => $selection)
        @php($selectionParameters = array_slice($selections, 0, $loop->iteration, true))
        <span>
          @if (! $loop->last)
            <a href="{{ route('admin.dashboard.visitor-locations', array_merge(['period' => $period], $selectionParameters)) }}">{{ $selection }}</a>
          @else
            {{ $selection }}
          @endif
        </span>
      @endforeach
    </div>

    <div class="card location-card">
      <div class="card-header card-no-border">
        <h5>{{ $levelLabel }} in {{ last($selections) }}</h5>
        <p class="mb-0 text-muted">{{ $periodLabel }} &middot; Percentages are based on {{ number_format($total) }} total visits</p>
      </div>
      <div class="card-body pt-0">
        @forelse ($nodes as $node)
          <div class="location-row">
            @php($target = array_merge(['period' => $period], $selections, [$nextParameter => $node->label]))
            @if ($nextParameter !== 'area')
              <a class="location-link" href="{{ route('admin.dashboard.visitor-locations', $target) }}">
            @endif
              <div class="location-meta">
                <strong>{{ $node->label }} @if ($nextParameter !== 'area')<span class="next-arrow">›</span>@endif</strong>
                <span>{{ number_format($node->total) }} visits &middot; {{ number_format($node->percentage, 1) }}%</span>
              </div>
              <div class="progress" role="progressbar" aria-label="{{ $node->label }} visits" aria-valuenow="{{ $node->percentage }}" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar" style="width: {{ $node->percentage }}%"></div></div>
            @if ($nextParameter !== 'area')
              </a>
            @endif
          </div>
        @empty
          <p class="text-muted mb-0">No {{ strtolower($levelLabel) }} data is available for this selection.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection
