<x-layout>
    <div style="padding:10rem; width: 100rem; margin:auto; max-width:100%;">
        <x-form::base
            name="example-form"
            action="https://jsonplaceholder.typicode.com/posts"
            @beforeSubmit="function () {
                formData.new_value = 'test';
            }"
            @success="function () {
                console.log('success');
            }"
            @error="function (error) {
                console.log(error);
            }"
        >
            <x-form::input 
                name="user_name"
                placeholder="Enter your name..."
                required
            />

            <x-form::input 
                name="email"
                type="email"
                placeholder="Enter your email..."
                x-model="formData.user_email"
                required
            />

            <x-form::textarea 
                name="message"
                placeholder="Enter your message..."
            />

            <div>
                <button
                    type="submit"
                    style="background-color: hotpink;color:#fff;padding:1rem 2rem;font-size:1.8rem;"
                >
                    Submit
                </button>
            </div>
        </x-form::base>
    </div>
</x-layout>