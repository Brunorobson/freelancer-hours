<div>
    <input wire:model.live="seach" />

    <br>

    @foreach ($users as $user)

    <li>{{ $user->name }}</li>

    @endforeach
</div>
