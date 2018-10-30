<!-- Modal -->
<div class="modal fade" id="{{$modalId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $btn }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ $action }}">
        <div class="modal-body">
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <label>{{ __('content.number') }}</label>
                <input type="text" class="form-control" name="number" @if(isset($invoice)) value="{{$invoice->number}}" @endif required>
              </div>
              <div class="form-group col-md-6">
                <label>{{ __('content.invoice_date') }}</label>
                <input type="date" class="form-control" name="invoice_date" @if(isset($invoice)) value="{{$invoice->invoice_date}}" @endif required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label>{{ __('content.supply_date') }}</label>
                <input type="date" class="form-control" name="supply_date" @if(isset($invoice)) value="{{$invoice->supply_date}}" @endif required>
              </div>
            </div>
            <div class="form-group">
              <label>{{ __('content.comment') }}</label>
              <textarea class="form-control" name="comment" required>@if(isset($invoice)) {{$invoice->comment}} @endif</textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('content.close') }}</button>
          <button type="submit" class="btn btn-primary">{{ $btn }}</button>
        </div>
      </form>
    </div>
  </div>
</div>
