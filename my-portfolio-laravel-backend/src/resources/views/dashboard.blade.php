<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{-- PORTFOLIO EDIT --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                @php
                    $user = Auth::user();
                    $aboutMe = $user->aboutMe;
                    $userData = $user->userData;
                    // $projectImages = $user->projectsImages;
                @endphp

                {{-- About Me Section --}}
                <div id="about-me-section" class="section">
                    <h1 class="about-me-section__heading text-center fw-bolder">About Me Information</h1>
                    <form method="post" action="{{ route('aboutme.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                
                        <div>
                            <x-input-label for="about_experience" :value="__('Working experience')" />
                            <x-text-input id="about_experience" name="about_experience" type="text" class="mt-1 block w-full" autocomplete="about_experience" placeholder="Enter number only. e.g 0.6 years if less than 1 year" value="{{$aboutMe !== null ? preg_replace('/[^0-9]/', '', $aboutMe->about_experience) : ''}}"/>
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="about_qualification" :value="__('Highest Qualification')" />
                            <x-select-option id="about_qualification" name="about_qualification" type="text" class="mt-1 block w-full" autocomplete="about_qualification"  value="{{$aboutMe !== null ? $aboutMe->about_qualification : ''}}"> 
                                <option value="diploma">Diploma</option>
                                <option value="degree">Degree</option>
                                <option value="master">Master Degree</option>
                                <option value="phd">Phd</option>
                            </x-select-option> 
                        </div>
                        
                        <div>
                            <x-input-label for="about_qualification_title" :value="__('Field Of Study For Qualification')" />
                            <x-text-input id="about_qualification_title" name="about_qualification_title" type="text" class="mt-1 block w-full" autocomplete="about_qualification_title" placeholder="Master of Science In Artificial Intelligence"  value="{{$aboutMe !== null ? explode('.', $aboutMe->about_qualification)[1] : ''}}"/>
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="about_projects" :value="__('Amount Of Projects Completed')" />
                            <x-text-input id="about_projects" name="about_projects" type="text" class="mt-1 block w-full" autocomplete="about_projects" placeholder="Enter number only"  value="{{$aboutMe !== null ?  preg_replace('/[^0-9]/', '', $aboutMe->about_projects) : ''}}"/>
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                
                        <div>
                            <x-input-label for="about_me_description_1" :value="__('About Me Description Paragraph 1')" />
                            <x-text-input id="about_me_description_1" name="about_me_description_1" type="text" class="mt-1 block w-full" autocomplete="about-me-description-1"  value="{{$aboutMe !== null ? $aboutMe->about_text_1 : ''}}"/>
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                
                        <div>
                            <x-input-label for="about_me_description_2" :value="__('About Me Description Paragraph 2')" />
                            <x-text-input id="about_me_description_2" name="about_me_description_2" type="text" class="mt-1 block w-full" autocomplete="about-me-description-2"  value="{{$aboutMe !== null ? $aboutMe->about_text_2 : ''}}"/>
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="age" :value="__('Age')" />
                            <x-text-input id="age" name="age" type="text" class="mt-1 block w-full" autocomplete="age" placeholder="Enter number only"  value="{{$aboutMe !== null ? $aboutMe->age : ''}}"/>
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="self_introduction" :value="__('Self Introduction')" />
                            <x-text-input id="self_introduction" name="self_introduction" type="text" class="mt-1 block w-full" autocomplete="self-introduction"  value="{{$aboutMe !== null ? $aboutMe->self_introduction : ''}}"/>
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                
                            @if (session('status') === 'about-me-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
                
                {{-- Job Position Section --}}
                <div id="role-section" class="mt-4 section" data-count="{{$userData ? sizeof($userData->job_positions)-1 : 0}}">
                    <div style="display: flex; justify-content:end">
                        <x-secondary-button onclick="cloneField(this)">{{ __('Add Position') }}</x-secondary-button>
                    </div>
                    <h1 class="role-section__heading text-center fw-bolder">Job Position Information</h1>
                    <form method="post" action="{{ route('userData.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <input type="text" class="role" name="section_identifier" value="roles" hidden/>

                        @if($userData)
                            @include('dynamic-content.form-fields.job-position.job-position-form-field')
                        @else
                            @include('dynamic-content.form-fields.job-position.empty-job-position-form-field')
                        @endif

                        <div class="flex items-center gap-4 here__clone">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
            
                            @if (session('status') === 'roles-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>


                {{-- Projects Section --}}
                <div id="project-section" class="mt-4 section" data-count="{{$userData ? sizeof($userData->projects)-1 : 0}}">
                    <div style="display: flex; justify-content:end">
                        <x-secondary-button onclick="cloneField(this)">{{ __('Add Project') }}</x-secondary-button>
                    </div>
                    <h1 class="project-section__heading text-center fw-bolder">My Projects Information</h1>
                    <form method="post" action="{{ route('userData.update') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <input type="text" class="role" name="section_identifier" value="projects" hidden/>

                        @if($userData)
                            @include('dynamic-content.form-fields.projects.projects-form-field')
                        @else
                            @include('dynamic-content.form-fields.projects.empty-projects-form-field')
                        @endif
                
                        <div class="flex items-center gap-4 here__clone">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                
                            @if (session('status') === 'projects-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>


                {{-- Skills Section --}}
                <div id="skill-section" class="mt-4 section" data-count="{{$userData ? sizeof($userData->skills)-1 : 0}}">
                    <div style="display: flex; justify-content:end">
                        <x-secondary-button onclick="cloneField(this)">{{ __('Add Skill') }}</x-secondary-button>
                    </div>
                    <h1 class="skill-section__heading text-center fw-bolder">My Skills Information</h1>
                    <form method="post" action="{{ route('aboutme.update') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div class="clone__dropzone">
                            <div class="dropzone" id="skill-dropzone[0]" data-filename="skill-img">
                                <div class="fallback">
                                    <input id="file[0]" name="file[0]" type="file"/>
                                </div>
                            </div>
                        </div>

                        <div class="__clone">
                            <x-input-label for="name" :value="__('Skill Name')" />
                            <x-text-input id="name[0]" name="name[0]" type="text" class="mt-1 block w-full" autocomplete="name" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="__clone">
                            <x-input-label for="rating" :value="__('Skill Proficient')" />
                            <x-select-option id="rating[0]" name="rating[0]" type="text" class="mt-1 block w-full" autocomplete="rating"> 
                                <option value="1">1/5, understand the basics, need time to apply on problem solving</option>
                                <option value="2">2/5, able to solve basic problems</option>
                                <option value="3">3/5, able solve general problems and know where to find resources</option>
                                <option value="4">4/5, able to solve most problems if have resources</option>
                                <option value="5">5/5, able to solve most problems efficiently.</option>
                            </x-select-option> 
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>
                
                        <div class="__clone">
                            <x-input-label for="description" :value="__('Skill Description')" />
                            <x-text-input id="description[0]" name="description[0]" type="text" class="mt-1 block w-full" autocomplete="description" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center gap-4 here__clone">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                
                            @if (session('status') === 'skills-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>



                {{-- FAQS Section --}}
                <div id="faqs-section" class="mt-4 section" data-count="{{$userData ? sizeof($userData->faqs)-1 : 0}}">
                    <div style="display: flex; justify-content:end">
                        <x-secondary-button onclick="cloneField(this)">{{ __('Add Frequently Asked Question') }}</x-secondary-button>
                    </div>
                    <h1 class="faqs-section__heading text-center fw-bolder">My FAQs</h1>
                    <form method="post" action="{{ route('aboutme.update') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div class="__clone">
                            <x-input-label for="question" :value="__('Question')" />
                            <x-text-input id="question[0]" name="question[0]" type="text" class="mt-1 block w-full" autocomplete="question" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="__clone">
                            <x-input-label for="answer" :value="__('Answer')" />
                            <x-text-input id="answer[0]" name="answer[0]" type="text" class="mt-1 block w-full" autocomplete="answer" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center gap-4 here__clone">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                
                            @if (session('status') === 'faqs-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>



                {{-- Social Media Section --}}
                <div id="contact-section" class="mt-4 section">
                    <h1 class="contact-section__heading text-center fw-bolder">My Social Media & Contact</h1>
                    <form method="post" action="{{ route('aboutme.update') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div class="__clone">
                            <x-input-label for="whatsapp" :value="__('Whatsapp Link')" />
                            <x-text-input id="whatsapp" name="whatsapp" type="text" class="mt-1 block w-full" autocomplete="whatsapp" value="https://www.whatsapp.com/"/>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="__clone">
                            <x-input-label for="dribble" :value="__('Dribble Link')" />
                            <x-text-input id="dribble" name="dribble" type="text" class="mt-1 block w-full" autocomplete="dribble" value="https://dribbble.com/"/>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="__clone">
                            <x-input-label for="twitter" :value="__('Twitter Link')" />
                            <x-text-input id="twitter" name="twitter" type="text" class="mt-1 block w-full" autocomplete="twitter" value="https://twitter.com/"/>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="__clone">
                            <x-input-label for="instagram" :value="__('Instagram Link')" />
                            <x-text-input id="instagram" name="instagram" type="text" class="mt-1 block w-full" autocomplete="instagram" value="https://www.instagram.com/"/>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="__clone">
                            <x-input-label for="github" :value="__('Github Link')" />
                            <x-text-input id="github" name="github" type="text" class="mt-1 block w-full" autocomplete="github" value="https://github.com/"/>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="__clone">
                            <x-input-label for="facebook" :value="__('Facebook Link')" />
                            <x-text-input id="facebook" name="facebook" type="text" class="mt-1 block w-full" autocomplete="facebook" value="https://www.facebook.com/"/>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4 here__clone">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                
                            @if (session('status') === 'faqs-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        delegateEvent();
    });

    function delegateEvent() {
        document.querySelectorAll(".dropzone").forEach(element => {
            const dropzone = initializeImageOnlyDropzone(element.id);
            createMockFile(dropzone);
        })
        
    }

    function createMockFile(dropzone) {
        console.log(dropzone);
    }

    function cloneField(ele) { 
        const section = ele.parentElement.parentElement;
        const count = Number(section.getAttribute('data-count')) + 1;
        const toCloneField = section.querySelectorAll('.__clone');
        const toCloneDropzone = section.getElementsByClassName('clone__dropzone')[0];
        const clonePosition = section.getElementsByClassName('here__clone')[0];

        const divider = document.createElement('hr');
        divider.className = `__cloned${count}`;
        divider.style.border = "solid 1px";
        divider.style.borderColor = "blueviolet";
        section.setAttribute('data-count', count);
        clonePosition.parentNode.insertBefore(divider, clonePosition);

        // add delete button for cloned field
        const delBtnDiv = document.createElement('div');
        delBtnDiv.className = `__cloned${count}`;
        delBtnDiv.style.display = "flex";
        delBtnDiv.style.justifyContent = "end";
        const delBtn = document.createElement('button');
        delBtn.type="button";
        delBtn.style.color = "red";
        delBtn.innerHTML = "X";
        delBtn.onclick = function () {
            deleteClonedField(this, count);
        };
        delBtnDiv.appendChild(delBtn);
        clonePosition.parentNode.insertBefore(delBtnDiv, clonePosition);

        // clone dropzone
        if(toCloneDropzone) {
            var dropzoneClone = toCloneDropzone.cloneNode(true);
            dropzoneClone.classList.remove('clone__dropzone');
            dropzoneClone.classList.add(`__cloned${count}`);
            const currentDropzone = dropzoneClone.getElementsByClassName('dropzone')[0];
            const defaultDropzoneId = currentDropzone.id.split('[')[0];
            currentDropzone.id = defaultDropzoneId + `[${count}]`;
            clonePosition.parentNode.insertBefore(dropzoneClone, clonePosition);

            // reset dropzone filepath & fileid value
            const dropzoneHiddenInput = dropzoneClone.getElementsByClassName('dropzonehidden');
            dropzoneValue.forEach(hiddenInputElement => {
                defaultInputName = hiddenInputElement.name.split('[')[0];
                hiddenInputElement.name = defaultInputName + `[${count}]`;
                hiddenInputElement.id = hiddenInputElement.name;
                hiddenInputElement.value = "";
            });

            // re-bind newly cloned dropzone
            initializeImageOnlyDropzone(currentDropzone.id);
        }
        
        // clone input field
        toCloneField.forEach(element => {
            
            var clone = element.cloneNode(true);
            clone.classList.remove('__clone');
            clone.classList.add(`__cloned${count}`);

            var currentInputField = clone.querySelector('input');

            if(!currentInputField) {
                currentInputField = clone.querySelector('select');
                currentInputField.selectedIndex = 0;
            }else {
                currentInputField.value = "";
            }
         
            const defaultName = currentInputField.name.split('[')[0];
            currentInputField.name = defaultName + `[${count}]`;
            currentInputField.id = currentInputField.name;

            clonePosition.parentNode.insertBefore(clone, clonePosition);

        });
    }

    function deleteClonedField(ele, clonedIndex) {

        const section = ele.parentElement.parentElement.parentElement;

        $(`.__cloned${clonedIndex}`).each((index, element) => {
            $(element).remove();
        });

        section.setAttribute('data-count', section.getAttribute('data-count')- 1);
    }

    function initializeImageOnlyDropzone(dropzoneId){
        Dropzone.autoDiscover = false;

        myDropzone = new Dropzone(`[id='${dropzoneId}']`, {
            url:"{{ route('file.upload') }}",
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            paramName: "file",
            maxFiles: 1,
            acceptedFiles: "image/*", //application/docx,application/pdf,application/msword
            autoProcessQueue: true,
            uploadMultiple: false,
            addRemoveLinks:true,
            dictDefaultMessage: "Drop image files here to upload",
            renameFilename: function(filename){
                // return file_name;
            },
            maxfilesexceeded:function (files){
                    this.removeAllFiles();
                    this.addFile(files);
            },
            init: function () {
                // Remove file preview if present
                $(this.element).removeClass('dz-started dz-max-files-reached');
                $(this.element).find('.dz-preview').eq(0).remove();

                this.on("success", function (file, response) {
                    $(this.element).parent().find('.dropzonehidden').eq(0).val(response); // set file path onto hidden input field in dropzone
                    $(this.element).parents('.section').eq(0).find('button').prop('disabled', false); // re-enable submit button after done uploading
                });
                
                this.on('error', function(file, errorMessage) {
                    console.log(errorMessage);
                    $(this.element).parents('.section').eq(0).find('button').prop('disabled', false); // re-enable submit button after if have error
                });

                this.on("sending", function(file, xhr, formData) {      
                    $(this.element).parents('.section').eq(0).find('button').prop('disabled', true); // disable submit button when uploadin
                    // formData.append('data_file_id', this.element.getAttribute('data-file-id')); 
                    formData.append('data_upload_folder', this.element.getAttribute('data-upload-folder'));
                });
            }
        });

        return myDropzone;
    }
</script>
