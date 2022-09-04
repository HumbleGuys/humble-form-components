<x-layout>
    <div style="padding:10rem; width: 100rem; margin:auto; max-width:100%;">
        <x-form::base
            name="example-form"
            action="https://jsonplaceholder.typicode.com/posts"
            @beforeSubmit="function () {
                console.log('beforeSubmit');
                formData.new_value = 'test';
            }"
            @success="function () {
                console.log('success');
            }"
            @error="function (error) {
                console.log('error');
                console.log(error);
            }"
        >
            My form

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