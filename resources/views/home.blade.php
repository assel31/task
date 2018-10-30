@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        @auth
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('content.actions') }}</div>

                    <div class="card-body">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#new">{{ __('content.add') }}</button>
                        @include('modal', ['modalId' => 'new', 'action' => route('invoices'), 'btn' => __('content.add')])
                    </div>
                </div>
            </div>
            <br />
        @endauth
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('content.invoices') }}</div>

                <div class="card-body table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">{{ __('content.invoice_date') }}</th>
                        <th scope="col">{{ __('content.number') }}</th>
                        <th scope="col">{{ __('content.supply_date') }}</th>
                        <th scope="col">{{ __('content.comment') }}</th>
                        @auth
                          <th scope="col">{{ __('content.edit') }}</th>
                          @if(Auth::user()->isAdmin())
                            <th scope="col">{{ __('content.delete') }}</th>
                          @endif
                        @endauth
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($invoices as $invoice)
                        <tr>
                          <td>{{ $invoice->invoice_date }}</td>
                          <td>{{ $invoice->number }}</td>
                          <td>{{ $invoice->supply_date }}</td>
                          <td>{{ $invoice->comment }}</td>
                          @auth
                            <td>
                              <button class="btn btn-primary" data-toggle="modal" data-target="#editInvoiceModal{{$invoice->id}}">{{ __('content.edit') }}</button>
                              @include('modal', ['modalId' => 'editInvoiceModal'.$invoice->id, 'action' => route('update.invoice', $invoice->id), 'btn' => __('content.edit'), 'invoice' => $invoice])
                            </td>
                            @if(Auth::user()->isAdmin())
                                <td>
                                  <button class="btn btn-danger" data-toggle="modal" data-target="#removeInvoiceModal{{$invoice->id}}">{{ __('content.delete') }}</button>
                                  <div class="modal fade" id="removeInvoiceModal{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">{{ __('content.delete') }}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <form method="POST" action="{{ route('remove.invoice', $invoice->id) }}">
                                              @csrf
                                            <div class="modal-body">
                                                {{ __('content.delete') }} {{$invoice->number}}?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('content.close') }}</button>
                                              <button type="submit" class="btn btn-danger">{{ __('content.delete') }}</button>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                            @endif
                          @endauth
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
