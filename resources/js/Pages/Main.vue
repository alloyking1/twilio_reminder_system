<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
  phone_num: null,
  date: null,
  time: null,
  message: null,
})

function submit() {
  router.post('/reminder', form)
}
</script>

<template>
    <div class="shadow-lg overflow-hidden rounded max-w-4xl mx-auto my-24 p-16">
        <form @submit.prevent="submit">
            <div class="mx-24">
                <div class="py-4">
                    <h1 class="text-2xl font-bold text-gray-500">Create Reminder</h1>
                </div>
                <!-- <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label> -->
                <input type="number" v-model="form.phone_num" class="w-full rounded border border-gray-300 p-1" placeholder="Enter phone Number">

                <div class="grid grid-cols-2 gap-2 mt-4">
                    <div class="w-full">
                        <!-- <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label> -->
                        <input type="date" v-model="form.date" class="w-full rounded border border-gray-300 p-1" placeholder="Enter Date">
                    </div>
                    <div class="w-full">
                        <!-- <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label> -->
                        <input type="time" v-model="form.time" class="w-full rounded border border-gray-300 p-1">
                    </div>
                </div>
                <div class="mt-4">
                    <!-- <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Message</label> -->
                    <textarea v-model="form.message" class="w-full rounded border border-gray-300 p-1" name="" id="" cols="30" rows="5">Reminder message</textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white p-3 rounded">Set reminder</button>
            </div>
            
        </form>
    </div>
   
</template>