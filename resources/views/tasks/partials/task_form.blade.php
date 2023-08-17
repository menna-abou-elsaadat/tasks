<!-- Name -->
<div class="mt-4">
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input :value="isset($task)?$task->name:''" id="name" class="block mt-1 w-full" type="text" name="name" autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>