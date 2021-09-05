@extends('layouts.dashboard')
@section('page_title')
  Transactions
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
          <div class="widget widget-table-one">
              <div class="widget-heading">
                  <h5 class="">Transactions</h5>
              </div>
              @php
                $transactions = DB::table('transactions')->orderByDesc('id')->get();
              @endphp
              <div class="widget-content">
                @foreach ($transactions as $transaction)
                  <div class="transactions-list">
                      <div class="t-item">
                          <div class="t-company-name">
                              <div class="t-icon">
                                  <div class="icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                  </div>
                              </div>
                              <div class="t-name">
                                  <h4>{{ $transaction->username }}</h4>
                                  <p class="meta-date">{{ $transaction->created_at }}</p>
                              </div>

                          </div>
                          <div class="t-rate rate-inc">
                              <p><span>${{ $transaction->amount }}</span></p>
                          </div>
                      </div>
                  </div>
                @endforeach
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
