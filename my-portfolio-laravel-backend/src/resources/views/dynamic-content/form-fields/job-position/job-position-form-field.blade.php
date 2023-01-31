@forelse($userData->job_positions as $index => $jp)
    <div class="{{$index === 0 ? '__clone' : ''}}">
        <x-input-label for="title" :value="__('Title')" />
        <x-select-option id="title[{{$index}}]" name="title[{{$index}}]" type="text" class="mt-1 block w-full" autocomplete="title"> 
            <option value="ui" {{$jp["title"] === 'UI/UX Design' ? 'selected' : ''}}>UI/UX Design</option>
            <option value="frontend" {{$jp["title"] === 'Frontend Development' ? 'selected' : ''}}>Frontend Development</option>
            <option value="backend" {{$jp["title"] === 'Backend Development' ? 'selected' : ''}}>Backend Development</option>
            <option value="app" {{$jp["title"] === 'App Development' ? 'selected' : ''}}>App Development</option>
            <option value="ai" {{$jp["title"] === 'Artificial Intelligence' ? 'selected' : ''}}>Artificial Intelligence</option>
            <option value="animation" {{$jp["title"] === 'Animation' ? 'selected' : ''}}>Animation</option>
            <option value="data" {{$jp["title"] === 'Data Analyst' ? 'selected' : ''}}>Data Analyst</option>
        </x-select-option> 
        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    </div>

    <div class="{{$index === 0 ? '__clone' : ''}}">
        <x-input-label for="description" :value="__('Description')" />
        <x-text-input id="description[{{$index}}]" name="description[{{$index}}]" type="text" class="mt-1 block w-full" autocomplete="description" value="{{$jp['desc']}}"/>
        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    </div>
@empty
    @include('dynamic-content.form-fields.job-position.empty-job-position-form-field')
@endforelse
   