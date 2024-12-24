@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'modal-sm',
    'md' => 'modal-md',
    'lg' => 'modal-lg',
    'xl' => 'modal-xl',
    '2xl' => 'modal-2xl',
][$maxWidth];
@endphp

<div class="modal fade" id="{{ $name }}" tabindex="-1" role="dialog" aria-labelledby="{{ $name }}Label" aria-hidden="true">
    <div class="modal-dialog {{ $maxWidth }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $name }}Label">{{ $name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
