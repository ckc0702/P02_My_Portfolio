<div class="clone__dropzone">
    <div class="dropzone" id="project-dropzone[0]" data-file-name data-upload-folder="projects-img" >
        <div class="fallback">
            <input id="file[0]" name="file[0]" type="file"/>
        </div>
    </div>
    <input type="text" id="filepath[0]" name="filepath[0]" class="dropzonehidden" hidden>
    <input type="text" id="fileid[0]" name="fileid[0]" class="dropzonehidden" hidden>
</div>

<div class="__clone">
    <x-input-label for="category" :value="__('Project Category')" />
    <x-select-option id="category[0]" name="category[0]" type="text" class="mt-1 block w-full" autocomplete="category"> 
        <option value="uiux">UI/UX</option>
        <option value="frontend">Frontend</option>
        <option value="backend">Backend</option>
        <option value="fullstack">Full Stack</option>
        <option value="research">Research</option>
        <option value="ai">Artificial Intelligence</option>
    </x-select-option> 
    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
</div>

<div class="__clone">
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input id="title[0]" name="title[0]" type="text" class="mt-1 block w-full" autocomplete="title" />
    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
</div>

<div class="__clone">
    <x-input-label for="description" :value="__('Description')" />
    <x-text-input id="description[0]" name="description[0]" type="text" class="mt-1 block w-full" autocomplete="description" />
    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
</div>

<div class="__clone">
    <x-input-label for="github_link" :value="__('Github Link')" />
    <x-text-input id="github_link[0]" name="github_link[0]" type="text" class="mt-1 block w-full" autocomplete="github_link" />
    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
</div>