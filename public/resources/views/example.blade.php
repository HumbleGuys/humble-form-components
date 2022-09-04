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
            <x-form::label for="user_name">
                Name
            </x-form::label>

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

            <x-form::input 
                name="date"
                type="date"
                placeholder="Enter date..."
                required
            />

            <div class="inputHolder">
                <x-form::label>Pick a item</x-form::label>

                <x-form::radioButtons
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
                name="message"
                placeholder="Enter your message..."
            />

            <x-form::checkbox 
                name="terms"
                value="accepting_terms"
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