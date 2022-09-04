<x-layout>
    <div style="padding:10rem; width: 100rem; margin:auto; max-width:100%;">
        <x-form::base
            name="example-form"
            action="/api/example-endoint"
            @beforeSubmit="function () {
                console.log('beforeSubmit');
                formData.new_value = 'test';
            }"
            @afterSubmit="function () {
                console.log('afterSubmit');
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