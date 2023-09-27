<?php
    $sessionAlert = session('alert');
?>
@if($sessionAlert)
    <div class="alert alert-{{ $sessionAlert['type'] }}">
        {{ trans("alerts.{$sessionAlert['key']}", $sessionAlert['params'] ?? []) }}
    </div>
@endif
