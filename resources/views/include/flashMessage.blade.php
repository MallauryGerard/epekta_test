@if ($message = session('success'))
    <div class="toast show fade bg-success" style="position: absolute; right: 15px; top: 10px; z-index: 9999;">
        <div class="toast-body text-white bg-success">{!! $message !!}</div>
    </div>
@elseif ($message = session('error'))
    <div class="toast show fade bg-danger" style="position: absolute; right: 15px; top: 10px; z-index: 9999;">
        <div class="toast-body text-white bg-danger">{!! $message !!}</div>
    </div>
@elseif ($message = session('warning'))
    <div class="toast show fade bg-warning" style="position: absolute; right: 15px; top: 10px; z-index: 9999;">
        <div class="toast-body text-white bg-warning">{!! $message !!}</div>
    </div>
@elseif ($message = session('info'))
    <div class="toast show fade bg-info" style="position: absolute; right: 15px; top: 10px; z-index: 9999;">
        <div class="toast-body text-white bg-info">{!! $message !!}</div>
    </div>
@endif
@if (isset($errors) && $errors->any())
    <div class="toast show fade bg-danger" style="position: absolute; right: 15px; top: 10px; z-index: 9999;">
        <div class="toast-body text-white bg-danger">{{ __('Some fields are invalid') }}</div>
    </div>
@endif
