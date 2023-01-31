@forelse($userData->projects as $index => $p)

    @if($index > 0)
        <hr style="border: solid 1px; border-color: blueviolet"/>
    @endif
    
    <div class="{{$index === 0 ? '__clone' : ''}}">
        <div class="dropzone" id="project-dropzone[{{$index}}]" data-file-name="{{$p['filename']}}" data-upload-folder="projects-img">
            <div class="fallback">
                <input id="file[{{$index}}]" name="file[{{$index}}]" type="file"/>
            </div>
        </div>
        <input type="text" id="filepath[{{$index}}]" name="filepath[{{$index}}]" class="dropzonehidden" hidden>
        <input type="text" id="fileid[{{$index}}]" name="fileid[{{$index}}]" class="dropzonehidden" value="{{$p['fileid']}}" hidden>
    </div>

    <div class="{{$index === 0 ? '__clone' : ''}}">
        <x-input-label for="category" :value="__('Project Category')" />
        <x-select-option id="category[{{$index}}]" name="category[{{$index}}]" type="text" class="mt-1 block w-full" autocomplete="category"> 
            <option value="uiux" {{$p["category"] === 'uiux' ? 'selected' : ''}}>UI/UX</option>
            <option value="frontend" {{$p["category"] === 'frontend' ? 'selected' : ''}}>Frontend</option>
            <option value="backend" {{$p["category"] === 'backend' ? 'selected' : ''}}>Backend</option>
            <option value="fullstack" {{$p["category"] === 'fullstack' ? 'selected' : ''}}>Full Stack</option>
            <option value="research" {{$p["category"] === 'research' ? 'selected' : ''}}>Research</option>
            <option value="ai" {{$p["category"] === 'ai' ? 'selected' : ''}}>Artificial Intelligence</option>
        </x-select-option> 
        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
    </div>

    <div class="{{$index === 0 ? '__clone' : ''}}">
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title[{{$index}}]" name="title[{{$index}}]" type="text" class="mt-1 block w-full" autocomplete="title" value="{{$p['title']}}"/>
        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
    </div>

    <div class="{{$index === 0 ? '__clone' : ''}}">
        <x-input-label for="description" :value="__('Description')" />
        <x-text-input id="description[{{$index}}]" name="description[{{$index}}]" type="text" class="mt-1 block w-full" autocomplete="description" value="{{$p['desc']}}"/>
        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    </div>

    <div class="{{$index === 0 ? '__clone' : ''}}">
        <x-input-label for="github_link" :value="__('Github Link')" />
        <x-text-input id="github_link[{{$index}}]" name="github_link[{{$index}}]" type="text" class="mt-1 block w-full" autocomplete="github_link" value="{{$p['github']}}"/>
        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    </div>
@empty
    @include('dynamic-content.form-fields.projects.empty-projects-form-field')
@endforelse
   