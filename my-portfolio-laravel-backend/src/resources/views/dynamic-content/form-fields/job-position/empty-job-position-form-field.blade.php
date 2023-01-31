<div class="__clone">
    <x-input-label for="title" :value="__('Title')" />
    <x-select-option id="title[0]" name="title[0]" type="text" class="mt-1 block w-full" autocomplete="title"> 
        <option value="ui">UI/UX Design</option>
        <option value="frontend">Frontend Development</option>
        <option value="backend">Backend Development</option>
        <option value="app">App Development</option>
        <option value="ai">Artificial Intelligence</option>
        <option value="animation">Animation</option>
        <option value="data">Data Analyst</option>
    </x-select-option> 
    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
</div>

<div class="__clone">
    <x-input-label for="description" :value="__('Description')" />
    <x-text-input id="description[0]" name="description[0]" type="text" class="mt-1 block w-full" autocomplete="description"/>
    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
</div>
 
