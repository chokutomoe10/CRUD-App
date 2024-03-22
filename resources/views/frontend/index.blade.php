<x-app-web-layout>
    
    <x-slot:title>
        My Laravel App
    </x-slot>

    <div class="py-5">
        <div class="container">

            @php
                $successMessage = "Saved Successfully";
                $type = "success";
            @endphp

            <x-alert-message :type="$type" :message="$successMessage"/>

            <hr>

            <h4>Welcome to Index Page</h4>

            <hr>

            <x-form.label value="My First Name"/>
            <x-form.label>
                My Slot First Name
            </x-form.label>

        </div>
    </div>

    <x-slot:scripts>
        <script>
            console.log('this is my script area');
        </script>
    </x-slot>
    
</x-app-web-layout>
