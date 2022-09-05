<x-layout>
    <style>
        .form__elementHolder {
            margin-bottom: 2rem;
        }
    </style>

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
                label="Name"
                name="user_name"
                placeholder="Enter your name..."
                required
            />

            <x-form::input 
                label="Email"
                name="email"
                type="email"
                placeholder="Enter your email..."
                x-model="formData.user_email"
                required
            />

            <x-form::input 
                label="Email icon"
                name="email_icon"
                type="email"
                placeholder="Enter your email..."
                required
            >
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="input__icon"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </x-slot>
            </x-form::input>

            <x-form::input
                label="Date"
                name="date"
                type="date"
                placeholder="Enter date..."
                required
            />

            <div class="inputHolder">
                <x-form::radioButtons
                    label="Pick a item"
                    name="item_radio"
                    :items="[
                        (object) [
                            'label' => 'Item 1',
                            'value' => 'item_1'
                        ],
                        (object) [
                            'label' => 'Item 2',
                            'value' => 'item_2'
                        ],
                        (object) [
                            'label' => 'Item 3',
                            'value' => 'item_3'
                        ],
                    ]"
                    required
                />
            </div>

            <x-form::select 
                label="Item"
                name="item"
                placeholder="Pick item..."
                :items="[
                    (object) [
                        'label' => 'Item 1',
                        'value' => 'item_1'
                    ],
                    (object) [
                        'label' => 'Item 2',
                        'value' => 'item_2'
                    ],
                    (object) [
                        'label' => 'Item 3',
                        'value' => 'item_3'
                    ],
                ]"
            />

            <x-form::select 
                label="Item"
                name="product"
                placeholder="Pick product..."
                :items="[
                    [
                        'label' => 'Product 1',
                        'value' => 'product_1'
                    ],
                    [
                        'label' => 'Product 2',
                        'value' => 'product_2'
                    ],
                    [
                        'label' => 'Product 3',
                        'value' => 'product_3'
                    ],
                ]"
                required
            />

            <x-form::select 
                label="Color"
                name="color"
                placeholder="Pick color..."
                option-label="name"
                option-value="name"
                :items="[
                    (object) [
                        'name' => 'Blue',
                    ],
                    (object) [
                        'name' => 'Purple',
                    ],
                    (object) [
                        'name' => 'Red',
                    ],
                ]"
            />

            <x-form::textarea 
                label="Message"
                name="message"
                placeholder="Enter your message..."
            />

            <x-form::checkbox 
                name="checkbox_disabled"
                disabled
            >
                Test disabled
            </x-form::checkbox>

            <x-form::checkbox 
                name="terms"
                class="myTerms"
                input-class="myTerms__input"
                label-class="myTerms__label"
                required
            >
                I agree to the terms of service
            </x-form::checkbox>

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