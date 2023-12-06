<script setup>
import { reactive } from 'vue'
import { router, useForm } from '@inertiajs/vue3'

const form = useForm({
  phone_num: null,
  date: null,
  time: null,
  message: null,
})

function submit() {
    form.post('/reminder',{
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
        },
    });
}
</script>

<template>
    <!-- flash message start -->
    <div
        v-if="$page.props.flash.message"
        class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
        role="alert"
    >
        <span class="font-medium">
            {{ $page.props.flash.message }}
        </span>
    </div>
    <!-- flash message end -->

    <div class="shadow-lg overflow-hidden rounded max-w-4xl mx-auto my-24 p-16">
        <form @submit.prevent="submit">
            <div class="mx-24">
                <div class="py-4">
                    <h1 class="text-2xl font-bold text-gray-500">Create Reminder</h1>
                </div>

                <input type="number" v-model="form.phone_num" class="w-full rounded border border-gray-300 p-1" placeholder="Enter phone Number">
                <div v-if="form.errors.phone_num" class="text-red-500">{{ form.errors.phone_num }}</div>

                <div class="grid grid-cols-2 gap-2 mt-4">
                    <div class="w-full">
                        <input type="date" v-model="form.date" class="w-full rounded border border-gray-300 p-1" placeholder="Enter Date">
                        <div v-if="form.errors.date" class="text-red-500">{{ form.errors.date }}</div>
                    </div>
                    <div class="w-full">
                        <input type="time" v-model="form.time" class="w-full rounded border border-gray-300 p-1">
                        <div v-if="form.errors.time" class="text-red-500">{{ form.errors.time }}</div>
                    </div>
                </div>
                <div class="mt-4">
                    <textarea v-model="form.message" class="w-full rounded border border-gray-300 p-1" name="" id="" cols="30" rows="5">Reminder message</textarea>
                    <div v-if="form.errors.message" class="text-red-500">{{ form.errors.message }}</div>
                </div>
                <button type="submit" class="bg-blue-500 text-white p-3 rounded">Set reminder</button>
            </div>
            
        </form>
    </div>
   
</template>